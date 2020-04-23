<?php
require("../../../Includes/connection.php");

$id=$_GET['id'];
$query = "SELECT * FROM post WHERE PostID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "DELETE FROM post WHERE PostID='$id'");

mysqli_close($conn);

// Redirect to delete.php.
header("location:../postPage.php");

?>