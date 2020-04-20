<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" 
		  integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" 
		  crossorigin="anonymous">
	<link rel="stylesheet" href="css/profile.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>ShortCircuit | Profile</title>
</head>
<body>	
	<header>
		<?php include 'userIncludes/navigation.php';?>
	</header> 

	<section id="main">
		<div id="profilePicture">
			<img src="http://placekitten.com/500/400" alt="">
		</div>
		<div id="userInfo">
			<div id="row1">
				<h2>USERNAME</h2>
			</div>
			<div id="row2">
				<p class="bold">15</p><p class="normal">Posts</p>
				<p class="bold">100</p><p class="normal">Likes</p>
				<p class="bold">2</p><p class="normal">Pinned</p>
			</div>
			<div id="row3">
				<p class="bold">Marcus Bjerringgaard</p>
				<p class="normal">
					Danmark <br>
					Setup Lover <br>
					Mechboards for life
				</p>
			</div>
			<button>EDIT</button>
		</div>
	</section>