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
		<div id="upload">
			<div id="uploadFrame">
				<div id="uploadIMG">
					<input type="file">
				</div>
				<div id="uploadForm">
					<div id="title">
						<h3>TITLE </h3>
						<input type="text"/>
					</div>
					<div id="desc">
						<h3>DESCRIPTION</h3>
						<input type="text"/>
					</div>
						<input id="submit" type="submit"/>
				</div>
			</div>
		</div>
	</section>
</body>