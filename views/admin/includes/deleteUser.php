<?php
require("../../../Includes/connection.php");

$id=$_GET['id'];
$query = "SELECT * FROM user WHERE UserID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "DELETE FROM user WHERE UserID='$id'");

mysqli_close($conn);

// Redirect to delete.php.
header("location:../userPage.php");

?>