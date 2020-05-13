<?php
require("../../../Includes/connection.php");

$id=$_POST['PageID'];
$description = $_POST['PageDesc'];

//$query = "SELECT * FROM aboutPage WHERE PageID='$id'";
//$result = mysqli_query($conn, $query) or die('Error, query failed');

//mysqli_query($conn, "UPDATE aboutpage SET PageRules='$rules' WHERE PageID='$id'");

$stmt = $conn->prepare("UPDATE aboutPage SET PageDesc = ? WHERE PageID = ?");
$stmt->bind_param("si", $description, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../description.php");

?>