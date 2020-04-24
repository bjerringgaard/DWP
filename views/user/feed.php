<?php
require("../../Includes/connection.php");
include("userIncludes/date.php");
include("userIncludes/comment.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="css/feed.css">
	<title>ShortCircuit | Feed</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
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
							<img id="theImage" src="../../uploads/posts/' . $post["PostImage"] . '" alt="">
						</div>

						<div class="postTitle"><h3>' . $post["PostTitle"] . '</h3></div>
						<div class="postInfo">
							<div class="postStats">
								<p>' . $post["PostLikes"] . ' LIKES</p>
								<p>&bull;</p>
								<p id="postTime">' . timeAgo($post["PostTime"]) . '</p>
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


							echo '</div>	
							</div>
							<div id="writeComment">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" id="PostID" name="PostID" value="' . $post["PostID"] . '">
								<input type="text" name="commentText">
								<input type="file" name="file" id="file"></input>
								<label for="file"><i class="fas fa-paperclip"></i></label>
								<input type="submit" name="submit" class="btn fa-input" value="send"></input>
							</form>
							</div>
						</div>
				</div>	';
		}
	} else {
		echo "0 results";
	} ?>

		<div id="uploadContent">
			<a href="postUpload.php"><button><i class="fas fa-plus"></i></button></a>
		</div>
	</section>
</body>
</html>


