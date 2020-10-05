<?php 
 session_start(); 
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
    <link rel="stylesheet" type="text/css" href="../css/admin.css?ts=<?=time()?>" />
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

<?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($db, $_POST['search']);
        $sql = "SELECT * FROM movie WHERE movieTitle LIKE '%$search%' OR years LIKE '%$search%'
        OR genre LIKE '%$search%' OR casts LIKE '%$search%' OR director LIKE '%$search%'OR writer LIKE '%$search%'";

        $result = mysqli_query($db, $sql);
        $resultQuery = mysqli_num_rows($result);

        echo "<p class='search-number' style='color:green; margin:10px auto;'>There are " . $resultQuery. " result(s)!</p>";
        echo "<div class='row'>";
        if ($resultQuery > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $movieId = $row['movieId'];

                $query2 = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = $movieId AND movieart.imageId=$movieId AND movieart.poster = 1 ORDER BY uploaded_on DESC");
                while($row2 = $query2->fetch_assoc()){
                    $moviePoster1 = '../../images/movies/'.$row2["imageName"];
                    $title =$row2["movieTitle"];
                    $genre = $row2["genre"];
                    $movieId =$row2["movieId"];
                    $movieDescription =$row2["movieDescription"];
                    $year = $row2["years"];
            
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
        //  else {
        //     echo "There are no results matching your search!";
        // }
    }
}

// Search Results for admin...........to delete movies.
if (isset($_POST['delete-search'])) {
    $search = mysqli_real_escape_string($db, $_POST['search']);
    $sql = "SELECT * FROM movie WHERE movieTitle LIKE '%$search%' OR years LIKE '%$search%'
    OR genre LIKE '%$search%' OR casts LIKE '%$search%' OR director LIKE '%$search%'OR writer LIKE '%$search%'";

    $result = mysqli_query($db, $sql);
    $resultQuery = mysqli_num_rows($result);

    echo "<p class='search-number' style='color:green; margin:10px auto;'>There are " . $resultQuery. " result(s)!</p>";
    echo "<div class='row'>";
    if ($resultQuery > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $movieId = $row['movieId'];

            $query2 = $db->query("SELECT * FROM movie, movieart WHERE movie.movieId = $movieId AND movieart.imageId=$movieId AND movieart.poster = 1 ORDER BY uploaded_on DESC");
            while($row2 = $query2->fetch_assoc()){
                $moviePoster1 = '../../images/movies/'.$row2["imageName"];
                $title =$row2["movieTitle"];
                $genre = $row2["genre"];
                $movieId =$row2["movieId"];
                $movieDescription =$row2["movieDescription"];
                $year = $row2["years"];
        
       echo"
        <div class='example-2 card'>
          <div class='wrapper' style = 'background-image: url($moviePoster1)'>
            <div class='header'>
              <div class='date'>
                <span class='year'>$year</span>
              </div>
                <form action='' method='post'>
                    <input type='submit' class='button' value='DELETE' name='delete' 
                            style='color:wheat; background:rgb(243, 77, 77); padding:2px;
                            border-radius:10px;'/>
                </form>
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
    //  else {
    //     echo "There are no results matching your search!";
    // }
}
    if(isset($_POST['delete'])){
        $delete_query = "DELETE FROM movie WHERE movieId = $movieId;";
        mysqli_query($db,$delete_query);
        echo "<p class='search-number' style='color:green; margin:10px auto;'>Deleted Succesfully.</p>";
    }
}
?>
  </div>
</div>
    <?php include 'footer.php';?>
<script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>