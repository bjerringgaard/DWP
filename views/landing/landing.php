<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");

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
	<?php
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$username = trim(mysqli_real_escape_string($conn, $_POST['user']));
		$password = trim(mysqli_real_escape_string($conn,$_POST['pass']));

		$query = "SELECT UserID, UserName, UserPassword FROM User WHERE UserName = '{$username}' LIMIT 1";
		$result = mysqli_query($conn, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['UserPassword'])){
				    $_SESSION['user_id'] = $found_user['UserID'];
				    $_SESSION['user'] = $found_user['UserName'];
				    redirect_to("../user/feed.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}}
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
	}
if (!empty($message)) {echo "<p>" . $message . "</p>";} ?>

<h2>Please login</h2> <a href="newuser.php">CreateUser</a>
<form action="" method="post">
Username:
<input type="text" name="user" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Login" />
</form>


</body>
</html>
	</section>
</body>
</html>	
<?php
if (isset($conn)){mysqli_close($conn);}
?>