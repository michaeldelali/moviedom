<?php
include './dbConfig.php';


if(isset($_POST["commentSubmit"])){
	$comment = mysqli_real_escape_string($db, $_POST['commentText']);
	$rate = mysqli_real_escape_string($db, $_POST['rate']);
	$movieId = mysqli_real_escape_string($db,$_POST['movieId']);
	$userId = mysqli_real_escape_string($db,$_POST['userId']);
	$previous = mysqli_real_escape_string($db,$_POST['previous']);


	$query= "INSERT INTO comments(movieId,userId,comment,rate) VALUES ('$movieId','$userId','$comment','$rate')";
	mysqli_query($db,$query);
	if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
  }

function getComments($db,$movieId,$userId){
	$query = $db->query("SELECT * FROM user WHERE id = $userId");
	if($query->num_rows > 0){
		$users = $query->fetch_assoc();
		$username= $users['username']; 
 }
 $query = $db->query("SELECT * FROM comments WHERE movieId = $movieId ORDER BY commented_on DESC LIMIT 4");
 if($query->num_rows > 0){
	 while($comment = $query->fetch_assoc()){
	 $movieId = $comment['movieId']; 
	$userId = $comment['userId'];
	$userComment = $comment['comment'];
	$rate = $comment['rate'];
	$date = $comment['commented_on'];


$datetime = new DateTime($date); 
echo "   <div class='comment-wrap'>
<div class='photo'>
	<div class='avatar'>";
	$id = $userId;
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
				echo "<img src='../../images/profile/defaultprofile.png'/>";
			}
		}
echo "</div>
</div>
<div class='comment-block'>
	<p class='comment-text'>$userComment</p>
	<div class='bottom-comment'>
		<div class='comment-date'>".$datetime ->format('d F Y, h:i:s A')." </div>
		<ul class='comment-actions'>
			 <li class='complain'>RATING $rate%</li>
		</ul>
	</div>
</div>
</div>";
		}
	}
}
?>