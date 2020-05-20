<?php
require("../../../Includes/connection.php");

$id=$_POST['UserID'];
$NewFirstName = trim("$_POST[UserFirstName]");
$NewLastName = trim("$_POST[UserLastName]");
$NewEmail = trim("$_POST[UserEmail]");
$NewBanned = trim("$_POST[IsBanned]");

$NewFirstName = trim("$_POST[UserFirstName]");

$query = "SELECT * FROM user WHERE UserID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "UPDATE user SET UserFirstName='$NewFirstName',UserLastName='$NewLastName',UserEmail='$NewEmail',IsBanned='$NewBanned' WHERE UserID='$id'");


// Redirect to delete.php.
header("location:../userPage.php");

?>