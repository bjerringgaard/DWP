<?php
require("../../Includes/connection.php");
?>
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

	<title>ShortCircuit | Feed</title>
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

	<?php
	$sql = "SELECT * FROM post";
	$result = mysqli_query($conn, $sql);
/*
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo '
			<div class="postFrame">
			<div class="postByUser">
				<div id="profilePicName">
					<i class="fas fa-user-circle"></i>
					<h3>' . $row["UserID"]. '</h3>
				</div>
				<div id="timestamp"><p>' . $row["PostTime"] . '</p></div>
			</div>

			<div class="postImg">
			<img src="' . $row["PostImage"] . '" alt="">
			</div>

			<div class="postAction">
				<div id="likeComment">
					<a href="#" id="like"><i class="fas fa-heart"></i></a>
					<a href="#"id="comment"><i class="fas fa-comment"></i></a>
				</div>
				<div id="pin"><a href="#" ><i class="fas fa-thumbtack"></i></a></div>
			</div>

			<div class="postLikes">
			<p>' . $row["PostLikes"] . ' Likes</p>
			</div>

			<div class="postComments">
				<p id="postUsername"><b>' . $row["UserID"]. '</b></p>
				<p id="postTitle">' . $row["PostTitle"] . '</p>
			</div>
		</div>
			';
			
		}
	} else {
		echo "0 results";
	} */?>
<div id="post">
	<div id="postFrame">
		<div class="postImg">
			<img id="theImage" src="https://placekitten.com/1920/1080" alt="">
		</div>

		<div class="postTitle"><h3>Hello Kitten</h3></div>
		<div class="postInfo">
			<div class="postStats">
				<p>4 Likes</p>
				<p>&bull;</p>
				<p>18-03-2020</p>
			</div>
			<div class="postAction">
					<a href="#" id="like"><i class="fas fa-heart"></i></a>
					<a href="#"id="comment"><i class="fas fa-comment"></i></a>
					<a href="#" ><i class="fas fa-thumbtack"></i></a>
			</div>
		</div>

		<div class="postUser">
			<i class="fas fa-user-circle"></i>
			<div>
				<h3>Bbaggz</h3>
				<p>Dette er min beskrivelse</p>
			</div>
		</div>
	</div>


	<div id="postCommentFrame">
			<div id="commentField">
				<h3>100 Comments</h3>
			
				<div class="commentUser">
					<i class="fas fa-user-circle"></i>
					<div>
						<h3>Marcus</h3>
						<p>Dette er min kommentar</p>
					</div>
				</div>
			</div>
			<div id="writeComment">
				<i class="fas fa-user-circle"></i>
				<input type="text">
				<button><i class="fas fa-paper-plane"></i></button>
			</div>
		</div>
</div>


		<div id="uploadContent">
			<button><i class="fas fa-plus"></i></button>
		</div>
	</section>

	<script>
		var img = document.getElementById('theImage');
		var imgHeight = img.clientHeight;

		document.getElementById('postCommentFrame').style.height = imgHeight+'px';
	</script>

</body>
</html>