<?php
$adminclass= '';
if($_SESSION['admin'] == 0){
	$adminclass='class="hidden"';
}else{
	$adminclass='class="admin"';
}
?>