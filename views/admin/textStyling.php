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
<h2>Styling</h2>
<h3>Current Styling</h3>

<div class="overSkriftHeader">
<?php
$sql = "SELECT * FROM textstyling";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo"
          <p>Name: " . $row["TextStylingName"]. "</p>
          <p>Color: " . $row["TextStylingColor"]. "</p>
          <p>Font: " . $row["TextStylingFont"]. "</p>
        ";
        // UPDATER BRUGEREN
        echo
        '<a href="includes/editTextStyling.php?id='.$row['TextStylingID'].'"'; ?>
        onclick="return confirm('Edit Rules?');"
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