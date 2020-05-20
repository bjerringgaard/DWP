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
	<link rel="stylesheet" href="">
	<title>ShortCircuit | Landing</title>
</head>
<body>		 
	<section id="main">
		




<h2>Please login</h2> 
<form action="" method="post">
Username:
<input type="text" name="user" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Login" />
</form>
<a href="newuser.php">Create User</a>
<a href="about.php">About Page</a>

	</section>
</body>
</html>	
<?php
if (isset($conn)){mysqli_close($conn);}
?>