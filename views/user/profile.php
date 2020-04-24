<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="css/profile.css">
	<title>ShortCircuit | Profile</title>
</head>
<body>	
	<header>
		<?php include 'userTemplates/navigation.php';?>
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