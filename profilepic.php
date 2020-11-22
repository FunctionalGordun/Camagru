<?php
session_start();
require_once("dbconnect.php");


if(isset($_POST['upload'])){
	$img_type = substr($_FILES['img_upload']['type'], 0, 5);
	$img_size = 2*1024*1024;
	if(!empty($_FILES['img_upload']['tmp_name']) and $img_type === 'image' and $_FILES['img_upload']['size'] <= $img_size){ 
	$img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
	$connection->query("UPDATE `users` SET `prof_pic` VALUES ('$img')");
	}
}
?>