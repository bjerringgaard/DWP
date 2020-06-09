<?php
require("../../Includes/Includer.php");
include("userIncludes/isAdmin.php");

include("userIncludes/commentStyling.php");
include("userIncludes/date.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/feed.css">
	<title>ShortCircuit | Feed</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header> 

	<section id="main">

<?php
$sql = "SELECT * 
		FROM post p, user u
		WHERE p.UserID = u.UserID
		ORDER BY p.PostID DESC
		";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($post = mysqli_fetch_assoc($result)) {
		include("userIncludes/post.php");
	}
} else {
	echo "0 results";
} ?>

	<div id="uploadContent">
		<a href="postUpload.php"><button><i class="fas fa-plus"></i></button></a>
	</div>
	</section>
</body>
</html>


