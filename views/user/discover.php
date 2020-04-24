<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userIncludes/head.php';?>
	<link rel="stylesheet" href="css/discover.css">
	<title>ShortCircuit | Discover</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<h2>Hot Stuff</h2>
		<div id="discoverCards">
			<a href="discoverPages/MostLikes.php">
			<div class="card" id="cardLike">
				<i class="fas fa-heart"></i>
				<h3>Most Liked</h3>
			</div>
			</a>
			<a href="discoverPages/MostCommented.php">
			<div class="card" id="cardComment">
				<i class="fas fa-comment"></i>
				<h3>Most Commented</h3>
			</div>
			</a>
			<a href="discoverPages/IsPinned.php">
			<div class="card" id="cardPinned">
				<i class="fas fa-thumbtack"></i>
				<h3>Admin Pinned</h3>
			</div>
			</a>
		</div>
		<h2>Categories</h2>
		<p>Coming Soon...</p>
	</section>