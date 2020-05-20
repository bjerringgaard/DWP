<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");
include("userIncludes/isAdmin.php");
confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'userTemplates/head.php';?>
	<link rel="stylesheet" href="styles/css/settings.css">
	<title>ShortCircuit | Settings</title>
</head>
<body>
	<header>
		<?php include 'userTemplates/navigation.php';?>
	</header> 

	<section id="main">
	<a href="../landing/logout.php">LOG OUT</a>
	<?php var_dump($_SESSION)?>
	</section>
</body>
</html>

<?php
$query = "SELECT *
					FROM user
					WHERE UserID = 2
					";

$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);

echo $post['UserPassword']

?>