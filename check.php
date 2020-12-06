<?php
	session_start();
	require_once("dbconnect.php");
	require 'conectDB.php';
	require_once("functions.php");
	$_SESSION["error_msg"] = '';

function check_login($tmplogin) {
	require 'conectDB.php';
	$login = filter_var(trim($tmplogin), FILTER_SANITIZE_STRING);
	if (!empty($login))
	{
		$login = htmlspecialchars($login, ENT_QUOTES);
		$sql = 'SELECT `login` FROM `users` WHERE `login`= :login';
		$query = $pdo->prepare($sql);
		$query->execute(['login' => $login]);
		$result_query = $query->rowCount();
		if($result_query == 1){
			if(($row = $query->fetchAll()) != false){
				$message = "<p class='mesage_error' >This login is already taken</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}else{
				$message = "<p class='mesage_error' >Db error</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}
			exit();
		}
		if (mb_strlen($login) < 3 || mb_strlen($login) > 100)
		{
			$message = "<p class='mesage_error'>invalid login length!</p>";
			redirect_to($message, '/Camagru/#popupsignup');
		}
	} else {
		$message = "<p class='mesage_error'>enter login!</p>";
		redirect_to($message, '/Camagru/#popupsignup');
	}
}

	if(isset($_POST['login']))
	{
		// $tmplogin = $_POST['login'];
		// check_login($tmplogin);
		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
		if (!empty($login))
		{
			$login = htmlspecialchars($login, ENT_QUOTES);
			$sql = 'SELECT `login` FROM `users` WHERE `login`= :login';
			$query = $pdo->prepare($sql);
			$query->execute(['login' => $login]);
			$result_query = $query->rowCount();
			if($result_query == 1){
				if(($row = $query->fetchAll()) != false){
					$message = "<p class='mesage_error' >This login is already taken</p>";
					redirect_to($message, '/Camagru/#popupsignup');
				}else{
					$message = "<p class='mesage_error' >Db error</p>";
					redirect_to($message, '/Camagru/#popupsignup');
				}
				exit();
			}
			if (mb_strlen($login) < 3 || mb_strlen($login) > 100)
			{
				$message = "<p class='mesage_error'>invalid login length!</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}
		} else {
			$message = "<p class='mesage_error'>enter login!</p>";
			redirect_to($message, '/Camagru/#popupsignup');
		}
	}

	if(isset($_POST['email']))
	{
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
		if (!empty($email))
		{
			$email = htmlspecialchars($email, ENT_QUOTES);
			$sql = 'SELECT `email` FROM `users` WHERE `email`= :email';
			$query = $pdo->prepare($sql);
			$query->execute(['email' => $email]);
			$result_query = $query->rowCount();
			if($result_query == 1){
				if(($row = $query->fetchAll()) != false){
					$message = "<p class='mesage_error'>This email is already in use</p>";
					redirect_to($message, '/Camagru/#popupsignup');
				}else{
					$message = "<p class='mesage_error' >Db error</p>";
					redirect_to($message, '/Camagru/#popupsignup');
				}
				exit();
			}
			if (mb_strlen($email) < 5 || mb_strlen($email) > 50)
			{
				$message = "<p class='mesage_error'>invalid email length!</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}
		} else {
			$message = "<p class='mesage_error'>enter the email!</p>";
			redirect_to($message, '/Camagru/#popupsignup');
		}
	}

	if(isset($_POST['password']))
	{
		$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
		if (!empty($password))
		{
			$password = htmlspecialchars($password, ENT_QUOTES);
			if (mb_strlen($password) < 3 || mb_strlen($password) > 32)
			{
				$message = "<p class='mesage_error'>invalid password length!</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}
			$password = md5($password."jopa");
		} else {
			$message = "<p class='mesage_error'>enter the password!</p>";
			redirect_to($message, '/Camagru/#popupsignup');
		}
	}
	$sql = 'INSERT INTO `users` (`id`, `login`, `pass`, `email`, `email_status`, `prof_pic`) VALUES (:null, :login, :password, :email, :nol, :null2)';
	$query = $pdo->prepare($sql);
	$query->execute(['null' => NULL, 'login' => $login, 'password' => $password, 'email' => $email, 'nol' => '0', 'null2' => NULL]);
	if (!$query)
	{
		$message = "<p class='mesage_error'>registration error!</p>";
		redirect_to($message, '/Camagru/#popupsignup');
	}
	else{

			//Удаляем пользователей из таблицы confirm_users, которые не подтвердили свою почту в течении сутки
			// $query_delete_confirm_users = $mysqli->query("DELETE FROM `confirm_users` WHERE `date_reg` < ( NOW() - INTERVAL 1 DAY)");
			// if(!$query_delete_confirm_users){
			// 	exit("<p><strong>Ошибка!</strong> Сбой при удалении просроченного аккаунта(confirm). Код ошибки: ".$mysqli->errno."</p>");
			// }
			
			$token = md5($email.time());
			$sql = 'INSERT INTO `confirm_users` (`id`, `email`, `token`, `date_reg`) VALUES (:null, :email, :token, NOW())';
			$query = $pdo->prepare($sql);
			$query->execute(['null' => NULL, 'email' => $email, 'token' => $token]);
			if(!$query)
			{
				$mesage = "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД (confirm)</p>";
				redirect_to($message, '/Camagru/#popupsignup');
			}else{
				$subject = "Confirm your email";
				$subject = "=?utf-8?B?".base64_encode($subject)."?=";
				$mailmessage = 'Hello bitch \n'.date("d.m.Y", time()).', your mail was used to register an account on <a href="'.$address_site.'">Camagram</a> sit.<br> If it was you confirm your email address through this link <a href="'.$address_site.'activation.php?token='.$token.'&email='.$email.'">'.$address_site.'activation/'.$token.'</a> <br/> <br/> If it was not you, then just ignore this letter. <br/> <br/>The link is valid for 24 hours. After which your account will be deleted.';
				
				$headers = "FROM: $mymail\r\nReply-to: $mymail\r\nContent-type: text/html; charset=utf-8\r\n";
				
				if(mail($email, $subject, $mailmessage, $headers)){
					$_SESSION["mail_message"] = "<p>Confirm your email address </p>";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: /Camagru/");
					exit();

				}else{
					$mesage = "<p class='mesage_error' >Ошибка при отправлении письма с сылкой подтверждения, на почту</p>";
					redirect_to($message, '/Camagru/#popupsignup');
				}
			}
	}
	header('Location: /Camagru');
?>