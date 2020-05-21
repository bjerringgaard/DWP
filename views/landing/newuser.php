<?php
require_once("../../Includes/session.php");
require_once("../../Includes/connection.php");
require_once("../../Includes/functions.php");
require("landingIncludes/createuser.php");
?>

<html>
	<head>
		<?php include '../../views/user/userTemplates/head.php';?>
		<link rel="stylesheet" href="styles/css/newuser.css">
		<title>ShortCircuit | New user</title>
	</head>
	<body>
		<section id="main">
			<div id="loginContainer">
				<h2>Create new user</h2> 
				<p>To get started</p> 
					<form action="" method="post">

						<label for="user">USERNAME</label><br>
						<input type="text" name="user" maxlength="30" value="" /><br>

						<label for="pass">PASSWORD</label><br>
						<input type="password" name="pass" maxlength="30" value="" /><br>

						<label for="email">EMAIL</label><br> 
						<input type="text" name="email" maxlength="255" value="" /><br>

						<div id="realname">
							<div>
								<label for="firstname">FIRST NAME</label><br> 
								<input type="text" name="firstname" maxlength="255" value="" /><br>
							</div>
							<div id="last">
								<label for="lastname">LAST NAME</label><br> 
								<input type="text" name="lastname" maxlength="255" value="" /><br>
							</div>
						</div>

						<label for="description">PROFILE DESCRIPTION</label><br> 
						<textarea type="text" name="description" maxlength="255" value=""></textarea><br>

						<input type="submit" name="submit" value="Create" />
					</form>
				<div id="bottomContainer">
					<p><a href="landing.php">Already have an account?</a></p>
					<p>Want to know more about us? <a href="about.php">Click here</a></p>
				</div>
			</div>
		</section>
	</body>
</html>
<?php
if (isset($conn)){mysqli_close($conn);}
?>