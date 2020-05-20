<?php
require("../../../Includes/connection.php");

$id=$_GET['id'];
$query = "SELECT * FROM textstyling WHERE TextStylingID='$id'";
$result = mysqli_query($conn, $query) or die('Error, query failed');

mysqli_query($conn, "DELETE FROM textstyling WHERE TextStylingID='$id'");

mysqli_close($conn);

// Redirect to delete.php.
header("location:../textstyling.php");

?>