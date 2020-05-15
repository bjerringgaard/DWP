<?php
require("../../../Includes/connection.php");

$id=$_POST['CommentID'];
$commentTextNew = $_POST['CommentText'];

//$query = "SELECT * FROM aboutPage WHERE PageID='$id'";
//$result = mysqli_query($conn, $query) or die('Error, query failed');

//mysqli_query($conn, "UPDATE aboutpage SET PageRules='$rules' WHERE PageID='$id'");

$stmt = $conn->prepare("UPDATE comment SET CommentText = ? WHERE CommentID = ?");
$stmt->bind_param("si", $commentTextNew, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../postPage.php");

?>