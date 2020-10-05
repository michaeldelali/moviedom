
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
        <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
        <link rel="stylesheet" type="text/css" href="../css/admin.css?ts=<?=time()?>" />
        <title>admin page</title>
    </head>
    <body>
        <!-- navbar admin -->
        <?php include 'nav.php'; ?>
        
        <?php 
        ob_start();
        require "upload.php";
        $output1 = ob_get_clean();
        ?>

        <div class="admin-wrap">
         <?php include('errors.php')?>
         <div class="admin-page-html">
            <input id="tab-1" type="radio" name="tab" class="upload-movie" checked><label for="tab-1" class="tab">UPLOAD MOVIE</label>
            <input id="tab-2" type="radio" name="tab" class="delete-movie"><label for="tab-2" class="tab">DELETE MOVIE</label>
            <div class="admin-page-form">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="upload-movie-htm">
                        <div class="group">
                            <label for="user" class="label">Movie Title</label>
                            <input type="text" class="input" name="movieTitle" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Poster 1</label>
                            <input type="file" class="button" name="poster1" >
                        </div>
                        <div class="group">
                            <label for="user" class=" label">Poster 2</label>
                            <input type="file" class="button" name="poster2">
                        </div>
                        <div class="group">
                            <label for="user" class="label">Year of Release</label>
                            <input type="text" class="input" name="year" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Runtime(In Minutes)</label>
                            <input type="text" class="input" name="runtime" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Rating</label>
                            <input type="text" class="input" name="rating" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Genre</label>
                            <input type="text" class="input" name="genre" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Cast</label>
                            <input type="text" class="input" name="cast" placeholder ="Separate indivual cast with an asterisk (*)" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Director</label>
                            <input type="text" class="input" name="director" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Writer</label>
                            <input type="text" class="input" name="writer" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Movie Description</label>
                            <textarea name="movieDescription" rows="10" cols="55" required ></textarea>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="UPLOAD" name="upload">
                        </div>
                    </div>
                </form>
                <form action="search.php" method="post">
                <div class="delete-movie-htm">
                    <div class="group">
                        <label for="user" class="label">Movie Title</label>
                        <input id="user" type="text" class="input" name ="search" require >
                    </div>
                    <div class="group">
                            <input type="submit" class="button" value="Search" name="delete-search">
                        </div>
                    </div>
                    <div class="group">
                        
                    </div>
                </form>
            </div>
          </div>
        </div>
    </body>
</html>