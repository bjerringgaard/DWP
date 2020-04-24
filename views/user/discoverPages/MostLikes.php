<?php
require("../../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../userTemplates/head.php';?>
	<link rel="stylesheet" href="discoverPages.css">
	<title>ShortCircuit | Most Liked</title>
</head>
<body>		
	<header>
		<?php include '../userTemplates/navigationDiscover.php';?>
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