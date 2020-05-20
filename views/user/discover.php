<?php
require("../../Includes/Includer.php");
include("userIncludes/isAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/discover.css">
	<title>ShortCircuit | Discover</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<h2>Hot Stuff</h2>
		<div id="discoverCards">
			<a href="MostLikes.php">
			<div class="card" id="cardLike">
				<i class="fas fa-heart"></i>
				<h3>Most Liked</h3>
			</div>
			</a>
			<a href="MostCommented.php">
			<div class="card" id="cardComment">
				<i class="fas fa-comment"></i>
				<h3>Most Commented</h3>
			</div>
			</a>
			<a href="IsPinned.php">
			<div class="card" id="cardPinned">
				<i class="fas fa-thumbtack"></i>
				<h3>Admin Pinned</h3>
			</div>
			</a>
		</div>
		<h2>Categories</h2>
		<p>Coming Soon...</p>
	</section>