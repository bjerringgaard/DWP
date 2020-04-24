<?php

/* INSERT INTO Comment (UserID, CommentTimeStamp, CommentText, PostID)
VALUES (
    'HelloItIsMeJohnFaxe!',
    '2020/04/05',
    'Hello',
    2
); */

if(isset($_POST["submit"])){
	$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
				VALUES ('Bbaggz', '".$_POST["commentText"]."', NULL, NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
        mysqli_query($conn, $sql);
		mysqli_close($conn);	

		header("Location: feed.php");
}