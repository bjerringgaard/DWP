<?php
if(isset($_POST["submit"])){
	$postTitle = trim(mysqli_real_escape_string($conn, $_POST['title']));
	$postDesc = trim(mysqli_real_escape_string($conn, $_POST['description']));
	$postUserID = trim(mysqli_real_escape_string($conn, $_SESSION['user_id']));

    if((($_FILES["file"]["type"] == "image/jpeg")
        or($_FILES["file"]["type"] == "image/gif")
        or($_FILES["file"]["type"] == "image/png")
        or($_FILES["file"]["type"] == "image/jpg"))
        && ($_FILES["file"]["size"]<2500000000)){

					if($_FILES["file"]["error"]>0){
							echo "Error: ". $_FILES["file"]["error"]."<br>";
					}
						else{
							if (file_exists("../../uploads/posts/".$_FILES["file"]["name"])){
									echo "Findes allerede";
							}
		else{
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"../../uploads/posts/".$_FILES["file"]["name"]);
			$postFile = trim(mysqli_real_escape_string($conn, $_FILES["file"]["name"]));

			$sql = "INSERT INTO `post` (PostID, PostTitle, PostDesc, PostImage, PostLikes, PostTime, IsPinned, UserID) 
			VALUES (NULL, '{$postTitle}', '{$postDesc}', '{$postFile}', 0, CURRENT_TIMESTAMP, 0, '{$postUserID}')"; 
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo '<script>window.location.href = "feed.php";</script>';			
			}
		}
	}
	else{
		echo "invalid file!";
	}
}