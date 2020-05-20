<?php
require("../../Includes/Includer.php");
include("userIncludes/isAdmin.php");
$theUser = $_GET["UserID"];
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
// Info getter 
	$sqlinfo = "SELECT * FROM user WHERE UserName = '" . $theUser . "'";
		$resultinfo = mysqli_query($conn, $sqlinfo);
		$info = mysqli_fetch_assoc($resultinfo);

// Image getter
		$sqlimg = "SELECT u.ProfilePic, u.ProfileDesc, u.UserFirstName, u.UserName, u.UserLastName, u.UserID, p.PostImage, p.UserID  
						FROM user u, post p
						WHERE u.UserID = p.UserID
						AND u.UserName = '" . $theUser . "'";
		$imgresult = mysqli_query($conn, $sqlimg);

// Post Calculation
		$sqlsum = "SELECT SUM(p.PostLikes) AS SumPostLikes, SUM(p.IsPinned) AS SumIsPinned, COUNT(p.PostID) AS SumPostAmount
						FROM user u, post p
						WHERE u.UserID = p.UserID
						AND u.UserName = '" . $theUser . "'";
		
		$sumresult = mysqli_query($conn, $sqlsum);
		$sum = mysqli_fetch_assoc($sumresult);

		
// SUM IS PINNED
$SumIsPinned = '';
	if($sum["SumIsPinned"] == NULL){$SumIsPinned = '0';}
	else{$SumIsPinned = $sum["SumIsPinned"];}

// SUM POST LIKES
$SumPostLikes = '';
	if($sum["SumPostLikes"] == NULL){$SumPostLikes = '0';}
	else{$SumPostLikes = $sum["SumPostLikes"];}

// CREATE PAGE 
		if(mysqli_num_rows($resultinfo) > 0){
			echo '
			<div id="profilePic">
				<img src="' . $info["ProfilePic"] . '" alt="">
			</div>
			<div id="info">
				<h2>' . $info["UserFirstName"] . ' "' .  $info["UserName"] . '" ' . $info["UserLastName"] . '</h2>
				<p>' . $info["ProfileDesc"] . '</p>
				<div id="stats">
					<p><b>' . $sum["SumPostAmount"] . '</b> Posts</p>
					<p><b>' . $SumPostLikes . '</b> Likes</p>
					<p><b>' . $SumIsPinned . '</b> Pinned</p>
				</div>
				<button ' . $adminclass . '>EDIT PROFILE</button>
			</div>
			</div>
				<div id="userPosts">';
				while($img = mysqli_fetch_assoc($imgresult)){
					echo '
						<div class="thePost">
							<img src="../../uploads/posts/' . $img["PostImage"] . '" alt="">
						</div>';
				}
				echo '</div>';
		}
		?>
</section>
</body>
</html>