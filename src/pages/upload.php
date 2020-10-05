<?php
session_start();
// Include the database configuration file
include 'dbConfig.php';
$errors =array();
$statusMsg1 = '';
$statusMsg2 = '';
$movie ='';


if(isset($_POST["upload"])){

    $movieTitle = mysqli_real_escape_string($db, $_POST['movieTitle']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    $cast = mysqli_real_escape_string($db, $_POST['cast']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
    $writer = mysqli_real_escape_string($db, $_POST['writer']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
    $movieDescription = mysqli_real_escape_string($db, $_POST['movieDescription']);

    //validating inputs.
    
    if (empty($movieTitle)){array_push($errors,"Movie Title is required");}
    if (empty($year)){array_push($errors,"year is required");}
    if (empty($genre)){array_push($errors,"Genre is required");}
    if (empty($cast)){array_push($errors,"Cast Names are required");}
    if (empty($director)){array_push($errors,"Director's Name is required");}
    if (empty($writer)){array_push($errors,"Writer's Name is required");}
    if (empty($movieDescription)){array_push($errors,"Movie Description is required");}

     //check db for existing movietitle
     $title_check_query = "SELECT * FROM movie WHERE movieTitle = '$movieTitle' LIMIT 1";

     $results = mysqli_query($db,$title_check_query);
     $movie = mysqli_fetch_assoc($results);
     if ($movie){
         if ($movie['movieTitle']===$movieTitle){array_push($errors, "Movie Title already exist");}
     }
     if (count($errors)==0){
       
        $query = "INSERT INTO movie(movieTitle,years,genre,casts,director,writer,movieDescription) VALUES ('$movieTitle','$year','$genre','$cast','$director','$writer','$movieDescription')";

        mysqli_query($db,$query);

// File upload path


if(!empty($_FILES["poster1"]["name"])){
    $targetDir = "C:/xampp/htdocs/MOVIEDOM/images/movies/";
    $fileName = basename($_FILES["poster1"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $query = "SELECT movieId FROM movie ORDER BY movieId DESC LIMIT 1";
        $results =mysqli_query($db,$query);

        if ($results) 
        { 
            while ($row = $results->fetch_assoc()) {
                $imageId = $row['movieId'];
                echo $row['movieId']."<br>";
            }
        }  
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["poster1"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $poster = 1;
            $insert = $db->query("INSERT into movieart (imageId,imageName,poster) VALUES ('$imageId','$fileName','$poster')");
            if($insert){
                $statusMsg1 = "The file ".$fileName. " has been uploaded successfully.";
                header('location: admin.php?succesfullupload');
            }else{
                $statusMsg1 = "File upload failed, please try again.";
                header('location: admin.php?uploadFailed');
            } 
        }else{
            $statusMsg1 = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg1 = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
     $statusMsg1 = '1. Please select a image1 to upload.';
}
///image 2 review.
if(!empty($_FILES["poster2"]["name"])){
    $targetDir = "C:/xampp/htdocs/MOVIEDOM/images/movies/";
    $fileName = basename($_FILES["poster2"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $query = "SELECT movieId FROM movie ORDER BY movieId DESC LIMIT 1";
        $results =mysqli_query($db,$query);

        if ($results) 
        { 
            while ($row = $results->fetch_assoc()) {
                $imageId = $row['movieId'];
                echo $row['movieId']."<br>";
            }
        }  
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["poster2"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $poster = 2;
            $insert = $db->query("INSERT into movieart (imageId,imageName,poster) VALUES ('$imageId','$fileName','$poster')");
            if($insert){
                $statusMsg2 = "The file ".$fileName. " has been uploaded successfully.";
                header('location: admin.php?succesfullupload');
            }else{
                $statusMsg2 = "File upload failed, please try again.";
                header('location: admin.php?uploadFailed');
            } 
        }else{
            $statusMsg2 = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg2 = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
    }else{
     $statusMsg2 = '2. Please select image2 to upload.';
    }
     
    }else{
        if(count($errors)>0){
            foreach($errors as $error){
            echo nl2br($error);
            }
            echo nl2br("$statusMsg1 \n $statusMsg2 ");
            echo '<pre>'; print_r($errors); echo '</pre>';
            echo '<pre>'; print_r($movie); echo '</pre>';
            header('location:admin.php?failureToPost');
        }
    }

}


//uploading profile image.
if (!empty($_FILES["profilepic"]["name"]) && isset($_POST["change-profile"])){
    $sessionid = $_SESSION['id'];
    $file = $_FILES['profilepic'];

    $fileName = $_FILES['profilepic']['name'];
    $fileTmpName = $_FILES['profilepic']['tmp_name'];
    $fileSize = $_FILES['profilepic']['size'];
    $fileError = $_FILES['profilepic']['error'];
    $fileType = $_FILES['profilepic']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
        echo $_SESSION['id'];
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = "profile" . $sessionid . "." . $fileActualExt;
                $fileDestination = 'C:/xampp/htdocs/MOVIEDOM/images/profile/'. $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET status= 0 WHERE userid='$sessionid';";
                $result = mysqli_query($db, $sql);
                header('Location: profile.php?uploadsuccess');
            } else{
                echo "Your file is too big!";
            }
        } else{
            echo "There was an error uploading your file";
        }
    }
    else{
        echo "You cannot upload files of this type!";
    }
} 

if(isset($_POST['delete-profile'])){
    $sessionid = $_SESSION['id'];

    $fileName = "C:/xampp/htdocs/MOVIEDOM/images/profile/profile" . $sessionid . "*";
    $fileInfo = glob($fileName);
    $fileExt = explode(".", $fileInfo[0]);
    $fileActualExt = $fileExt[1];
    
    $file = "C:/xampp/htdocs/MOVIEDOM/images/profile/profile" . $sessionid . "." . $fileActualExt;
    
    if (!unlink($file)) {
        echo "File was not deleted!";
    } else{
        echo "File was deleted!";
    }
    
    $sql = "UPDATE profileimg SET status=1 WHERE userid='$sessionid';";
    mysqli_query($db, $sql);
    
    header('Location: profile.php?deletesuccess');
    
}

if(isset($_POST['change-detail']) && ($_POST['username'] != $_SESSION['username'])){
    $sessionid = $_SESSION['id'];
    $username =mysqli_real_escape_string($db,$_POST['username']);
//check database for existing names
$user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";

     $results = mysqli_query($db,$user_check);
     $user = mysqli_fetch_assoc($results);
     if ($user){
         if ($user['username']===$username){ echo "Username already exist.";}
     }else {
         $update_user = "UPDATE user SET username ='$username' WHERE id ='$sessionid'; ";
         mysqli_query($db, $update_user);
         $_SESSION['username'] = $username;
     }
}
?>