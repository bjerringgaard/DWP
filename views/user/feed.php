<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/feed.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">

	<title>Feed</title>
</head>
<body>
	<div id="wrapper"> 
		
	<header>
		<div class="sideBar"></div> 
	<div id="logo">ShortCircuit</div>
		<nav>
		<a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
		<ul>
			<li><a href="#"><i class="fas fa-home"></i>Home</a></li>
			<li><a href="#categories"><i class="fas fa-compass"></i>Discover</a></li>
			<li><a href="#profile"><i class="fas fa-user-circle"></i>Profile</a></li>
			<li><a href="#settings"><i class="fas fa-cog"></i>Settings</a></li>
		</ul>
		</nav>
		<div class="sideBar"></div> 
	</header> 

	<section id="main">
		<div class="postFrame">
			<div class="postByUser">
				<i class="fas fa-user-circle"></i>
				<h3>username</h3>
			</div>
			<div class="postImg"></div>
			<div class="postAction">
				<button id="like"><i class="fas fa-heart"></i></button>
				<button id="comment"><i class="fas fa-comment"></i></button>
				<button id="Pin"><i class="fas fa-thumbtack"></i></button>
			</div>
		</div>
	</section>
</body>
</html>