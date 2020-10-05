<?php 
include_once('upload.php');
if(isset($_SESSION['username'])){
}else{
    $_SESSION['msg'] = "You must log in first to view this page";
    header("location:registration.php");
}
if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location:registration.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oxanium:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/profile.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/registration.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
      <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" />
    
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <h1>Profile Overview</h1>
    <div class="avatar-upload">
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="avatar-edit">
                <input type='file' name="profilepic" id="imageUpload" required/>
                     <label for="imageUpload"></label>
            </div>   
            <div class="avatar-preview">
                <?php
                // $id = $_SESSION['id'];
                // $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
                // $resultImg = mysqli_query($db, $sqlImg);
                // while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                //         if ($rowImg['status'] == 0) {
                //             $fileName = "C:/xampp/htdocs/MOVIEDOM/imagesimages/profile/profile" . $id . "*";
                //             $fileInfo = glob($fileName);
                //             print_r($fileInfo);
                //             $fileExt = explode(".", $fileInfo[0]);
                //             $fileActualExt = $fileExt[1];
                //             echo "<img src='../../images/profile/profile".$id.".".$fileActualExt."?".mt_rand()."' style=height:300px>";
                //         } else{
                //             echo "<img src='../../images/profile/defaultprofile.png'";
                //         }
                $id = $_SESSION['id'];
                $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
                $resultImg = mysqli_query($db, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                        if ($rowImg['status'] == 0) {
                            $fileName = "C:/xampp/htdocs/MOVIEDOM/images/profile/profile" . $id . "*";
                            $fileInfo = glob($fileName);
                            $fileExt = explode(".", $fileInfo[0]);
                            $fileActualExt = $fileExt[1];
                            echo "<img src='../../images/profile/profile".$id.".".$fileActualExt."?".mt_rand()."' class='avatar-pic'>";
                        } else{
                            echo "<img src='../../images/profile/defaultprofile.png' class='avatar-pic'/>";
                        }
                    }
                ?>
            <!-- <img src="images/profile/profile15.jpg" alt="profile picture."> -->
                </div>
            <!-- <input type='file' name="profilepic" id="imageUpload"/> -->
            <input type="submit" value ="Delete" class="button red" name="delete-profile" >
            <input type="submit" value ="Update" class="button" name="change-profile" >
        </form>
    </div>
</div>

<div class="login-form">
        <form action="profile.php" method="post" class= "update-form" >
        
            <div class="group">
                <label for="user" class="label">Username</label>
                <input type="text" class="input" name="username" value="<?php $username = $_SESSION['username']; echo"$username";?>" required>
            </div>
            <!-- <div class="group">
                <label for="pass" class="label">Password</label>
                <input  type="password" class="input" name="password_1">
            </div> -->
            <div class="group">
                <input type="submit" class="button submit" value="Change Detail"  name="change-detail">
            </div>
            
        </form>
</div>
        <?php include 'footer.php';?>
<script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>