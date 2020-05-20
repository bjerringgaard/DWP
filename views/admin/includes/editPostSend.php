<?php
require("../../../Includes/connection.php");

$id=$_POST['PostID'];
$NewPostTitle = $_POST['PostTitle'];
$NewPostDesc = $_POST['PostDesc'];
$NewPinned = $_POST['IsPinned'];

$stmt = $conn->prepare("UPDATE post SET PostTitle = ?, PostDesc = ?, IsPinned = ? WHERE PostID = ?");
$stmt->bind_param("ssii", $NewPostTitle, $NewPostDesc, $NewPinned, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../postPage.php");

?>