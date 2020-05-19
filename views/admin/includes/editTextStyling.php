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
<h2>Edit Styling</h2>

<div class="editUser">
<?php
$id=$_GET['id'];

$query = "SELECT * FROM textstyling  WHERE TextStylingID= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query)){
  echo "SQL Failed";
}else{
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_array($result)){
?>

<form name="upload" method="post" action="editTextStylingSend.php"> 
<input name="TextStylingID" type="hidden" value="<?php echo $row['TextStylingID']; ?>">
<h3>Name</h3>
<select name="TextStylingName">
  <option value="<?php echo $row['TextStylingName']; ?>"><?php echo $row['TextStylingName']; ?></option>
  <option value="Cobalt">Cobalt</option>
  <option value="Gold Vein">Gold Vein</option>
  <option value="Purple Rain">Purple Rain</option>
  <option value="Holly Hund">Holly Hund</option>
</select>
<h3>Color</h3>
<select name="TextStylingColor">
  <option value="<?php echo $row['TextStylingColor']; ?>"><?php echo $row['TextStylingColor']; ?></option>
  <option value="Purple">Purple</option>
  <option value="Orange">Orange</option>
  <option value="Red">Red</option>
  <option value="Azure">Azure</option>
</select>
<h3>Font</h3>
<select name="TextStylingFont">
  <option value="<?php echo $row['TextStylingFont']; ?>"><?php echo $row['TextStylingFont']; ?></option>
  <option value="Bold">Bold</option>
  <option value="Cursive">Cursive</option>
  <option value="Medieval">Medieval</option>
</select>
<br><br>
<input class="button" name="Submit" type="submit" value="Update Styling">
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
<?php include 'navigation.php';?>
</section>
<footer>
<?php include 'footer.php';?>
</footer>
</div>   
</body>
</html>    