<?php
require("../../Includes/connection.php");
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <meta name="description" content="Admin Dashboard">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e0fef6fe5f.js" crossorigin="anonymous"></script>
  </head>
<body>
<div id="wrapper">   
<header> 
<?php include 'includes/header.php';?>
</header> 

<section id="main">
<div class="box1">
<h2>Pinned</h2>

<div class="overSkriftHeader">
<?php
$pinned = '1';
$query = "SELECT * FROM post WHERE IsPinned = ? ";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query)){
  echo "SQL Failed";
}else{
  mysqli_stmt_bind_param($stmt, "i", $pinned);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_array($result)){
    echo "<p>Post Title: " . htmlspecialchars ($row["PostTitle"]). "</p>";
    echo "<p>Post Description: " . htmlspecialchars ($row["PostDesc"]). "</p>";
    echo "<hr class='new1'>";
?>
<?php
}}
mysqli_close($conn);
?>
</div>
</div>

</section>

<section id="sb">
<?php include 'includes/navigation.php';?>
</section>
<footer>
<?php include 'includes/footer.php';?>
</footer>
</div>   
</body>
</html>    