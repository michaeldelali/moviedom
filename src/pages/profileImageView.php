<?php
function getProfileimg(){
    $id = $_SESSION['id'];
    $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
    $resultImg = mysqli_query($db, $sqlImg);
    while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            if ($rowImg['status'] == 0) {
                $fileName = "images/profile/profile" . $id . "*";
                $fileInfo = glob($fileName);
                $fileExt = explode(".", $fileInfo[0]);
                $fileActualExt = $fileExt[1];
                echo "<img src='./images/profile/profile".$id.".".$fileActualExt."?".mt_rand()."' style=height:300px>";
            } else{
                echo "<img src='./images/profile/defaultprofile.png'";
            }
    }
    ?>