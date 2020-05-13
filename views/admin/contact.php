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
<h2>Contact Information</h2>

<div class="overSkriftHeader">
<?php
$sql = "SELECT * FROM aboutPage";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo"
          <p class='maxTextWidth'>" . $row["PageContact"]. "</p>
        ";
        // UPDATER BRUGEREN
        echo
        '<a href="includes/editContact.php?id='.$row['PageID'].'"'; ?>
        onclick="return confirm('Edit Desciption?');"
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