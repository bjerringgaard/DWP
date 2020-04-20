<?php
require("../../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link rel="stylesheet" href="discoverPages.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>ShortCircuit | IsPinned</title>
</head>
<body>		
	<header>
		<?php include '../userIncludes/navigationDiscover.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardLike">
			<i class="fas fa-heart"></i>
			<h3>Most Liked</h3>
		</div>
	<?php
	$sql = "SELECT * 
			FROM post p, User u
			WHERE p.UserID = u.UserID
			ORDER BY p.postLikes DESC
			";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo '
			<div id="post">
				<div id="postFrame">
					<div class="postImg">
						<img id="theImage" src="' . $row["PostImage"] . '" alt="">
					</div>

					<div class="postTitle"><h3>' . $row["PostTitle"] . '</h3></div>
					<div class="postInfo">
						<div class="postStats">
							<p>' . $row["PostLikes"] . ' Likes</p>
							<p>&bull;</p>
							<p>' . $row["PostTime"] . '</p>
						</div>
						<div class="postAction">
								<a href="#" id="like"><i class="fas fa-heart"></i></a>
								<a href="#"id="comment"><i class="fas fa-comment"></i></a>
								<a href="#" ><i class="fas fa-thumbtack"></i></a>
						</div>
					</div>

					<div class="postUser">
					<div class="profilePic"><img src="' . $row["ProfilePic"] . '" alt=""></div>
						<div>
							<h3>' . $row["UserID"]. '</h3>
							<p>' . $row["PostDesc"] . '</p>
						</div>
					</div>
				</div>


				<div id="postCommentFrame">
						<div id="commentField">
							<h3>100 Comments</h3>
						
							<div class="commentUser"> ';

							$csql = "SELECT * 
							FROM Post p, Comment c, User u
							WHERE c.PostID = p.PostID
							AND c.UserID = u.UserID
							";

							$cresult = mysqli_query($conn, $csql);

							if (mysqli_num_rows($cresult) > 0) {
							// output data of each row
								while($row = mysqli_fetch_assoc($cresult)) {
									echo '
										<div class="theComment">
											<div class="profilePic"><img src="' . $row["ProfilePic"] . '" alt=""></div>
												<div>
													<h3>' . $row["UserID"]. '</h3>
													<p>' . $row["CommentText"] . '</p>
												</div>
										</div> '; 
								} 
							}


						echo '	</div>	
						</div>

						<div id="writeComment">
							<input type="text">
							<button><i class="fas fa-paperclip"></i></button>
							<button id="paper-plane"><i class="fas fa-paper-plane"></i></button>
						</div>
					</div>
			</div>	';
		
		}
	} else {
		echo "0 results";
	} ?>
	</section>