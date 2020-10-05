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
    <link rel="stylesheet" type="text/css" href="../css/content.css?ts=<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="../css/footer.css?ts=<?=time()?>" /> 
    <link rel="stylesheet" type="text/css" href="../css/contact.css?ts=<?=time()?>" /> 
    <title>Contact</title>
</head>
<body>
<?php include_once('nav.php');?>
	<div class="content-wrap">
		<div class="map-wrap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810696164!2d-0.24168119916904746!3d51.52877184079261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sgh!4v1588282777453!5m2!1sen!2sgh" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		
		</div>
		<div class="layout-center">
      <div class="form-wrap">
        <div class="form-block">
          <h2 class="sub-title">Send us a Message</h2>
          <form action="" class="contact">
            <div class="form-item">
              <label for="">Full Name</label>
              <input type="text">
             </div>
             <div class="form-item">
              <label for="">Email ID</label>
              <input type="text">
             </div>
            <div class="form-item">
              <label for="">Phone</label>
              <input type="text">
             </div>
            <div class="form-item">
              <label for="">Subject</label>
              <input type="text">
             </div>
            <div class="form-item">
              <label for="">Message</label>
              <textarea id="edit-message" name="message" rows="5" cols="60" class="form-textarea required resize-vertical"></textarea>
             </div>
            <div class="form-item">
              <input class="button form-submit"  type="submit" name="op" value="Send Message">
            </div>
            </form>
          </div>
        <div class="address-block">
          <h2 class="sub-title">Contact Informations</h2>
          <ul>
            <li>Piccadilly Centre, 341 Crown Street, Wollongong, NSW 2500</li>
            <li>+977 8765434565</li>
            <li>info@moviedom.com</li>
            <li></li>
          </ul>
        </div>
      </div>
		</div>
		
	</div>
	<!-- <div class="footer-wrap"> -->
		<!-- <div class="layout-center">
		  <p>2020 &copy; MOVIEDOM</p>
		</div> -->
    <!-- </div> -->
    <?php include 'footer.php';?>
    <script src="https://kit.fontawesome.com/7cd66058d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div> 
</body>
</html>