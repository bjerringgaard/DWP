<?php
require("../../../Includes/connection.php");

$id=$_POST['CommentID'];
$commentTextNew = trim ("$_POST[CommentText]");

$stmt = $conn->prepare("UPDATE comment SET CommentText = ? WHERE CommentID = ?");
$stmt->bind_param("si", $commentTextNew, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../postPage.php");

?>