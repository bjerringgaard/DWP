<?php 
require("../../Includes/Includer.php");
include("userIncludes/comment.php");
include("userIncludes/isAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'userTemplates/head.php';?>
		<link rel="stylesheet" href="styles/css/commentUploader.css">
		<title>ShortCircuit | Feed</title>
	</head>
	<body>		
		<header>
			<?php include 'userTemplates/navigation.php';?>
		</header> 
		<div id="writeComment">
			<form action="" method="POST" enctype="multipart/form-data" name="<?php echo $_GET["PostID"]?>">
				<div id="commentRowText">
					<input type="hidden" id="PostID" name="PostID" value="<?php echo $_GET["PostID"]?>">
					<input type="text" name="commentText">
					<input type="file" name="file" id="file"></input>
					<label for="file"><i class="fas fa-paperclip"></i></label>
					<input type="submit" name="submit" class="btn fa-input" value="send"></input>
				</div>
				<div id="commentRowStyle">
					<input type="radio" name="textStyle" value="1" checked style="display:none; position:absolute;"></input>
					<?php
						$tsql = "SELECT * 
											FROM textstyling t";
						$tresult = mysqli_query($conn, $tsql);

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
	</body>
</html>