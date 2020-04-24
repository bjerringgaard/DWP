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


$sql = "SELECT * 
FROM Post p, Comment c, User u
WHERE c.PostID = p.PostID
AND c.UserID = u.UserID;
AND p.PostID = " . $post['PostID'];



/*  $sql = "SELECT * 
 FROM post p, user u, comment m
 WHERE p.UserID = u.UserID AND p.CommentID = m.CommentID
 ORDER BY p.postTime DESC
 "; */
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "
          <h4> " . $row["PostTitle"]. "</h4>
          <p class='postedBy'>Post By: " . $row["UserID"]. "</p>
          <p> " . $row["PostDesc"]. "</p>
          <p> " . $row["CommentText"]. "</p>
          <p> " . $row["CommentText"]. "</p>
        ";
        echo'
        <a href="includes/deletePost.php?id='.$row['PostID'].'"'; ?>
        onclick="return confirm('Er du sikker på du vil slette denne post');"
        <?php echo ' ><i class="far fa-trash-alt updateDelete"></i></a><br><br><br><br>';
        
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