<?php

include 'includes/dbClass.php';
include 'includes/commentsPage.php';
include 'includes/viewComments.php';

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
<h2>Comments</h2>

<div class="overSkriftHeader">
<?php

$users = new viewComments();
$users->showAllComments();


?>

</div>
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