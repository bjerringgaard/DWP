<?php
require("../../../Includes/connection.php");


$id=$_POST['UserID'];
$NewFirstName = $_POST['UserFirstName'];
$NewLastName = $_POST['UserLastName'];
$NewEmail = $_POST['UserEmail'];
$NewBanned = $_POST['IsBanned'];

$query = "SELECT * FROM user WHERE UserID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "UPDATE user SET UserFirstName='$NewFirstName',UserLastName='$NewLastName',UserEmail='$NewEmail',IsBanned='$NewBanned' WHERE UserID='$id'");


// Redirect to delete.php.
header("location:../userPage.php");

?>