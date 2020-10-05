
<?php
  // Include the database configuration file
  include 'dbConfig.php';
  // Get images from the database
  $query = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = movieart.imageId AND movieart.poster = 1 ORDER BY uploaded_on DESC");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $moviePoster1 = '../../images/movies/'.$row["imageName"];
          $title =$row["movieTitle"];
          $genre = $row["genre"];
          $movieId =$row["movieId"];
          $movieDescription =$row["movieDescription"];
          $year = $row["years"];
  
 echo"
  <div class='example-2 card'>
    <div class='wrapper' style = 'background-image: url($moviePoster1)'>
      <div class='header'>
        <div class='date'>
          <span class='year'>$year</span>
        </div>
      </div>
      <div class='data'>
        <div class='content'>
          <span class='author'> $genre</span>
          <h1 class='title'><a href='./review.php?id=$movieId'> ".ucwords($title)."</a></h1>
          <p class='text'>$movieDescription</p>
          <a href='./review.php?id=$movieId' class='button'>Read more</a>
        </div>
      </div>
    </div>
  </div>
";

 }
}
 ?>
