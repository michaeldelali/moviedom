<?php 
 session_start(); 
if(isset($_SESSION['username'])){
 
}else{
    // $_SESSION['msg'] = "You must log in first to view this page";
    // header("location:registration.php");
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
    <title>KADI</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oxanium:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" />  
    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>  -->
</head>
<body>

  <?php include 'nav.php'; ?>
   

          <div class="top-bar">
            <div class="category-navbar" style="font-family: 'Oxanium' ">
              <ul>
                  <li><a href="#">MOVIES</a></li>
                  <li><a href="#">TV SHOWS</a></li>
                  <li><a href="#">MOST REVIEWED</a></li>
                  <li><a href="#">TOP RATINGS</a></li>
              </ul> 
          </div>
        </div> <!-- top bar -->
          <div class="right">
            <a class="blue" href="#">Rating <i class="fa fa-angle-down"></i></a>
            <a href="#">Newest</a>
            <a href="#">Oldest</a>
          </div> <!-- right -->
          
          <div class="row">
            <?php include 'content.php';?>
          </div>
</div>

          <?php include 'footer.php';?>
         
          <!-- <a href="#" class="load-more">Show more movies <span class="fa fa-plus"></span></a> -->

          <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>