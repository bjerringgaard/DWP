<?php
if(isset($_POST["submit"])){
    if((($_FILES["file"]["type"] == "image/jpeg")
        or($_FILES["file"]["type"] == "image/gif")
        or($_FILES["file"]["type"] == "image/png")
        or($_FILES["file"]["type"] == "image/jpg"))
        && ($_FILES["file"]["size"]<2500000000)){


if($_FILES["file"]["error"]>0){
    echo "Error: ". $_FILES["file"]["error"]."<br>";
}else{
	echo "Upload: ". $_FILES["file"]["name"]."<br>";
	echo "Type: ". $_FILES["file"]["type"]."<br>";
	echo "Size: ". ($_FILES["file"]["size"]/1024)."<br>";
	echo "Temp folder: ". $_FILES["file"]["tmp_name"]."<br>";

			if (file_exists("../../uploads/comments/".$_FILES["file"]["name"])){
					echo "Findes allerede";
			}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"../../uploads/comments/".$_FILES["file"]["name"]);
		echo "stored in Commentupload: ". $_FILES["file"]["name"];
		
		$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
						VALUES ('Bbaggz', '".$_POST["commentText"]."', '".$_FILES["file"]["name"]."', NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
							mysqli_query($conn, $sql);
							mysqli_close($conn);	
								header("Location: feed.php");
			}

}}else{
	$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
					VALUES ('Bbaggz', '".$_POST["commentText"]."', NULL, NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
						mysqli_query($conn, $sql);
						mysqli_close($conn);	
							header("Location: feed.php");
    }}


/* 
if(isset($_POST["submit"])){
	$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
				VALUES ('Bbaggz', '".$_POST["commentText"]."', NULL, NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
        mysqli_query($conn, $sql);
		mysqli_close($conn);	

		header("Location: feed.php");
} */