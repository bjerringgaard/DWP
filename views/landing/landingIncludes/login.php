<?php
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$username = trim(mysqli_real_escape_string($conn, $_POST['user']));
		$password = trim(mysqli_real_escape_string($conn,$_POST['pass']));

		$query = "SELECT UserID, UserName, UserPassword, IsAdmin FROM user WHERE UserName = '{$username}' LIMIT 1";
		$result = mysqli_query($conn, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['UserPassword'])){
				    $_SESSION['user_id'] = $found_user['UserID'];
						$_SESSION['user'] = $found_user['UserName'];
						$_SESSION['admin'] = $found_user['IsAdmin'];
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
		if (isset($_GET['usercreated']) && $_GET['usercreated'] == 1) {
			$message = "User Created.";
		} 
	}
	
if (!empty($message)) {echo "<p>" . $message . "</p>";} ?>