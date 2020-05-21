<?php
require("../../Includes/connection.php");
require_once("../../Includes/session.php");
require_once("../../Includes/functions.php");
confirm_logged_in();

if (($_SESSION['admin'] == '0')) {
  header('Location: ../user/feed.php');
  }
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
<h2>Users</h2>

<div class="overSkriftHeader">
<?php
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo"
          <p class='maxTextWidth'>ID: " . htmlspecialchars ($row["UserID"]). "</p>
          <p class='maxTextWidth'>Username " . htmlspecialchars ($row["UserFirstName"]). "</p>
          <p class='maxTextWidth'>Navn " . htmlspecialchars ($row["UserFirstName"]). "</p>
          <p class='maxTextWidth'>Efternavn " . htmlspecialchars ($row["UserLastName"]). "</p>
          <p class='maxTextWidth'>Profil: " . htmlspecialchars ($row["ProfileDesc"]). "</p>
          <p class='maxTextWidth'>Profil: " . htmlspecialchars ($row["UserEmail"]). "</p>
        ";
        // SLETTER BRUGEREN
        echo'
        <a href="includes/deleteUser.php?id='.$row['UserID'].'"'; ?>
        onclick="return confirm('Er du sikker på du vil slette denne bruger');"
        <?php echo ' ><i class="far fa-trash-alt updateDelete"></i></a>';

        // UPDATER BRUGEREN
        echo
        '<a href="includes/editUser.php?id='.$row['UserID'].'"'; ?>
        onclick="return confirm('Edit User?');"
        <?php echo ' ><i class="far fa-edit updateDelete"></i></a><br><br><br>';
        
    }
} else {
    echo "0 results";
}

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