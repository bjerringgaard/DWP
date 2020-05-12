<?php
require("../../../Includes/connection.php");


$id=$_POST['PageID'];
$rules = $_POST['PageRules'];

//$query = "SELECT * FROM aboutPage WHERE PageID='$id'";
//$result = mysqli_query($conn, $query) or die('Error, query failed');

//mysqli_query($conn, "UPDATE aboutpage SET PageRules='$rules' WHERE PageID='$id'");


$stmt = $conn->prepare("UPDATE aboutPage  SET PageRules  = ? WHERE PageID = ?");
$stmt->bind_param("si", $rules, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../rules.php");

?>