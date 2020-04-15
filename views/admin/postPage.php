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






</section>

  

<section id="sb">
<?php include 'includes/navigation.php';?>
</section>
<footer>
     <div class="footer_information">
        <p>© Peter Schaadt Wind</p>
    </div> 
</footer>
</div>   
</body>
</html>    