<?php 
session_start(); 
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
    <title>KADI</title>
    <link rel="stylesheet" type="text/css" href="./index.css?ts=<?=time()?>" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oxanium:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include 'nav.php'; ?>
    <div class="window-margin">
      <div class="window">
    
        <aside class="sidebar">
          <div class="search-box">
            <input type="text" placeholder="Search..."/>
            <p class="fa fa-search"></p>
          </div>
        </aside>
    
    
        <div class="main" role="main">
    
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
          <div class="movie-list">
            <div class="title-bar">
              <div class="right">
                <a class="blue" href="#">Rating <i class="fa fa-angle-down"></i></a>
                <a href="#">Newest</a>
                <a href="#">Oldest</a>
              </div> <!-- right -->
            </div> <!-- title-bar -->
    
            <ul class="list">

            <!-- <?php
                  // Include the database configuration file
                  include 'dbConfig.php';

                  // Get images from the database
                  $query = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = movieart.imageId AND movieart.poster = 1 ORDER BY uploaded_on DESC");
                  if($query->num_rows > 0){
                      while($row = $query->fetch_assoc()){
                          $moviePoster1 = './images/movies/'.$row["imageName"];
                          $title =$row["movieTitle"];
                          $genre = $row["genre"];
                          $movieId =$row["movieId"];
                          $movieDescription =$row["movieDescription"];

                  ?>
                  <a href="./review.php?id=<?php echo $movieId;?>">
                      <li>
                      <img src="<?php echo $moviePoster1; ?>" alt="Movie Cover" class="cover"/>
                      <p class="title" style="color:black;" ><?php echo $title; ?></p>
                      <p class="genre"><?php echo $genre; ?></p>
                      </li>
                      </a>
                  <?php }
                  }
                   ?>
                       -->
   
           


              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140412_oavbye_1.png" alt="" class="cover" />
                <p class="title">Sin City: A Dame To Kill For</p>
                <p class="genre">Action, Crime</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140329_aawn02_1.png" alt="" class="cover" />
                <p class="title">Transcendence</p>
                <p class="genre">Action, Drama</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140239_kyg9i7_1.png" alt="" class="cover" />
                <p class="title">Need For Speed</p>
                <p class="genre">Action, Crime</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140052_dq4dyx_1.png" alt="" class="cover" />
                <p class="title">The Amazing Spiderman</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140104_tdgzka_1.png" alt="" class="cover" />
                <p class="title">Pompeii</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140248_fmufrz_1.png" alt="" class="cover" />
                <p class="title">Divergent</p>
                <p class="genre">Action, Sci-Fi</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140401_aewzsy_1.png" alt="" class="cover" />
                <p class="title">Guardians of the Galaxy</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140339_wck2gw_1.png" alt="" class="cover" />
                <p class="title">X-Men: Days of Fury</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140311_rj1det_1.png" alt="" class="cover" />
                <p class="title">Captain America: The Winter Soilder</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140248_fmufrz_1.png" alt="" class="cover" />
                <p class="title">Divergent</p>
                <p class="genre">Action, Sci-Fi</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140132_bcnfqk_1.png" alt="" class="cover" />
                <p class="title">RoboCop (2014)</p>
                <p class="genre">Action, Crime</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140329_aawn02_1.png" alt="" class="cover" />
                <p class="title">Transcendence</p>
                <p class="genre">Action, Drama</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140239_kyg9i7_1.png" alt="" class="cover" />
                <p class="title">Need For Speed</p>
                <p class="genre">Action, Crime</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140104_tdgzka_1.png" alt="" class="cover" />
                <p class="title">Pompeii</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140412_oavbye_1.png" alt="" class="cover" />
                <p class="title">Sin City: A Dame To Kill For</p>
                <p class="genre">Action, Crime</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140339_wck2gw_1.png" alt="" class="cover" />
                <p class="title">X-Men: Days of Fury</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140052_dq4dyx_1.png" alt="" class="cover" />
                <p class="title">The Amazing Spiderman</p>
                <p class="genre">Action, Adventure</p>
              </li>
              <li>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/22043/2014-03-08_140248_fmufrz_1.png" alt="" class="cover" />
                <p class="title">Divergent</p>
                <p class="genre">Action, Sci-Fi</p>
              </li>
            </ul>
    
            <a href="#" class="load-more">Show more movies <span class="fa fa-plus"></span></a>
    
          </div> <!-- movie list -->
    
    
        </div> <!-- main -->
    
      </div> <!-- window -->
    </div> <!-- window margin -->
    
    <hr>
    <footer>
        <div class="footer-container" style="font-family: 'Oxanium' ">
          <li><a href="#">MOVIEDOM</a></li>
        </div>
        <div class="footer-container" style="font-family: 'Oxanium' ">
            <li><a href="#">About Us</a></li> 
            <li><a href="#">Contact Us</a></li>
        </div>
        <div class="footer-container">
            <li style="margin-bottom:10px ;"><a href="#">Follow Us</a></li>
            <div class="footer-container-follow">
                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
            </div>
        </div>
        <div class="footer-container" style="font-family: 'Oxanium' ">
            <li><a href="#">Subcribe To Our Newsletter
                <div class="search-container">
                    <form action="/action_page.php">
                      <input type="email" placeholder="Your Email" name="subcribe">
                      <button type="submit">Subscibe</button>
                    </form>
                  </div>
        </div>
    </footer>
    <div class="copyright">
        <span>&copy;</span>MOVIEDOM 2020
    </div>
</body>
</html>