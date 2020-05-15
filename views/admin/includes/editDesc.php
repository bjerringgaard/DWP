<?php
require("../../../Includes/connection.php");
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <meta name="description" content="Admin Dashboard">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e0fef6fe5f.js" crossorigin="anonymous"></script>
  </head>

<body>
<div id="wrapper">   
<header> 
<?php include 'header.php';?>
</header> 

<section id="main">
<div class="box1">
<h2>Edit Beskrivelse</h2>

<div class="editUser">
<?php
$id=$_GET['id'];

$query = "SELECT * FROM aboutPage  WHERE PageID= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query)){
  echo "SQL Failed";
}else{
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_array($result)){
?>

<form name="upload" method="post" action="editDescSend.php"> 
<textarea class="inp" name="PageDesc"><?php echo $row['PageDesc']; ?></textarea>
<br><br>
<input name="PageID" type="hidden" value="<?php echo $row['PageID']; ?>">
<br><br>
<input class="button" name="Submit" type="submit" value="Update Post">
</form>

<?php
}}
mysqli_close($conn);
?>
</div>

<hr class="new1">
</div>

</section>

<section id="sb">
<?php include 'navigationEdit.php';?>
</section>
<footer>
<?php include 'footer.php';?>
</footer>
</div>   
</body>
</html>    