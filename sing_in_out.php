<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reg</title>
</head>
<body>
	<div class="form_block">
		<div class="form_row">
			<h1>Register form</h1>
			<form action="check.php" method="POST">
				<input type="text" class="form_input" name="login" id="login" placeholder="your login"> <br>
				<input type="text" class="form_input" name="email" id="email" placeholder="your email"> <br>
				<input type="password" class="form_input" name="password" id="password" placeholder="your password"> <br>
				<button class="form_button" type="submit">register</button>
			</form>
		</div>
		<div class="form_row">
			<h1>Authorization form</h1>
			<form action="auth.php" method="POST">
				<input type="text" class="form_input" name="login" id="login" placeholder="your login"> <br>
				<input type="password" class="form_input" name="password" id="password" placeholder="your password"> <br>
				<button class="form_button" type="submit">Login</button>
			</form>
		</div>
	</div>

	<?php if ($_COOKIE['user'] == ''): ?>
		<h2>Привет пидрила</h2>
	
	<?php else: ?>
		<h2>Привет <?=$_COOKIE['user']?></h2>
		<a href="exit.php">Чтобы съебать нажми сюда</a>

	<?php
		endif;
	?>
</body>
</html>