<?php require("../../Includes/connection.php"); ?>
<?php require_once("../../controllers/session.php"); ?>
<?php require_once("../../controllers/functions.php"); ?>
<?php
		if (logged_in()) {
		redirect_to("frontpage.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/landing.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>ShortCircuit | landing</title>
</head>
<body>
<div id="wrapper"> 
		
		<header>
			<div class="sideBar"></div> 
		<div id="logo"><a href="#">ShortCircuit</a></div>
			<nav>
			<a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
			<ul>
				<li><a href="#"><i class="fas fa-home"></i></a></li>
				<li><a href="#categories"><i class="fas fa-compass"></i></a></li>
				<li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li> 
				<li><a href="#settings"><i class="fas fa-cog"></i></a></li>
			</ul>
			</nav>
			<div class="sideBar"></div> 
		</header> 
<div id="loginFrame">
<?php
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$username = trim(mysqli_real_escape_string($connection, $_POST['UserID']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['UserPassword']));

		$query = "SELECT UserID, UserPassword FROM User WHERE UserID = '{$username}' LIMIT 1";
		$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['UserPassword'])){
				    $_SESSION['user_id'] = $found_user['UserID'];
				    $_SESSION['user'] = $found_user['UserID'];
				    redirect_to("../feed.php");
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

<form action = "" method = "post">
                  <label>UserName</label><input type= text name="username" class="textbox"><br/><br/>
                  <label>Password</label><input type= password name="password" class="textbox"><br/><br/>
                  <input type="submit" value="Log in" class="button" class="button"><br/>
               </form>
</div>
</body>
</html>