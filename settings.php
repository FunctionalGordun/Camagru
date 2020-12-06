<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Settings</title>
	<link rel="stylesheet" href="./assets/css/settings.css">
</head>
<body>
	<?php include "header.php" ?>
	<?php require_once ("profilefunc.php"); ?>
	<?php if (isset($_COOKIE['user'])): ?>
	<div class="container">
		<?php $info = get_prof_info() ?>
		<div class="profile_set">
			<div class="picture_block">
				<?php
					echo $_COOKIE['user'];
					if ($info['prof_pic'] != NULL)
						$show_img = base64_encode($info['prof_pic']);
					if ($show_img != NULL):?>
						<a class="photo_link" href="#setphoto">
							<img class="set_photo" src="data:image/jpeg;base64, <?= $show_img ?>" alt="">
						</a>
						<a class="photo_link" href="#setphoto">
							<img class="set_photo_small" src="data:image/jpeg;base64, <?= $show_img ?>" alt="">
						</a>
					<?php else: ?>
						<a class="photo_link" href="#setphoto">
							<img class="set_photo" src="./assets/img/default_avatar.jpg" alt="default avatar">
						</a>
						<a class="photo_link" href="#setphoto">
							<img class="set_photo_small" src="./assets/img/default_avatar.jpg" alt="default avatar">
						</a>
					<?php endif; ?>
				<form action="profilefunc.php" method="post" enctype="multipart/form-data">
					<input id="setphoto" type="file" name="img_upload"><input type="submit" name="upload" value="upload">
				</form>
			</div>
			<div class="main_info">
			<form action="settingsvalid.php" method="POST">
				<div class="login_block">
					<div class="b1">Login</div>
					<div class="b2">
						<div class="massage_block">
							<?php
								if (isset($_SESSION['error_sett']))
								{
									echo $_SESSION['error_sett'];
									unset($_SESSION['error_sett']);
								}
							?>
						</div>
						<input type="text" class="form_input" name="login" id="login" placeholder="<?= $info['login']?>">
					</div>
				</div>
				<div class="mail_block">
					<div class="b1">Email</div>
					<div class="b2">
						<div class="massage_block">
							<?php
								if (isset($_SESSION['error_sett']))
								{
									echo $_SESSION['error_sett'];
									unset($_SESSION['error_sett']);
								}
							?>
						</div>
						<input type="email" class="form_input" name="email" id="email" placeholder="<?= $info['email']?>"> <br>
					</div>
				</div>
				<button class="form_button" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="profilesign_block">
			<a class="profilesign" href="#popupsignin">sign in to your account</a>
		</div>
		<div id="popupsignup" class="popupsignup">
			<a href="##" class="popup_area"></a>
			<div class="popup_body">
				<div class="popup_content">
					<h2>SIGN UP</h2>
					<p class="popup_smalltext">
						or <a class="popup_link" href="#popupsignin">sign in</a>
					</p>
					<form action="check.php" method="POST">
						<input type="text" class="form_input" name="login" id="login" placeholder="your login"> <br>
						<input type="text" class="form_input" name="email" id="email" placeholder="your email"> <br>
						<input type="password" class="form_input" name="password" id="password" placeholder="your password"> <br>
						<button class="form_button" type="submit">register</button>
					</form>
				</div>
			</div>
		</div>
		<div id="popupsignin" class="popupsignin">
			<a href="##" class="popup_area"></a>
			<div class="popup_body">
				<div class="popup_content">
					<h2>SIGN IN</h2>
					<p class="popup_smalltext">
						or <a class="popup_link" href="#popupsignup">sign up</a>
					</p>
					<form action="auth.php" method="POST">
						<input type="text" class="form_input" name="login" id="login" placeholder="your login"> <br>
						<input type="password" class="form_input" name="password" id="password" placeholder="your password"> <br>
						<button class="form_button" type="submit">Login</button>
					<p class="popup_smalltext">
						<a class="popup_link" href="#">forgot your password</a>
					</p>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
</body>
</html>