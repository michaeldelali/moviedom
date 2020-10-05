<?php

session_start();
$username ="";
$email ="";

$errors =array();

//connect to database

$db = mysqli_connect('localhost','root','','moviedom') or die("could not connect to database");

if(isset($_POST['sign_up'])){
    //register users
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //form validation

    if (empty($username)){array_push($errors,"Username is required");}
    if (empty($email)){array_push($errors,"Email is required");}
    if (empty($password_1)){array_push($errors,"Password is required");}
    if ($password_1 != $password_2){array_push($errors, "Password do not match");}

    //check db existing username
    $user_check_query = "SELECT * FROM user WHERE username = '$username'or email ='$email' LIMIT 1";

    $results = mysqli_query($db,$user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user){
        if ($user['username']===$username){array_push($errors, "Username already exist");}
        if ($user['email']===$email){array_push($errors, "The Email has a registered Username");}
    }

    //Register the user if no errors
    if (count($errors) ==0){
        $password = md5($password_1); //this will encrypt password
        $insert_user = "INSERT INTO user(username,email,password) VALUES ('$username','$email','$password')";
        mysqli_query($db,$insert_user);
        $_SESSION['username'] =$username;
        $select_user = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
        $results =mysqli_query($db,$select_user);
        if($row = $results->fetch_assoc()){
            $_SESSION['id'] = $row['id'];
            $id = $row['id'];
        }
        $profileimage = "INSERT INTO profileimg(userid,status) VALUES ('$id', 1)";
        mysqli_query($db,$profileimage);
        $_SESSION['success']="Logged in sucessfully";
        header('location: index.php');

    }
}

//login user
if(isset($_POST['login_user'])){
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password=mysqli_real_escape_string($db, $_POST['password_1']);

    if (empty($username)){
        array_push($errors, "Username is required");
    }
    if (empty($password)){
        array_push($errors, "Username is required");
    }
     
    if(count($errors) == 0){
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
        $results =mysqli_query($db,$query);
        if ($row = $results->fetch_assoc()){
            if($username ==="admin"){
            $_SESSION['username'] = $username;
            $id = $row['id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['success']="Logged in sucessfully";
            header('location:admin.php'); 
            }else{
            $_SESSION['username'] = $username;
            $id = $row['id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['success']="Logged in sucessfully";
            header('location:index.php');
            }
        }else{
            array_push($errors, "Wrong username/password combination. Please try again.");
        }

    }

}

