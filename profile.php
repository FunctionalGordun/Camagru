<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/header.css">
	<link rel="stylesheet" href="./assets/css/profile.css">
	<title>Profile</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php require_once "profilefunc.php" ?>
	<?php if (isset($_COOKIE['user'])): ?>
	<div class="container">
		<?php $info = get_prof_info() ?>
		<div class="profile_pic">
			<div class="picture_block">
				<?php
					$show_img = base64_encode($info['prof_pic']);
					if ($show_img != NULL):?>
						<img class="prof_img" src="data:image/jpeg;base64, <?= $show_img ?>" alt="">
					<?php else: ?>
						<img class="prof_img" src="./assets/img/default_avatar.jpg" alt="default avatar">
					<?php endif; ?>
			</div>
		</div>
		<div class="prof_info">
			<div class="login_set_block">
				<div class="login"><?php echo $info['login'] ?></div>
				<a href="settings.php">
					<svg aria-label="Options" class="prof_svg" fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path></svg>
				</a>
			</div>
			<div class="popular_block">
				<div class="num_posts">1 post</div>
				<div class="num_followers">18 followers</div>
				<div class="num_following">9 following</div>
			</div>
		</div>

	</div>
	<div class="profile_greyline"></div>
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

