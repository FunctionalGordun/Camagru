<?php

	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);

	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	
	if (mb_strlen($login) < 3 || mb_strlen($login) > 100)
	{
		echo "invalid login length";
		exit();
	}
	else if (mb_strlen($email) < 5 || mb_strlen($email) > 50)
	{
		echo "invalid email length";
		exit();
	}
	else if (mb_strlen($password) < 3 || mb_strlen($password) > 32)
	{
		echo "invalid password length";
		exit();
	}

	$password = md5($password."jopa");

	$mysql = new mysqli('localhost', 'root', '', 'register-users');

	$mysql->query("INSERT INTO `users` (`login`, `pass`, `mail`) VALUES('$login', '$password', '$email')");

	$mysql->close();
	header('Location: /Camagru');
?>