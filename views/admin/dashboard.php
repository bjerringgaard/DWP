<?php
require("includes/connection.php");
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
<div id="logo">ShortCircuit | ADMIN PANEL</div>
<nav>
  <a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
  <ul>
    <li><a href="index.html">User Ikon</a></li>
      <li><a href="#information">Instillinger</a></li>
      <li><a href="#guide">Notes</a></li>
  </ul>
</nav>
</header> 

<section id="main">
<div class="box1">
  <h2>Latest Post</h2>




<div class="overSkriftHeader">
<?php
$sql = "SELECT * FROM post";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "
          <h4> " . $row["PostTitle"]. "</h4>
          <p> " . $row["PostDesc"]. "</p>
          <button class='button'>Read More</button>
          <hr class='new1'>
        ";
        
    }
} else {
    echo "0 results";
}

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
          <span> " . $row["UserID"]. "</span>
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
  <h2>Something</h2>
</div>
<div class="box4">
  <h2>Active</h2>
</div>
</section>

  

<section id="sb">
    <ul>
        <p class="sideBarMenu">Home</p>
        <li><a href="#home"><i class="fas fa-home sbmenu"></i>Home</a></li>
        <p class="sideBarMenu">Users</p>
        <li><a href="#home"><i class="fas fa-users sbmenu"></i>Users</a></li>
        <li><a href="#home"><i class="fas fa-hand-paper sbmenu"></i>Banned Users</a></li>
        <p class="sideBarMenu">Post</p>
        <li><a href="#home"><i class="fas fa-file-invoice sbmenu"></i>Post</a></li>
        <p class="sideBarMenu">Site</p>
        <li><a href="#home"><i class="fas fa-scroll sbmenu"></i>Regler</a></li>
        <li><a href="#home"><i class="fas fa-info-circle sbmenu"></i>Informationer</a></li>
        <li><a href="#home"><i class="fas fa-cog sbmenu"></i>Setting</a></li>
      </ul>
</section>
<footer>
     <div class="footer_information">
        <p>© Peter Schaadt Wind</p>
    </div> 
</footer>
</div>   
</body>
</html>    