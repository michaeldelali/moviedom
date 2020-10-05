<style>
@import url('https://fonts.googleapis.com/css2?family=Merienda+One&display=swap');    body{
  margin: 0px;
  padding: 0px;
  font-family: sans-serif;
}

.profile-bar{
  padding: 10px;
  background-color:#e9e9e9;
  display: flex;
  align-items: center;
  flex-flow: row;
  justify-content:space-between;
  margin-bottom: 10px;
  box-shadow:0 1px 1px 0 rgba(0,0,0,.24),0 1px 1px 0 rgba(0,0,0,.19); 
}
.site-logo{
  font-family: 'Merienda One', cursive;
  font-size:larger;
}

/* Account Dropdown */

.account-menu { 
  /* margin: 10px auto; */
}

.dropdown {
  position: relative;
}
.dropdown a {
  text-decoration: none;
}
.dropdown [data-toggle='dropdown'] {
  display: block;
  color: white;
  background: #1f2833;
  padding: 10px;
}
.dropdown [data-toggle='dropdown']:hover {
  background: #cd3d2e;
}
.dropdown [data-toggle='dropdown']:before {
  position: absolute;
  display: block;
  content: '\25BC';
  font-size: 0.7em;
  color: #fff;
  top: 13px;
  right: 10px;
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  -moz-transition: -moz-transform 0.6s;
  -o-transition: -o-transform 0.6s;
  -webkit-transition: -webkit-transform 0.6s;
  transition: transform 0.6s;
}
.dropdown > .dropdown-menu {
  max-height: 0;
  overflow: hidden;
  list-style: none;
  padding: 0;
  margin: 0;
  -moz-transform: scaleY(0);
  -ms-transform: scaleY(0);
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
  -moz-transform-origin: 50% 0%;
  -ms-transform-origin: 50% 0%;
  -webkit-transform-origin: 50% 0%;
  transform-origin: 50% 0%;
  -moz-transition: max-height 0.6s ease-out;
  -o-transition: max-height 0.6s ease-out;
  -webkit-transition: max-height 0.6s ease-out;
  transition: max-height 0.6s ease-out;
  animation: hideAnimation 0.4s ease-out;
  -moz-animation: hideAnimation 0.4s ease-out;
  -webkit-animation: hideAnimation 0.4s ease-out;
}
.dropdown > .dropdown-menu li {
  padding: 0;
}
.dropdown > .dropdown-menu li a {
  display: block;
  color: #6f6f6f;
  background: #EEE;
  -moz-box-shadow: 0 1px 0 white inset, 0 -1px 0 #d5d5d5 inset;
  -webkit-box-shadow: 0 1px 0 white inset, 0 -1px 0 #d5d5d5 inset;
  box-shadow: 0 1px 0 white inset, 0 -1px 0 #d5d5d5 inset;
  text-shadow: 0 -1px 0 rgba(255, 255, 255, 0.3);
  padding: 10px 10px;
}
.dropdown > .dropdown-menu li a:hover {
  background: #f6f6f6;
}
.dropdown > input[type='checkbox'] {
  opacity: 0;
  display: block;
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
}
.dropdown > input[type='checkbox']:checked ~ .dropdown-menu {
  max-height: 9999px;
  display: block;
  -moz-transform: scaleY(1);
  -ms-transform: scaleY(1);
  -webkit-transform: scaleY(1);
  transform: scaleY(1);
  animation: showAnimation 0.5s ease-in-out;
  -moz-animation: showAnimation 0.5s ease-in-out;
  -webkit-animation: showAnimation 0.5s ease-in-out;
  -moz-transition: max-height 2s ease-in-out;
  -o-transition: max-height 2s ease-in-out;
  -webkit-transition: max-height 2s ease-in-out;
  transition: max-height 2s ease-in-out;
}
.dropdown > input[type='checkbox']:checked + a[data-toggle='dropdown']:before {
  -moz-transform: rotate(-180deg);
  -ms-transform: rotate(-180deg);
  -webkit-transform: rotate(-180deg);
  transform: rotate(-180deg);
  -moz-transition: -moz-transform 0.6s;
  -o-transition: -o-transform 0.6s;
  -webkit-transition: -webkit-transform 0.6s;
  transition: transform 0.6s;
}

@keyframes showAnimation {
  0% {
    -moz-transform: scaleY(0.1);
    -ms-transform: scaleY(0.1);
    -webkit-transform: scaleY(0.1);
    transform: scaleY(0.1);
  }
  40% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  100% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
}
@-moz-keyframes showAnimation {
  0% {
    -moz-transform: scaleY(0.1);
    -ms-transform: scaleY(0.1);
    -webkit-transform: scaleY(0.1);
    transform: scaleY(0.1);
  }
  40% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  100% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
}
@-webkit-keyframes showAnimation {
  0% {
    -moz-transform: scaleY(0.1);
    -ms-transform: scaleY(0.1);
    -webkit-transform: scaleY(0.1);
    transform: scaleY(0.1);
  }
  40% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.04);
    -ms-transform: scaleY(1.04);
    -webkit-transform: scaleY(1.04);
    transform: scaleY(1.04);
  }
  100% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
}
@keyframes hideAnimation {
  0% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(0);
    -ms-transform: scaleY(0);
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
  }
}
@-moz-keyframes hideAnimation {
  0% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(0);
    -ms-transform: scaleY(0);
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
  }
}
@-webkit-keyframes hideAnimation {
  0% {
    -moz-transform: scaleY(1);
    -ms-transform: scaleY(1);
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
  60% {
    -moz-transform: scaleY(0.98);
    -ms-transform: scaleY(0.98);
    -webkit-transform: scaleY(0.98);
    transform: scaleY(0.98);
  }
  80% {
    -moz-transform: scaleY(1.02);
    -ms-transform: scaleY(1.02);
    -webkit-transform: scaleY(1.02);
    transform: scaleY(1.02);
  }
  100% {
    -moz-transform: scaleY(0);
    -ms-transform: scaleY(0);
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
  }
}


.account-menu{
  display: flex;
  align-items: center;
  margin-right: 1rem;
}

.alerts{
  margin: inherit;
}

.account-dropdown{
  margin-right: 2rem;
}

.avatar-pic{
  height: 3rem;
  width: 3rem;
  border-radius: 100%
}

.main-body{
  padding: 3rem 5rem;
  display: grid;
  grid-template-rows: 4rem 1fr;
}

.sites-widget{
  background-color: #efefef;
  height: 13rem;
  width: 29rem;
  margin: 0 1.5rem 1.5rem 0;
}

/* search bar start */
* {
	border: 0;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
 .search-bar {
  margin-right: -20px;
	display: flex;
}

.search-bar input,
.search-btn, 
.search-btn:before, 
.search-btn:after {
	transition: all 0.25s ease-out;
}
.search-bar input,
.search-btn {
	width: 3em;
	height: 3em;
}
.search-bar input:invalid:not(:focus),
.search-btn {
	cursor: pointer;
}

.search-bar input:focus,
.search-bar input:valid  {
	width: 100%;
} 
.search-bar input:focus,
.search-bar input:not(:focus) + .search-btn:focus {
	outline: transparent;
}
.search-bar {
	margin: auto;
	padding: 1.5em;
	justify-content: center;
	max-width: 30em;
}
.search-bar input {
	background: transparent;
	border-radius: 1.5em;
	box-shadow: 0 0 0 0.4em #171717 inset;
	padding: 0.75em;
	transform: translate(0.5em,0.5em) scale(0.5);
	transform-origin: 100% 0;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
.search-bar input::-webkit-search-decoration {
	-webkit-appearance: none;
}
.search-bar input:focus,
.search-bar input:valid {
	background: #fff;
	border-radius: 0.375em 0 0 0.375em;
	box-shadow: 0 0 0 0.1em #d9d9d9 inset;
	transform: scale(1);
}
.search-btn {
	background: #171717;
	border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
	padding: 0.75em;
	position: relative;
	transform: translate(0.25em,0.25em) rotate(45deg) scale(0.25,0.125);
	transform-origin: 0 50%;
}
.search-btn:before, 
.search-btn:after {
	content: "";
	display: block;
	opacity: 0;
	position: absolute;
}
.search-btn:before {
	border-radius: 50%;
	box-shadow: 0 0 0 0.2em #f1f1f1 inset;
	top: 0.75em;
	left: 0.75em;
	width: 1.2em;
	height: 1.2em;
}
.search-btn:after {
	background: #f1f1f1;
	border-radius: 0 0.25em 0.25em 0;
	top: 51%;
	left: 51%;
	width: 0.75em;
	height: 0.25em;
	transform: translate(0.2em,0) rotate(45deg);
	transform-origin: 0 50%;
}
.search-btn span {
	display: inline-block;
	overflow: hidden;
	width: 1px;
	height: 1px;
}

/* Active state */
.search-bar input:focus + .search-btn,
.search-bar input:valid + .search-btn {
	background: #2762f3;
	border-radius: 0 0.375em 0.375em 0;
	transform: scale(1);
}
.search-bar input:focus + .search-btn:before, 
.search-bar input:focus + .search-btn:after,
.search-bar input:valid + .search-btn:before, 
.search-bar input:valid + .search-btn:after {
	opacity: 1;
}
.search-bar input:focus + .search-btn:hover,
.search-bar input:valid + .search-btn:hover,
.search-bar input:valid:not(:focus) + .search-btn:focus {
	background: #0c48db;
}
.search-bar input:focus + .search-btn:active,
.search-bar input:valid + .search-btn:active {
	transform: translateY(1px);
}
/* search bar end*/
.register{
  margin-right:20px;
  padding:10px;
  background:#3fe0d0;
  border-radius:5px;
}
.register a{
  font-weight:bold;
}
.register:hover{
  background:#7fece7
}


</style>
<?php 
include_once 'dbConfig.php';
// if logged IN
if(isset($_SESSION['username'])){
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location:registration.php");
  }
  echo"
    <div class='profile-bar'>
        <div class='site-logo'><h1>MOVIEDOM</h1></div>
          <div class='account-menu'>
            <form action='search.php' method='post' class='search-bar'>
              <input type='search' name='search' pattern='.*\S.*' required>
              <button class='search-btn' type='submit' name ='submit-search'>
                <span>Search</span>
              </button>
            </form>
            <div class='alerts' >
            <a href='./index.php'>
              <i class='fas fa-home' style='font-size: 40px;'></i>  
            </a>
            </div>
            <div class='account-dropdown'>
              <li class='dropdown'>
                <input type='checkbox' />
                <a href='#' data-toggle='dropdown'> <strong>".$_SESSION['username']."</strong></a>
                <ul class='dropdown-menu'>
                  <li><a href='profile.php'>Edit Profile</a></li>
                  <li><a href='index.php? logout= '1''>Logout</a></li>
                </ul>";
    echo  "</div>";
    echo " <a href='./profile.php'>";
              $id = $_SESSION['id'];
              $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
              $resultImg = mysqli_query($db, $sqlImg);
              while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                      if ($rowImg['status'] == 0) {
                          $fileName = "C:/xampp/htdocs/MOVIEDOM/images/profile/profile" . $id . "*";
                          $fileInfo = glob($fileName);
                          $fileExt = explode(".", $fileInfo[0]);
                          $fileActualExt = $fileExt[1];
                          echo "<img src='../../images/profile/profile".$id.".".$fileActualExt."?".mt_rand()."' class='avatar-pic'>";
                      } else{
                          echo "<img src='../../images/profile/defaultprofile.png' class='avatar-pic'/>";
                      }
                  }
    echo "  </a>";
    echo  "</div>
        </div>
    </div>
    ";
}else{
  // if not logged in.
  echo"
  <div class='profile-bar'>
      <div class='site-logo'><h1>MOVIEDOM</h1></div>
        <div class='account-menu'>
          <form action='search.php' method='post' class='search-bar'>
            <input type='search' name='search' pattern='.*\S.*' required>
            <button class='search-btn' type='submit' name ='submit-search'>
              <span>Search</span>
            </button>
          </form>
          <div class='alerts' >
            <a href='./index.php'>
              <i class='fas fa-home' style='font-size: 40px;'></i>  
            </a>
          </div> 
          <div class='register'><a href='registration.php'>LOGIN</a></div>
          <div class='register'><a href='registration.php'>SIGNUP</a></div>";
  echo " <a href='./registration.php'>";
  echo "<img src='../../images/profile/defaultprofile.png' class='avatar-pic'/>";
  echo "  </a>";
  echo  "</div>
      </div>
  </div>
  ";
}
  ?>

