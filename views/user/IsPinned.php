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
	<title>ShortCircuit | Admin Pinned</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardPinned">
			<i class="fas fa-thumbtack"></i>
			<h3>Admin Pinned</h3>
		</div>
	<?php
	$sql = "SELECT * 
			FROM post p, user u
			WHERE p.UserID = u.UserID
			AND p.IsPinned = 1
			ORDER BY p.PostID DESC
			";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($post = mysqli_fetch_assoc($result)) {
			include("userIncludes/post.php");
			}
		} else {
			echo "0 results";
		} ?>
	</section>