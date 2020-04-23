<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userIncludes/head.php';?>
	<title>ShortCircuit | Feed</title>
</head>
<body>		
	<header>
		<?php include 'userIncludes/navigation.php';?>
	</header> 

	<section id="main">

	<?php
	$sql = "SELECT * 
			FROM post p, User u
			WHERE p.UserID = u.UserID
			ORDER BY p.postTime DESC
			";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($post = mysqli_fetch_assoc($result)) {
			echo '
				<div id="post">
					<div id="postFrame">
						<div class="postImg">
							<img id="theImage" src="' . $post["PostImage"] . '" alt="">
						</div>

						<div class="postTitle"><h3>' . $post["PostTitle"] . '</h3></div>
						<div class="postInfo">
							<div class="postStats">
								<p>' . $post["PostLikes"] . ' Likes</p>
								<p>&bull;</p>
								<p>' . $post["PostTime"] . '</p>
							</div>
							<div class="postAction">
									<a href="#" id="like"><i class="fas fa-arrow-alt-circle-up"></i></a>
									<a href="#"id="comment"><i class="fas fa-arrow-alt-circle-down"></i></a>
									<a href="#" id="Pin"><i class="fas fa-thumbtack"></i></a>
							</div>
						</div>

						<div class="postUser">
						<div class="profilePic"><img src="' . $post["ProfilePic"] . '" alt=""></div>
							<div>
								<h3>' . $post["UserID"]. '</h3>
								<p>' . $post["PostDesc"] . '</p>
							</div>
						</div>
					</div>


					<div id="postCommentFrame">
							<div id="commentField">
								<h3>Comments</h3>
							
								<div class="commentUser"> ';

								$csql = "SELECT * 
								FROM Post p, Comment c, User u
								WHERE c.PostID = p.PostID
								AND c.UserID = u.UserID
								AND p.PostID = " . $post["PostID"];

								$cresult = mysqli_query($conn, $csql);

								if (mysqli_num_rows($cresult) > 0) {
									while($comment = mysqli_fetch_assoc($cresult)) {
										echo '
											<div class="theComment">
												<div class="profilePic"><img src="' . $comment["ProfilePic"] . '" alt=""></div>
													<div>
														<h3>' . $comment["UserID"]. '</h3>
														<p>' . $comment["CommentText"] . '</p>
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

		<div id="uploadContent">
			<button><i class="fas fa-plus"></i></button>
		</div>
	</section>
</body>
</html>


