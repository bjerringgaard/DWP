<?php
require("../../../Includes/connection.php");
?>
<html>
<body>
<?php
$id=$_GET['id'];
$query = "SELECT * FROM user WHERE UserID='$id'";
$result=mysqli_query($conn, $query);

while($row=mysqli_fetch_array($result)){
    echo "<b>UserID :</b> $row[UserID] <br/>";
    echo "<b>First Name</b> $row[UserFirstName] <br/>";
    echo "<b>Last Name</b> $row[UserLastName] <br/>";
    echo "<b>Email</b> $row[UserEmail] <br/>";
?>

<form name="upload" method="post" action="editUserSend.php"> 
    <h2>Edit User</h2>
    <input name="UserID" type="text" value="<?php echo $row['UserID']; ?>">
    <br><br>
    <input name="UserFirstName" type="text" value="<?php echo $row['UserFirstName']; ?>">
    <br><br>
    <input name="UserLastName" type="text" value="<?php echo $row['UserLastName']; ?>">
    <br><br>
    <input name="UserEmail" type="text" value="<?php echo $row['UserEmail']; ?>">
    <br><br>
<input name="Submit" type="submit" value="Update User">
</form>


<?php
}
mysqli_close($conn);
?>
</body>
</html>