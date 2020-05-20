<?php
require("../../../Includes/connection.php");

$id=$_POST['PageID'];
$rules = trim("$_POST[PageRules]");

$stmt = $conn->prepare("UPDATE aboutpage  SET PageRules  = ? WHERE PageID = ?");
$stmt->bind_param("si", $rules, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../rules.php");

?>