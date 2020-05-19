<?php
require("../../../Includes/connection.php");

$id=$_POST['PageID'];
$pageContactNew = $_POST['PageContact'];

//$query = "SELECT * FROM aboutPage WHERE PageID='$id'";
//$result = mysqli_query($conn, $query) or die('Error, query failed');

//mysqli_query($conn, "UPDATE aboutpage SET PageRules='$rules' WHERE PageID='$id'");

$stmt = $conn->prepare("UPDATE aboutpage SET PageContact = ? WHERE PageID = ?");
$stmt->bind_param("si", $pageContactNew, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../contact.php");

?>