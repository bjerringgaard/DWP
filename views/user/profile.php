<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");
include("userIncludes/isAdmin.php");
confirm_logged_in();
$theUser = $_GET['UserID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/profile.css">
	<title>ShortCircuit | Profile</title>
</head>
<body>	
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header> 

<section id="main">
	<div id="profileInfo">
		<?php
		$sql = "SELECT * 
						FROM user u
						WHERE UserName = '" . $theUser . "'";

		$result = mysqli_query($conn, $sql);
		$info = mysqli_fetch_assoc($result);
		
		if(mysqli_num_rows($result) > 0){
			echo '
			<div id="profilePic">
				<img src="' . $info["ProfilePic"] . '" alt="">
			</div>
			<div id="info">
				<h2>' . $info["UserFirstName"] . ' "' .  $info["UserName"] . '" ' . $info["UserLastName"] . '</h2>
				<p>' . $info["ProfileDesc"] . '</p>
				<div id="stats">
					<p><b>15</b> Posts</p>
					<p><b>100</b> Likes</p>
					<p><b>1</b> Pinned</p>
				</div>
				<button>EDIT PROFILE</button>
			</div>';
		}
		?>
	</div>

	<div id="userPosts">
		<?php 
		$psql = "SELECT p.PostID, p.PostImage, p.UserID, u.UserName
						 FROM post p, user u
						 WHERE u.UserName = '" . $theUser . "'";

		$presult = mysqli_query($conn, $psql);
		$posts = mysqli_fetch_assoc($presult);

			while($posts = mysqli_fetch_assoc($presult)) {
				echo '
					<div class="thePost">
						<img src="../../uploads/posts/' . $posts["PostImage"] . '" alt="">
					</div>';
			}
		?>
	</div>
</section>
</body>
</html>