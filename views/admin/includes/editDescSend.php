<?php
require("../../../Includes/connection.php");

$id=$_POST['PageID'];
$description = trim("$_POST[PageDesc]");

$stmt = $conn->prepare("UPDATE aboutpage SET PageDesc = ? WHERE PageID = ?");
$stmt->bind_param("si", $description, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../description.php");

?>