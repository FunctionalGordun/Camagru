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
	<?php if (isset($_COOKIE['user'])): ?>
	<div class="container">
		<div class="profile_pic">
			<div>
				<?php
					require_once("dbconnect.php");
					$query = $connection->query("SELECT `prof_pic` FROM `users` ORDER BY id DESC");
					while($row = $query->fetch_assoc()){
						$show_img = base64_encode($row['img']);?>
						<img src="data:image/jpeg;base64, <?=$show_img ?>" alt="">
				<?php } ?>
			</div>
			<form action="profilepic.php" method="post" enctype="multipart/form-data">
				<p>Загрузить картику</p>
				<input type="file" name="img_upload"><input type="submit" name="upload" value="Загрузить">
			</form>
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