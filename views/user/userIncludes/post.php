<?php
echo '
<div id="post">
	<div id="postFrame">
		<div class="postImg"><img id="theImage" src="../../uploads/posts/' . htmlspecialchars($post["PostImage"]) . '" alt=""></div>
		<div class="postTitle"><h3>' . htmlspecialchars($post["PostTitle"]) . '</h3></div>
		<div class="postInfo">
			<div class="postStats">
				<p>' . htmlspecialchars($post["PostLikes"]) . ' LIKES</p>
				<p>&bull;</p>
				<p id="postTime">' . htmlspecialchars(timeAgo($post["PostTime"])) . '</p>
			</div>
			<div class="postAction">
					<a href="userIncludes/postlikePLUS.php?PostID=' . htmlspecialchars($post["PostID"]). '" id="like"><i class="fas fa-arrow-alt-circle-up"></i></a>
					<a href="userIncludes/postlikeMINUS.php?PostID=' . htmlspecialchars($post["PostID"]). '"id="comment"><i class="fas fa-arrow-alt-circle-down"></i></a>
					<a href="#" id="pin"' . $adminclass . '><i class="fas fa-thumbtack"></i></a>
			</div>
		</div>

		<div class="postUser">
			<div class="profilePic"><img src="' . htmlspecialchars($post["ProfilePic"]) . '" alt=""></div>
			<div>
				<a href="profile.php?UserID=' . htmlspecialchars($post["UserName"]). '"><h3>' . htmlspecialchars($post["UserName"]). '</h3></a>
				<p>' . htmlspecialchars($post["PostDesc"]) . '</p>
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
					echo '<h3>' . htmlspecialchars($cmtAmount["CommentAmount"]) . ' Comments</h3>';
					
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
					<div class="profilePic"><img src="' . htmlspecialchars($comment["ProfilePic"]) . '" alt=""></div>
					<div>
						<a href="profile.php?UserID=' . htmlspecialchars($comment["UserName"]). '"><h3>' . htmlspecialchars($comment["UserName"]). '</h3></a>
						<p class="' . htmlspecialchars($comment["TextStylingColor"]) . ' ' . htmlspecialchars($comment["TextStylingFont"]) . '">' . htmlspecialchars($comment["CommentText"]) . '</p>
						<div class="commentImg"><img id="theCmtImage" src="../../uploads/comments/' . htmlspecialchars($comment["CmtAttachement"]) . '" alt=""></div>
				 </div>
			</div> 
		</div>
		'; 
					} 
				}

		echo'</div>
			<a id="commentlink" href="commentUpload.php?PostID=' . htmlspecialchars($post["PostID"]) . '">
				<div id="writeComment">
					<p>Write Comment</p>
				</div>
				</a>
		</div>
	</div>
</div>';
?>