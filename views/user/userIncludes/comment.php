<?php
if(isset($_POST["submit"])){
	$sessionUserID = trim(mysqli_real_escape_string($conn, $_SESSION['user_id']));
	$commentText = trim(mysqli_real_escape_string($conn, $_POST['commentText']));
	$commentStyle = trim(mysqli_real_escape_string($conn, $_POST['textStyle']));
	$commentPostID = trim(mysqli_real_escape_string($conn, $_POST['PostID']));

    if((($_FILES["file"]["type"] == "image/jpeg")
        or($_FILES["file"]["type"] == "image/gif")
        or($_FILES["file"]["type"] == "image/png")
        or($_FILES["file"]["type"] == "image/jpg"))
        && ($_FILES["file"]["size"]<2500000000)){

			if($_FILES["file"]["error"]>0){
				echo "Error: ". $_FILES["file"]["error"]."<br>";
			}
				else{
					if (file_exists("../../uploads/comments/".$_FILES["file"]["name"])){
							echo "Findes allerede";
					}
		else{
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"../../uploads/comments/".$_FILES["file"]["name"]);
			$commentFile = trim(mysqli_real_escape_string($conn, $_FILES["file"]["name"]));

			$sql = "INSERT INTO `comment` (CommentID, UserID, CommentText, CmtAttachement, TextStylingID, CommentTimeStamp, PostID) 
				VALUES (NULL, '{$sessionUserID}', '{$commentText}', '{$commentFile}', '{$commentStyle}' , CURRENT_TIMESTAMP, '{$commentPostID}')"; 
					mysqli_query($conn, $sql);
					mysqli_close($conn);
					echo '<script>window.location.href = "feed.php";</script>';
			}
		}
	}
	else{
	$sql = "INSERT INTO `comment` (CommentID, UserID, CommentText, CmtAttachement, TextStylingID, CommentTimeStamp, PostID) 
					VALUES (NULL, '{$sessionUserID}', '{$commentText}', NULL, '{$commentStyle}' , CURRENT_TIMESTAMP, '{$commentPostID}')";
					mysqli_query($conn, $sql);
					mysqli_close($conn);
					echo '<script>window.location.href = "feed.php";</script>';			
	}
}
?>