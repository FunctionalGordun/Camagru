<?php

// header('Content-Type: text/html; charset=utf-8');

$server = "localhost";
$username = "root";
$password = "";
$database = "camagru";

$mysql = new mysqli($server, $username, $password, $database);
if(!$mysql)
{
	die("<p>Error DataBase conect!</p>");
}
$mysql->set_charset('utf8');
$address_site = "http://192.168.64.2/Camagru/";
$mymail = "gordey.moskvichev@gmail.com"
?>