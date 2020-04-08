<?php
require("constants.php");
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
if(!$conn){
    die("DB down!");
}

$db_select = mysqli_select_db($conn,DB_NAME);
if(!$db_select){
    die("can't find the DB! error:". mysqli_error($conn));
}