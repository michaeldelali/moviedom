<?php 
session_start(); 
$r = session_id();
$s = $_SESSION['username'];
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

 // Include the database configuration file
 include 'dbConfig.php';
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 //Get the link to the database.
 if(isset($_GET['id']) && $_GET['id'] !== ''){
   $movieId = $_GET['id'];
   } else {
   echo "failed Request";
   }

 // Get images from the database
 $query = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = movieart.imageId AND movie.movieId = $movieId ORDER BY uploaded_on DESC");
 if($query->num_rows > 0){
     $row = $query->fetch_assoc();
         $title =$row["movieTitle"];
         $year = $row["years"];
         $genre = $row["genre"];
         $movieId =$row["movieId"];
         $movieDescription =$row["movieDescription"];
         $casts = $row["casts"];
         $director = $row["director"];
         $writer = $row["writer"];
         $rating = $row["rating"];
         $runtime = $row["runtime"];
 }
 $query = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = movieart.imageId AND movie.movieId = $movieId AND movieart.poster =1 ORDER BY uploaded_on DESC");
 if($query->num_rows > 0){
     $poster1 = $query->fetch_assoc();
         $moviePoster1 = '../../images/movies/'.$poster1["imageName"];       
 }
 $query = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = movieart.imageId AND movie.movieId = $movieId AND movieart.poster =2 ORDER BY uploaded_on DESC");
 if($query->num_rows > 0){
     $poster2 = $query->fetch_assoc();
         $moviePoster2 = '../../images/movies/'.$poster2["imageName"];       
 }
 $query = $db->query("SELECT * FROM user WHERE username = '$s'");
 if($query->num_rows > 0){
     $users = $query->fetch_assoc();
     $_SESSION['id'] = $users['id']; 
 }

 $comment = $db->query("SELECT * FROM comments WHERE movieId = $movieId");
 $number_of_reviews =$comment->num_rows;
 while ($row = $comment->fetch_assoc()){
  $rateSum += $row['rate'];
  }
  $rateAverage = ($rateSum / $number_of_reviews);


     include 'comments.php';   
//  $casts =array();
 $casts = explode('*',trim($casts));
 $previous = $_SERVER['HTTP_REFERER'];
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KADI</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/review.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/comments.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Oxanium:600&display=swap" rel="stylesheet">
    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>  -->

    
</head>
<body>
<?php include 'nav.php'; ?>
    <div class="window-margin">
      <div class="window">
    
        <aside class="sidebar">
            <div >
            <img src="<?php echo $moviePoster1; ?>" alt="Movie Cover" class ="review-poster1"/>
            </div>
            <div class="details">
                <h3>Year</h3>
                <p><?php echo nl2br($year); ?></p>
            </div>
            <div class="details">
                <h3>Runtime</h3>
                <p><?php echo nl2br($runtime." min"); ?></p>
            </div>
            <div class="details">
                <h3>Rating</h3>
                <p><?php echo nl2br($rating); ?></p>
            </div>
            <div class="details">
                <h3>Casts</h3>
                <?php foreach($casts as $cast):?>
                  <p>
                     <?php echo($cast);  ?>
                </p>
                <?php endforeach?>
                
            </div>
            <div class="details">
                <h3>Genre</h3>
                <p><?php echo nl2br($genre); ?></p>
            </div>
            <div class="details">
              <h3>director</h3>
              <p><?php echo nl2br($director); ?></p>
            </div >
            <div class="details">
              <h3>writer</h3>
              <p><?php echo nl2br($writer); ?></p>
            </div>
            <div class="details">
              <h3>number of reviews</h3>
              <p><?php echo( $number_of_reviews); ?></p>
            </div>
            <div class="details">
              <h3>Average Fun Rating</h3>
              <p><?php echo round($rateAverage,2).'%'; ?></p>
            </div>
          <!-- <div class="search-box">
            
            <p class="fa fa-search"></p>
          </div> -->
        </aside>
    
    
        <div class="main" role="main">
    
          <div class="top-bar">
            <div class="category-navbar" style="font-family: 'Oxanium' ">
              <ul>
                  <li><a href="index.php">MOVIES</a></li>
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
            
              <div class="info-box">
                <div class="hero">
                    <img src="<?php echo $moviePoster2 ?>" alt="Movie Artwork"/>
                    
                  </div>
                    <h3><?php echo ucwords($title); ?></h3>
                    <p><?php echo nl2br($movieDescription); ?></p>
                </div>

                <!-- movie links -->
          <div class="movielinks">
            
    <div class="netflix" title="Watch Now on Netflix">
        <table>
            <tbody>
              <tr>
                <td class="esite_label_wrapper">
                     <span>Stream On</span>
                 </td>	 
                 <td class="esite_img_wrapper">
                    <a rel="nofollow noopener" target="_blank" class="esite_url" href="https://www.netflix.com">
                        <img src="../../images/links/netflix.png " alt="">
                    </a>
                </td>
            </tr>
          </tbody>
        </table>
</div>
    
    <div class="amazon" title="Buy from Amazon">
        <table>
            <tbody><tr>
                <td class="esite_label_wrapper">
                     <span>Buy On</span>
                 </td>	 
                 <td class="esite_img_wrapper">
                    <a rel="nofollow noopener" target="_blank" class="esite_url" href="https://www.amazon.com" data-leadtype="Physical Product" data-leadtag="metacritic-movies-20" data-leadid="1" data-leadname="amazon" data-leadplace="upper body">
                        <img src="../../images/links/amazondotcom_30.png" alt="">
                    </a>
                </td>
            </tr>
        </tbody></table>
    </div>



    <div class="itunes" title="Buy from Amazon">
        <table>
            <tbody><tr>
                <td class="esite_label_wrapper">
                     <span>Buy On</span>
                 </td>	 
                 <td class="esite_img_wrapper">
                    <a rel="nofollow noopener" target="_blank" class="esite_url" href="https://www.itunes.com" data-leadtype="Physical Product" data-leadtag="metacritic-movies-20" data-leadid="1" data-leadname="amazon" data-leadplace="upper body">
                        <img src="../../images/links/badge_itunes-lrg2.svg" alt="">
                    </a>
                </td>
            </tr>
        </tbody></table>
    </div>


          </div>

                <!-- comments area -->
                
              <div class="comments">
                <?php
              echo "   <div class='comment-wrap'>
                    <div class='photo'>
                      <div class='avatar'>";
                      $id = $_SESSION['id'];
                      $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
                      $resultImg = mysqli_query($db, $sqlImg);
                      while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                          if ($rowImg['status'] == 0) {
                            $fileName = "C:/xampp/htdocs/MOVIEDOM/images/profile/profile" . $id . "*";
                            $fileInfo = glob($fileName);
                            $fileExt = explode(".", $fileInfo[0]);
                            $fileActualExt = $fileExt[1];
                            echo "<img src='../../images/profile/profile".$id.".".$fileActualExt."?".mt_rand()."'>";
                          } else{
                            echo "<img src='../../css/images/profile/defaultprofile.png'/>";
                          }
                        }
                    echo "</div>";
          ?>
                      </div>
                      <div class="comment-block">
                          <form  action="comments.php" method="POST" >
                              <textarea name="commentText" cols="30" rows="3" placeholder="Add comment..." required></textarea>
                              <input type="hidden" name="userId" value="<?php echo htmlspecialchars($_SESSION['id']); ?>">
                              <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($movieId); ?>">
                              <input type="hidden" value="$previous">
                              <!-- <p name="movieId"><?php echo $movieId; ?></p>
                              <p name="userId"><?php echo $_SESSION['id']; ?></p> -->
                             
                              <ul class="comment-actions">
                              <input type="text" class="rating" name="rate" placeholder="Add Rating (%)."required>
                                <button type="submit" class="complain" name="commentSubmit">COMMENT</button>
                                
                              </ul>
                          </form>
                      </div>
                  </div>
                  <?php getComments($db,$movieId,$_SESSION['id']);?>
              </div>
            </div> <!----movie list-->
        </div> <!-- main -->
    </div> <!-- window -->
  </div> <!-- window margin -->
            
  <?php include_once 'footer.php';?>
  <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>
</html>