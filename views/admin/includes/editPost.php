<?php
require("../../../Includes/connection.php");
require_once("../../../Includes/session.php");
require_once("../../../Includes/functions.php");
confirm_logged_in();

if (($_SESSION['admin'] == '0')) {
  header('Location: ../../user/feed.php');
  }
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
<h2>Edit Post</h2>

<div class="editUser">

<?php
$id=$_GET['id'];

$query = "SELECT * FROM post WHERE PostID= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query)){
  echo "SQL Failed";
}else{
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_array($result)){
?>

<form name="upload" method="post" action="editPostSend.php"> 
    
    <input class="inp" name="PostID" type="text" value="<?php echo $row['PostID']; ?>">
    <br><br>
    <input name="PostTitle" type="text" value="<?php echo $row['PostTitle']; ?>">
    <br><br>
    <input name="PostDesc" type="text" value="<?php echo $row['PostDesc']; ?>">
    <br><br>
    <input type='hidden' value='0' name='IsPinned'>
    <p class='editUser'>Pinned Post?</p><input type="checkbox" name="IsPinned"value="1" <?php echo ($row['IsPinned']==1 ? 'checked' : '0');?>>
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