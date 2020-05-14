<?php
require("../../Includes/connection.php");
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
		$theUser = $_GET['UserID'];

		$sql = "SELECT * 
						FROM User u
						WHERE UserID = '" . $theUser . "'";

		$result = mysqli_query($conn, $sql);
		$info = mysqli_fetch_assoc($result);
		
		if(mysqli_num_rows($result) > 0){
			echo '
			<div id="profilePic">
				<img src="' . $info["ProfilePic"] . '" alt="">
			</div>
			<div id="info">
				<h2>' . $info["UserFirstName"] . ' "' .  $info["UserID"] . '" ' . $info["UserLastName"] . '</h2>
				<p>' . $info["ProfileDesc"] . '</p>
				<div id="stats">
					<p><b>15</b> Posts</p>
					<p><b>100</b> Likes</p>
					<p><b>1</b> Pinned</p>
				</div>
				<button>EDIT</button>
			</div>';
		}
		?>
	</div>

	<div id="userPosts">
		<div>

		</div>
	</div>
</section>
</body>
</html>