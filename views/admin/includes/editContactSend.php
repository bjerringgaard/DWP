<?php
require("../../../Includes/connection.php");

$id=$_POST['PageID'];
$pageContactNew = trim("$_POST[PageContact]");

$stmt = $conn->prepare("UPDATE aboutpage SET PageContact = ? WHERE PageID = ?");
$stmt->bind_param("si", $pageContactNew, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../contact.php");

?>