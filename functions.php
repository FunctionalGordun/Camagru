<?php

function redirect_to($mesage, $address_page){

	$_SESSION['error_msg'] = $mesage;

	header("HTTP/1.1 301 Moved Permanently");
	header("Location:". $address_page);
	exit();
}

?>