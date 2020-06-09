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
	<link rel="stylesheet" href="styles/css/discoverPages.css">
	<title>ShortCircuit | Most Commented</title>
</head>
<body>		
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header>
	
	<section id="main">
		<div class="card" id="cardComment">
			<i class="fas fa-comment"></i>
			<h3>Most Commented</h3>
		</div>
	<?php
	$sql = "SELECT * FROM commentamountview";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($post = mysqli_fetch_assoc($result)) {
			include("userIncludes/post.php");
			}
		} else {
			echo "0 results";
		} ?>
	</section>