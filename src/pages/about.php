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
    <link rel="stylesheet" type="text/css" href="../css/about.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/index.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" /> 
     
    <title>ABOUT-US</title>
</head>
<body>
 <?php include 'nav.php'; ?>
 <section class="content-page">
  <div class="container-fluid">
    
  <section class="hero">
    <div class="container">
      <div class="abt-row">
        <h1 class="text-uppercase">Hello, there!!</h1>
        <span class="text">
          <p>Rare Carat was born out of a painful experience of buying diamonds online. So we created a kick-ass product to help users search across a number of reputable sites at one go, and by using advanced data science to help intelligently select the best deal.
          </p>
          <p>
            We hope your experience is better than ours was.
          </p>
        </span>
      </div>
    </div>
  </section>
  
  <!-- <section class="mission">
    <div class="container">
      <div class="row">
        <h2 class="text-uppercase">Our Mission</h2>
        <span class="text">
          <p>Seven out of eight people still buy diamonds offline. We want to bring you online to help you spend less, get more, and feel more confident doing so. We&rsquo;re on your team. We&rsquo;ve hand selected vendors with stellar reputations and services to search with a click.</p>
          <p>It&rsquo;s personal. Our recently engaged founder struggled with the same issues you&rsquo;re having today - spending a lot of money on something he knew little about on sites he&rsquo;d never heard of. Read about his journey <a href="http://blog.rarecarat.com/post/my-engagement-ring-story" target="_blank">here</a>.</p>
          <p>We&rsquo;re also using data science and machine learning with IBM Watson to help you make the smartest decision. This <a href="http://blog.rarecarat.com/post/watson-score-how-we-re-using-data-science-and-machine-learning" target="_blank">blog post</a> explains more.</p>
          <p>In research and development, we&rsquo;re testing artificial intelligence bots that ask questions in English, instead of &ldquo;Diamond-ese&rdquo; to help guide new buyers in finding the right stone.</p>
          <p>If you have suggestions for features to make buying diamonds better, we&rsquo;re all ears.</p>
        </span>
      </div>
    </div>
  </section> -->
    <?php
    include_once('dbConfig.php');
    // number of users available;
    $movieQuery = mysqli_num_rows(mysqli_query($db,"SELECT * FROM movie"));
    $usersQuery = mysqli_num_rows(mysqli_query($db,"SELECT * FROM user"));
    $reviewsQuery = mysqli_num_rows(mysqli_query($db,"SELECT * FROM comments"));
    ?>
  <section class="stats">
    <div class="container">
      <div class="stats-row" id="stats-row">
        <div class="results">
          <span class="stats-value" data-start="0" data-end="8"><?php echo $movieQuery?></span>
          <span class="stats-label">MOVIES</span>
        </div>
        <div class="results">
          <span class="stats-value" data-start="0" data-end="14463"><?php echo $usersQuery?></span>
          <span class="stats-label">USERS</span>
        </div>
        <div class="results">
          <span class="stats-value" data-start="0" data-end="24209"><?php echo $reviewsQuery?></span>
          <span class="stats-label">REVIEWS</span>
        </div>
      </div>
    </div>
  </section>
  
</div>
</section>

<?php include 'footer.php';?>
<script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>
</html>