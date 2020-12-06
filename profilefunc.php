<?php
require_once("dbconnect.php");

function get_prof_info()
{
	global $mysql;

	$login = $_COOKIE['user'];
	$result  = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
	// while($row = $query->fetch_assoc()){
	// 	$show_img = base64_encode($row['img']);
	$info = $result->fetch_assoc();
	return $info;
}

if(isset($_POST['upload'])){

	global $mysql;

	if (!empty($_FILES['img_upload']['tmp_name'])) {
		$img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
		$login = $_COOKIE['user'];
		$mysql->query("UPDATE `users` SET `prof_pic` = '$img' WHERE `login` = '$login'");
		header('Location: /Camagru/settings.php');
	}
}
