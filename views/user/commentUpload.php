<?php 
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");
include("userIncludes/isAdmin.php");
confirm_logged_in();
?>
<?php
// POST IMAGE
$isql = "SELECT PostImage, PostID FROM post WHERE PostID =" . $_GET["PostID"];
$iresault = mysqli_query($conn, $isql);
$image = mysqli_fetch_assoc($iresault);
// TEXT STYLING
$tsql = "SELECT * FROM textstyling t";
$tresult = mysqli_query($conn, $tsql);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'userTemplates/head.php';?>
		<link rel="stylesheet" href="styles/css/commentUploader.css">
		<title>ShortCircuit | CommentUploader</title>
	</head>
	<body>		
		<header>
			<?php include 'userTemplates/navigation.php';?>
		</header> 
		<section id="main">
			<div id="commentContainer">
				<div id="postPicture">
				<img id="theImage" src="../../uploads/posts/<?php echo $image["PostImage"]?>" alt="">
				</div>
				<div id="writeComment">
					<form action="" method="POST" enctype="multipart/form-data" name="<?php echo $_GET["PostID"]?>">
						<div id="commentRowText">
							<input type="hidden" id="PostID" name="PostID" value="<?php echo $_GET["PostID"]?>">
							<input type="text" name="commentText">
							<input type="file" name="file" id="file"></input>
							<label for="file"><i class="fas fa-paperclip"></i></label>
							<input id="submit" type="submit" name="submit" class="btn fa-input"></input>
						</div>
						<div id="commentRowStyle">
							<input type="radio" name="textStyle" value="1" checked style="display:none; position:absolute;"></input>
							<?php
								if (mysqli_num_rows($tresult) > 0) {
									while($textstyling = mysqli_fetch_assoc($tresult)) { 
									echo '<input type="radio" name="textStyle" id="' . $textstyling['TextStylingID'] . '" value="' . $textstyling['TextStylingID'] . '"></input>
										<label for="' . $textstyling['TextStylingID'] . '" >' . $textstyling['TextStylingName'] . '</label>
									';
									}
								}
							?>
						</div>
					</form>
				</div>
			</div>
		</section>
	</body>
</html>
<?php
include("userIncludes/comment.php");
?>