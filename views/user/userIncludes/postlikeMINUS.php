<?php
require("../../../Includes/Includer.php");
$sql = "UPDATE post SET PostLikes = PostLikes-1 WHERE PostID =" . $_GET["PostID"];
mysqli_query($conn, $sql);
header("Location: ../feed.php");
?>