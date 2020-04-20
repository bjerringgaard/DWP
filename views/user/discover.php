<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/discover.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>ShortCircuit | Discover</title>
</head>
<body>		
	<header>
		<?php include 'userIncludes/navigation.php';?>
	</header>
	
	<section id="main">
		<h2>Hot Stuff</h2>
		<div id="discoverCards">
			<a href="">
			<div class="card" id="cardLike">
				<i class="fas fa-heart"></i>
				<h3>Most Liked</h3>
			</div>
			</a>
			<a href="">
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