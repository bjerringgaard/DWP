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
<h2>Edit Post</h2>

<div class="editUser">
<?php
$id=$_GET['id'];

$query = "SELECT * FROM post WHERE PostID='$id'";
$result=mysqli_query($conn, $query);

while($row=mysqli_fetch_array($result)){
?>

<form name="upload" method="post" action="editPostSend.php"> 
    
    <input class="inp" name="PostID" type="text" value="<?php echo $row['PostID']; ?>">
    <br><br>
    <input name="PostTitle" type="text" value="<?php echo $row['PostTitle']; ?>">
    <br><br>
    <input name="PostDesc" type="text" value="<?php echo $row['PostDesc']; ?>">
    <br><br>
<input class="button" name="Submit" type="submit" value="Update Post">
</form>

<?php
}
mysqli_close($conn);
?>
</div>

<hr class="new1">
</div>

</section>

<section id="sb">
<?php include 'navigation.php';?>
</section>
<footer>
<?php include 'footer.php';?>
</footer>
</div>   
</body>
</html>    