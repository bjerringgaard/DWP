<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");

require("landingIncludes/login.php");
if (logged_in()) {
	redirect_to("../user/feed.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../../views/user/userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/landing.css">
	<title>ShortCircuit | Landing</title>
</head>
<body>		 
	<section id="main">
		<div id="loginContainer">
			<h2>Welcome</h2> 
			<p>Please login</p> 
				<form action="" method="post">
				<label for="user">USERNAME</label><br>
				<input type="text" name="user" maxlength="30" value="" /><br>
				<label for="pass">PASSWORD</label><br>
				<input type="password" name="pass" maxlength="30" value="" /><br>
				<input type="submit" name="submit" value="Login" />
				</form>
			<div id="bottomContainer">
				<p>Need an account? <a href="newuser.php">Register</a></p>
				<p>Want to know more about us? <a href="about.php">Click here</a></p>
			</div>
		</div>
	</section>
</body>
</html>	
<?php
if (isset($conn)){mysqli_close($conn);}
?>