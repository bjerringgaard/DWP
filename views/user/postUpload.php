<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/postUploader.css">
	<title>ShortCircuit | Post Uploader</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
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
require("userIncludes/upload.php");
?>
