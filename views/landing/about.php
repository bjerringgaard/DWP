<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");

require("landingIncludes/login.php");
if (logged_in()) {
	redirect_to("../user/feed.php");
}
?>

<?php
$sql = "SELECT * FROM aboutpage";
$result = mysqli_query($conn, $sql);
$about = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../../views/user/userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/about.css">
	<title>ShortCircuit | Landing</title>
</head>
<body>		 
	<section id="main">
		<div id="loginContainer">
			<h2>About us</h2> 
			<p>For all your information needs</p> 
				<div id="information">
					<h3>Rules</h3>
						<p><?php echo $about["PageRules"]?></p>
					<h3>Description</h3>
						<p><?php echo $about["PageDesc"]?></p>
					<h3>Contact info</h3>
						<p><?php echo $about["PageContact"]?></p>
				</div>
			<div id="bottomContainer">
				<p>Need an account? <a href="newuser.php">Register</a></p>
				<p><a href="landing.php">Want to login?</a></p>
			</div>
		</div>
	</section>
</body>
</html>