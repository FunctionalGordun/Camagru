<?php
	include "header.php";
	require_once "profilefunc.php";

	$_SESSION["error_sett"] = '';
	$info = get_prof_info();

	function sredirect_to($mesage, $address_page){

		$_SESSION['error_sett'] = $mesage;
	
		header("HTTP/1.1 301 Moved Permanently");
		header("Location:". $address_page);
		exit();
	}

	if(isset($_POST['submit']))
	{
		if(isset($_POST['login']))
		{
			$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
			if (!empty($login))
			{
				$login = htmlspecialchars($login, ENT_QUOTES);

				$result_query = $mysql->query("SELECT `login` FROM `users` WHERE `login`='".$login."'");
				if($result_query->num_rows == 1){
					if(($row = $result_query->fetch_assoc()) != false){
						$message = "<p class='mesage_error' >This login is already taken</p>";
						sredirect_to($message, '/Camagru/settings.php');
					}else{
						$message = "<p class='mesage_error' >Db error</p>";
						sredirect_to($message, '/Camagru/settings.php');
					}
					$result_query->close();
					exit();
				}
				if (mb_strlen($login) < 3 || mb_strlen($login) > 100)
				{
					$message = "<p class='mesage_error'>invalid login length!</p>";
					sredirect_to($message, '/Camagru/settings.php');
				}
			}
		}
		if(isset($_POST['email']))
		{
			$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
			if (!empty($email))
			{
				echo "qweqweqweqwe";
				$email = htmlspecialchars($email, ENT_QUOTES);
				$result_query = $mysql->query("SELECT `email` FROM `users` WHERE `email`='".$email."'");
				if($result_query->num_rows == 1){
					if(($row = $result_query->fetch_assoc()) != false){
						$message = "<p class='mesage_error'>This email is already in use</p>";
						sredirect_to($message, '/Camagru/#popupsignup');
					}else{
						$message = "<p class='mesage_error' >Db error</p>";
						sredirect_to($message, '/Camagru/#popupsignup');
					}
					$result_query->close();
					exit();
				}
				if (mb_strlen($email) < 5 || mb_strlen($email) > 50)
				{
					$message = "<p class='mesage_error'>invalid email length!</p>";
					sredirect_to($message, '/Camagru/#popupsignup');
				}
			}
		}
		$oldlogin = $info['login'];
		$oldemail = $info['email'];
		// echo $info['login'] ."qwe";
		// echo $info['email'];
		if ($login != $info['login'])
		{
			$mysql->query("UPDATE `users` SET `login` = '$login' WHERE `login` = '$oldlogin'");
			$mysql->close();
		}
		if ($email != $info['email'])
		{
			$mysql->query("UPDATE `users` SET `email` = '$email' WHERE `email` = '$oldemail'");
			$mysql->close();
		}
		// header('Location: /Camagru/settings.php');
	}
	// header('Location: /Camagru/settings.php');
?>