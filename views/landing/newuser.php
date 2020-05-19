<?php require_once("../../Includes/session.php"); ?>
<?php require_once("../../Includes/connection.php"); ?>
<?php require_once("../../Includes/functions.php"); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>

<?php
// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
	$errors = array();

	// perform validations on the form data
	$username = trim(mysqli_real_escape_string($conn, $_POST['user']));
	$password = trim(mysqli_real_escape_string($conn, $_POST['pass']));
	$firstname = trim(mysqli_real_escape_string($conn, $_POST['firstname']));
	$lastname = trim(mysqli_real_escape_string($conn, $_POST['lastname']));
	$email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $iterations = ['cost' => 5];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

	$query = "INSERT INTO `User` (UserName, UserPassword, UserFirstName, UserLastName, UserEmail) VALUES ('{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$email}')";
	$result = mysqli_query($conn, $query);
		if ($result) {
			$message = "User Created.";
		} else {
			$message = "User could not be created.";
			$message .= "<br />" . mysqli_error($conn);
		}
}

if (!empty($message)) {echo "<p>" . $message . "</p>";}
?>
<h2>Create New User</h2>

<form action="" method="post">
Username:
<input type="text" name="user" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
First name: 
<input type="text" name="firstname" maxlength="255" value="" />
Last name: 
<input type="text" name="lastname" maxlength="255" value="" />
Email:
<input type="text" name="email" maxlength="255" value="" />
<input type="submit" name="submit" value="Create" />
</form>

</body>
</html>
<?php
if (isset($conn)){mysqli_close($conn);}
?>