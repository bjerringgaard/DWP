<?php
require("../../../Includes/connection.php");

$id=$_POST['TextStylingID'];
$newTextStylingName = $_POST['TextStylingName'];
$newTextStylingColor = $_POST['TextStylingColor'];
$newTextStylingFont = $_POST['TextStylingFont'];

$stmt = $conn->prepare("UPDATE TextStyling  SET TextStylingName  = ?, TextStylingColor = ?, TextStylingFont = ? WHERE TextStylingID = ?");
$stmt->bind_param("sssi", $newTextStylingName,$newTextStylingColor,$newTextStylingFont, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../textStyling.php");
?>