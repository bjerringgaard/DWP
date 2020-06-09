<?php
require("../../Includes/Includer.php");
include("userIncludes/isAdmin.php");

include("userIncludes/commentStyling.php");
include("userIncludes/date.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/discoverPages.css">
	<title>ShortCircuit | Most Liked</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardLike">
			<i class="fas fa-heart"></i>
			<h3>Most Liked</h3>
		</div>
	<?php
	$sql = "SELECT * 
			FROM post p, user u
			WHERE p.UserID = u.UserID
			ORDER BY p.postLikes DESC
			";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($post = mysqli_fetch_assoc($result)) {
			include("userIncludes/post.php");
			}
		} else {
			echo "0 results";
		} ?>
	</section>