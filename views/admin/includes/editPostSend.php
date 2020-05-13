<?php
require("../../../Includes/connection.php");


$id=$_POST['PostID'];
$NewPostTitle = $_POST['PostTitle'];
$NewPostDesc = $_POST['PostDesc'];

$query = "SELECT * FROM post WHERE PostID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "UPDATE post SET PostTitle='$NewPostTitle',PostDesc='$NewPostDesc' WHERE PostID='$id'");


// Redirect to delete.php.
header("location:../postPage.php");

?>