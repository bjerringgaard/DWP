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
  <h2>Edit Users</h2>




<div class="editUser">
<?php
$id=$_GET['id'];

$query = "SELECT * FROM user WHERE UserID='$id'";
$result=mysqli_query($conn, $query);

while($row=mysqli_fetch_array($result)){
/*     echo "<p class='editUser'><b>UserID :</b> $row[UserID] </p><br/>";
    echo "<p class='editUser'><b>First Name</b> $row[UserFirstName] </p> <br/>";
    echo "<p class='editUser'><b>Last Name</b> $row[UserLastName]  </p><br/>";
    echo "<p class='editUser'><b>Email</b> $row[UserEmail]  </p><br/>";
    echo "<p class='editUser'><b>Banned?</b> $row[IsBanned] </p> <br/>"; */
?>

<form name="upload" method="post" action="editUserSend.php"> 
    
    <input class="inp" name="UserID" type="text" value="<?php echo $row['UserID']; ?>">
    <br><br>
    <input name="UserFirstName" type="text" value="<?php echo $row['UserFirstName']; ?>">
    <br><br>
    <input name="UserLastName" type="text" value="<?php echo $row['UserLastName']; ?>">
    <br><br>
    <input name="UserEmail" type="text" value="<?php echo $row['UserEmail']; ?>">
    <br><br>
    <input type='hidden' value='0' name='IsBanned'>
    <p class='editUser'>Banned User?</p><input type="checkbox" name="IsBanned"value="1" <?php echo ($row['IsBanned']==1 ? 'checked' : '0');?>>
    <br><br>
    
<input class="button" name="Submit" type="submit" value="Update User">
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