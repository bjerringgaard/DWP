<?php

include 'includes/dbClass.php';
include 'includes/dashboardPostPage.php';
include 'includes/viewdashboardPost.php';
include 'includes/bannedPage.php';
include 'includes/viewBanned.php';

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
    <title>Admin Dashboard</title>
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
  <h2>Latest Post</h2>

<div class="overSkriftHeader">
<?php
$users = new viewDashboardPost();
$users->showAllDashboardPost();

?>

</div>

<hr class="new1">
</div>
<div class="box2">
<h2>Latest Users</h2>
<div class="overSkriftHeader">
  <div class="grid2">
    <span>
    <strong>Username</strong>
    </span>
    <span>
    <strong>First Name</strong>
    </span>
    <span>
    <strong>Last Name</strong>
    </span>
    <span>
    <strong>Email</strong>
    </span>
    <span>
    <strong>Desc</strong>
    </span>

<?php
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "
          <span> " . $row["UserName"]. "</span>
          <span> " . $row["UserFirstName"]. "</span>
          <span> " . $row["UserLastName"]. "</span>
          <span> " . $row["UserEmail"]. "</span>
          <span> " . $row["ProfileDesc"]. "</span>
        ";
    }
} else {
    echo "0 results";
}

?>

</div>
  </div>
</div>
<div class="box3">
<div class="overSkriftHeader">
  <h2>Banned Users</h2>
  <?php
$users = new viewBanned();
$users->showAllBanned();
?>
</div>
</div>
<div class="box4">
  <h2>Pinned Post</h2>
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