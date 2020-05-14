<?php
if(isset($_POST["submit"])){
    if((($_FILES[0]["file"]["type"] == "image/jpeg")
        or($_FILES[0]["file"]["type"] == "image/gif")
        or($_FILES[0]["file"]["type"] == "image/png")
        or($_FILES[0]["file"]["type"] == "image/jpg"))
        && ($_FILES[0]["file"]["size"]<2500000000)){
					

if($_FILES[0]["file"]["error"]>0){
    echo "Error: ". $_FILES[0]["file"]["error"]."<br>";
}else{
	echo "Upload: ". $_FILES[0]["file"]["name"]."<br>";
	echo "Type: ". $_FILES[0]["file"]["type"]."<br>";
	echo "Size: ". ($_FILES[0]["file"]["size"]/1024)."<br>";
	echo "Temp folder: ". $_FILES[0]["file"]["tmp_name"]."<br>";

			if (file_exists("../../uploads/comments/".$_FILES[0]["file"]["name"])){
					echo "Findes allerede";
			}else{
					move_uploaded_file($_FILES[0]["file"]["tmp_name"],
					"../../uploads/comments/".$_FILES[0]["file"]["name"]);
		echo "stored in Commentupload: ". $_FILES[0]["file"]["name"];
		
		$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
						VALUES ('Bbaggz', '".$_POST["commentText"]."', '".$_FILES[0]["file"]["name"]."', NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
							mysqli_query($conn, $sql);
							mysqli_close($conn);	
							header("Location: feed.php");
			}

}}else{
	$sql = "INSERT INTO Comment (UserID, CommentText, CmtAttachement, CommentStyle, CommentTimeStamp, PostID) 
					VALUES ('Bbaggz', '".$_POST["commentText"]."', '".$_FILES[0]["file"]["name"]."', NULL, CURRENT_TIMESTAMP, ".$_POST["PostID"].")"; 
						mysqli_query($conn, $sql);
						mysqli_close($conn);	
							header("Location: feed.php");
    }}