<?php
require("../../../Includes/connection.php");
include("../userIncludes/date.php");
include("../userIncludes/comment.php");
require_once("../../../Includes/session.php");
require_once("../../../Includes/functions.php");
include("../userIncludes/isAdmin.php");
confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../userTemplates/head.php';?>
	<link rel="stylesheet" href="css/discoverPages.css">
	<title>ShortCircuit | Most Commented</title>
</head>
<body>		
	<header>
		<?php include '../userTemplates/navigationDiscover.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardComment">
			<i class="fas fa-comment"></i>
			<h3>Most Commented</h3>
		</div>
	<?php
	$sql = "SELECT * FROM commentamountview";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($post = mysqli_fetch_assoc($result)) {
			echo '
<div id="post">
	<div id="postFrame">
		<div class="postImg"><img id="theImage" src="../../../uploads/posts/' . $post["PostImage"] . '" alt=""></div>
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
					<a href="#" id="isAdmin"' . $adminclass . '><i class="fas fa-thumbtack"></i></a>
			</div>
		</div>

		<div class="postUser">
			<div class="profilePic"><img src="' . $post["ProfilePic"] . '" alt=""></div>
			<div>
				<h3>' . $post["UserName"]. '</h3>
				<p>' . $post["PostDesc"] . '</p>
			</div>
		</div>
	</div>


	<div id="postCommentFrame">';
		$asql = "SELECT COUNT(*) As CommentAmount
				FROM comment
				WHERE PostID=" . $post["PostID"];
				$aresult = mysqli_query($conn, $asql);
				
				if (mysqli_num_rows($aresult) > 0) {
					$cmtAmount = mysqli_fetch_assoc($aresult);
					echo '<h3>' . $cmtAmount["CommentAmount"] . ' Comments</h3>';
					
				}else{
					echo '<h3> 0 Comments</h3>';
				}
		echo '
		<div id="commentField">';
			$csql = "SELECT * 
			FROM post p, comment c, user u
			WHERE c.PostID = p.PostID
			AND c.UserID = u.UserID
			AND p.PostID = " . $post["PostID"];

			$cresult = mysqli_query($conn, $csql);

				if (mysqli_num_rows($cresult) > 0) {
					while($comment = mysqli_fetch_assoc($cresult)) {
						echo '
			<div class="commentUser">
				<div class="theComment">
					<div class="profilePic"><img src="' . $comment["ProfilePic"] . '" alt=""></div>
					<div>
						<h3>' . $comment["UserName"]. '</h3>
						<p>' . $comment["CommentText"] . '</p>
						<div class="commentImg"><img id="theCmtImage" src="../../uploads/comments/' . $comment["CmtAttachement"] . '" alt=""></div>
				 </div>
			</div> 
		</div>
		'; 
					} 
				}

		echo ' </div>
		<div id="writeComment">
			<form action="" method="POST" enctype="multipart/form-data" name="' . $post["PostID"] . '">
				<input type="hidden" id="PostID" name="PostID" value="' . $post["PostID"] . '">
				<input type="text" name="commentText">
				<input type="file" name="file[]" id="file"></input>
				<label for="file"><i class="fas fa-paperclip"></i></label>
				<input type="submit" name="submit" class="btn fa-input" value="send"></input>
			</form>
			</div>
		</div>
	</div>
</div>';
	}
} else {
	echo "0 results";
} ?>
	</section>