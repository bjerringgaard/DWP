<?php
// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
	$errors = array();

	// perform validations on the form data
	$username = trim(mysqli_real_escape_string($conn, $_POST['user']));
	$password = trim(mysqli_real_escape_string($conn, $_POST['pass']));
	$firstname = trim(mysqli_real_escape_string($conn, $_POST['firstname']));
	$lastname = trim(mysqli_real_escape_string($conn, $_POST['lastname']));
	$description = trim(mysqli_real_escape_string($conn, $_POST['description']));
	$email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $iterations = ['cost' => 5];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

	$query = "INSERT INTO `user` (UserName, UserPassword, UserFirstName, UserLastName, UserEmail, ProfileDesc, ProfilePic) 
						VALUES ('{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$email}', '{$description}', 'https://winaero.com/blog/wp-content/uploads/2018/08/Windows-10-user-icon-big.png')";
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