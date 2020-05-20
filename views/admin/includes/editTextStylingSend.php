<?php
require("../../../Includes/connection.php");

$id=$_POST['TextStylingID'];
$newTextStylingName = trim("$_POST[TextStylingName]");
$newTextStylingColor = trim("$_POST[TextStylingColor]");
$newTextStylingFont = trim("$_POST[TextStylingFont]");

$stmt = $conn->prepare("UPDATE TextStyling  SET TextStylingName  = ?, TextStylingColor = ?, TextStylingFont = ? WHERE TextStylingID = ?");
$stmt->bind_param("sssi", $newTextStylingName,$newTextStylingColor,$newTextStylingFont, $id);
$stmt->execute();

// Redirect to delete.php.
header("location:../textStyling.php");
?>