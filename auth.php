<?php

session_start();
require_once("dbconnect.php");

$_SESSION["error_msg"] = '';

function redirect_to($mesage, $address_page){

	$_SESSION['error_msgau'] = $mesage;

	header("HTTP/1.1 301 Moved Permanently");
	header("Location:". $address_page);
	exit();
}

if(isset($_POST['login']))
{
		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
		if (!empty($login))
		{
			$login = htmlspecialchars($login, ENT_QUOTES);
		} else {
			$message = "<p class='mesage_error'>enter login!</p>";
			redirect_to($message, '/Camagru/#popupsignin');
		}
}

if(isset($_POST['password']))
{
		$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
		if (!empty($password))
		{
			$password = htmlspecialchars($password, ENT_QUOTES);
			$password = md5($password."jopa");
		} else {
			$message = "<p class='mesage_error'>enter the password!</p>";
			redirect_to($message, '/Camagru/#popupsignin');
		}
}

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
$user = $result->fetch_assoc();
if (!isset($user))
{
	$message = "<p class='mesage_error'>no user</p>";
	redirect_to($message, '/Camagru/#popupsignin');
}
setcookie('user', $user['login'], time() + 3600 * 24, "/Camagru");

$mysql->close();
header('Location: /Camagru');

?>