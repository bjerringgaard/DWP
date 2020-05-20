<?php
require("../../Includes/Includer.php");
include("userIncludes/isAdmin.php");

include("userIncludes/commentStyling.php");
include("userIncludes/date.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/discoverPages.css">
	<title>ShortCircuit | Most Liked</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardLike">
			<i class="fas fa-heart"></i>
			<h3>Most Liked</h3>
		</div>
	<?php
	$sql = "SELECT * 
			FROM post p, user u
			WHERE p.UserID = u.UserID
			ORDER BY p.postLikes DESC
			";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($post = mysqli_fetch_assoc($result)) {
			echo '
			<div id="post">
			<div id="postFrame">
				<div class="postImg"><img id="theImage" src="../../uploads/posts/' . $post["PostImage"] . '" alt=""></div>
				<div class="postTitle"><h3>' . $post["PostTitle"] . '</h3></div>
				<div class="postInfo">
					<div class="postStats">
						<p>' . $post["PostLikes"] . ' LIKES</p>
						<p>&bull;</p>
						<p id="postTime">' . timeAgo($post["PostTime"]) . '</p>
					</div>
					<div class="postAction">
							<a href="userIncludes/postlikePLUS.php?PostID=' . $post["PostID"]. '" id="like"><i class="fas fa-arrow-alt-circle-up"></i></a>
							<a href="userIncludes/postlikeMINUS.php?PostID=' . $post["PostID"]. '"id="comment"><i class="fas fa-arrow-alt-circle-down"></i></a>
							<a href="#" id="pin"' . $adminclass . '><i class="fas fa-thumbtack"></i></a>
					</div>
				</div>
		
				<div class="postUser">
					<div class="profilePic"><img src="' . $post["ProfilePic"] . '" alt=""></div>
					<div>
						<a href="profile.php?UserID=' . $post["UserName"]. '"><h3>' . $post["UserName"]. '</h3></a>
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
					FROM post p, comment c, user u, textstyling t
					WHERE c.PostID = p.PostID
					AND c.UserID = u.UserID
					AND c.TextStylingID = t.TextStylingID
					AND p.PostID = " . $post["PostID"];
		
					$cresult = mysqli_query($conn, $csql);
		
						if (mysqli_num_rows($cresult) > 0) {
							while($comment = mysqli_fetch_assoc($cresult)) {
								echo '
					<div class="commentUser">
						<div class="theComment">
							<div class="profilePic"><img src="' . $comment["ProfilePic"] . '" alt=""></div>
							<div>
								<a href="profile.php?UserID=' . $comment["UserName"]. '"><h3>' . $comment["UserName"]. '</h3></a>
								<p class="' . $comment["TextStylingColor"] . ' ' . $comment["TextStylingFont"] . '">' . $comment["CommentText"] . '</p>
								<div class="commentImg"><img id="theCmtImage" src="../../uploads/comments/' . $comment["CmtAttachement"] . '" alt=""></div>
						 </div>
					</div> 
				</div>
				'; 
							} 
						}
		
				echo'</div>
					<a id="commentlink" href="commentUpload.php?PostID=' . $post["PostID"] . '">
						<div id="writeComment">
							<p>Write Comment</p>
						</div>
						</a>
				</div>
			</div>
		</div>';
			}
		} else {
			echo "0 results";
		} ?>
	</section>