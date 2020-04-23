<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userIncludes/head.php';?>
	<link rel="stylesheet" href="css/postUploader.css">
	<title>ShortCircuit | Post Uploader</title>
</head>
<body>		
	<header>
		<?php include 'userIncludes/navigation.php';?>
	</header> 

	<section id="main">
		<form action="" method="post" enctype="multipart/form-data">
		<div id="upload">
			<div id="uploadFrame">
				<div id="uploadIMG">
					<input type="file" name="file">
				</div>
				<div id="uploadForm">
					<div id="title">
						<h3>TITLE </h3>
						<input type="text" name="title"/>
					</div>
					<div id="desc">
						<h3>DESCRIPTION</h3>
						<input type="text" name="description"/>
					</div>
						<input id="submit" type="submit" name="submit"/>
				</div>
			</div>
		</div>
		</form>
	</section>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    if((($_FILES["file"]["type"] == "image/jpeg")
        or($_FILES["file"]["type"] == "image/gif")
        or($_FILES["file"]["type"] == "image/png")
        or($_FILES["file"]["type"] == "image/jpg"))
        && ($_FILES["file"]["size"]<10000000)){


if($_FILES["file"]["error"]>0){
    echo "Error: ". $_FILES["file"]["error"]."<br>";
}else{
    echo "Upload: ". $_FILES["file"]["name"]."<br>";
    echo "Type: ". $_FILES["file"]["type"]."<br>";
    echo "Size: ". ($_FILES["file"]["size"]/1024)."<br>";
    echo "Temp folder: ". $_FILES["file"]["tmp_name"]."<br>";

        if (file_exists("../../uploads/posts".$_FILES["file"]["name"])){
            echo "Findes allerede";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "../../uploads/posts".$_FILES["file"]["name"]);
			echo "stored in upload: ". $_FILES["file"]["name"];
			
        $sql = "INSERT INTO Post (PostID, PostTitle, PostDesc, PostImage, PostLikes, PostTime, IsPinned, UserID) 
				VALUES (NULL, '".$_POST["title"]."', '".$_POST["description"]."', '".$_FILES["file"]["name"]."', 0, CURRENT_DATE, 0, 'Bbaggz')"; 
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        }

}}else{
        echo "invalid file!";
    }}