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
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>Feed</title>
</head>
<body>
	<div id="wrapper"> 
		
	<header>
		<div class="sideBar"></div> 
	<div id="logo"><a href="feed.php">ShortCircuit</a></div>
		<nav>
		<a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
		<ul>
			<li><a href="#"><i class="fas fa-home"></i></a></li>
			<li><a href="#categories"><i class="fas fa-compass"></i></a></li>
			<li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li>
			<li><a href="#settings"><i class="fas fa-cog"></i></a></li>
		</ul>
		</nav>
		<div class="sideBar"></div> 
	</header> 

	<section id="main">
		<div class="postFrame">
			<div class="postByUser">
				<div id="profilePicName">
					<i class="fas fa-user-circle"></i>
					<h3>username</h3>
				</div>
				<div id="timestamp"><p>23/3/2020</p></div>
			</div>

			<div class="postImg">
			<img src="http://placekitten.com/500/500" alt="">
			</div>

			<div class="postAction">
				<div id="likeComment">
					<a href="#" id="like"><i class="fas fa-heart"></i></a>
					<a href="#"id="comment"><i class="fas fa-comment"></i></a>
				</div>
				<div id="pin"><a href="#" ><i class="fas fa-thumbtack"></i></a></div>
			</div>

			<div class="postComments">
				<p id="postUsername"><b>Username</b></p>
				<p id="postTitle">Hello world!</p>
			</div>
		</div>
<!-- ---------------------------- TEST Image ----------------------->
		<div class="postFrame">
			<div class="postByUser">
				<div id="profilePicName">
					<i class="fas fa-user-circle"></i>
					<h3>username</h3>
				</div>
				<div id="timestamp"><p>23/3/2020</p></div>
			</div>

			<div class="postImg">
				<img src="http://placekitten.com/500/400" alt="">
			</div>

			<div class="postAction">
				<div id="likeComment">
					<a href="#" id="like"><i class="fas fa-heart"></i></a>
					<a href="#"id="comment"><i class="fas fa-comment"></i></a>
				</div>
				<div id="pin"><a href="#" ><i class="fas fa-thumbtack"></i></a></div>
			</div>

			<div class="postComments">
				<p id="postUsername"><b>Username</b></p>
				<p id="postTitle">Hello world!</p>
			</div>
		</div>
<!-- ---------------------------- TEST Image End ----------------------->

		<div id="uploadContent">
			<button><i class="fas fa-plus"></i></button>
		</div>
	</section>
</body>
</html>