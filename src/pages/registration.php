
<?php 
include('server.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./registration.css">
    <link rel="stylesheet" href="./index.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/registration.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oxanium:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title> 
</head>
<body>
    <div class="login-wrap">
    <?php include('errors.php')?>
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form action="registration.php" method="post">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input type="text" class="input" name="username">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input  type="password" class="input" name="password_1">
                    </div>
                    <div class="group">
                        <input" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button"  name="login_user">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                </form>
                <form action="registration.php" method="post">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name ="username" require >
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input"   name="password_1" require>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input"  name="password_2" require>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input" name="email" require>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up" name="sign_up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                       <a href="#"><label for="tab-1">Already Member?</label></a> 
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <?php include 'footer.php';?>
    <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
</body>
</html>