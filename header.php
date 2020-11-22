<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/header.css">
</head>
<body>
	<?php session_start(); ?>
	<header>
		<div class="header_iner">
			<a class="logo" href="index.php">
				<h1 class="logotext">Camagram</h1>
			</a>
			<nav class="navigation_bar">
				<li class="nav_link">
					<a href="add.php">
						<svg height="25px" viewBox="0 0 512 512" width="25px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-141.164062 0-256-114.835938-256-256s114.835938-256 256-256 256 114.835938 256 256-114.835938 256-256 256zm0-480c-123.519531 0-224 100.480469-224 224s100.480469 224 224 224 224-100.480469 224-224-100.480469-224-224-224zm0 0"/><path d="m368 272h-224c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h224c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m256 384c-8.832031 0-16-7.167969-16-16v-224c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v224c0 8.832031-7.167969 16-16 16zm0 0"/></svg>
					</a>
				</li>
				<li class="nav_link">
					<a href="#">
						<svg viewBox="0 -28 512.001 512" width="25px" height="25px" xmlns="http://www.w3.org/2000/svg"><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"/></svg>
					</a>
				</li>
				<li class="nav_link profile">
					<div class="profile_block">
						<a href="#">
							<svg id="Layer_1" enable-background="new 0 0 512 512" height="25px" viewBox="0 0 512 512" width="25px" xmlns="http://www.w3.org/2000/svg"><g><path d="m256 512c-60.615 0-119.406-21.564-165.543-60.721-10.833-9.188-20.995-19.375-30.201-30.275-38.859-46.06-60.256-104.657-60.256-165.004 0-68.381 26.628-132.668 74.98-181.02s112.639-74.98 181.02-74.98 132.668 26.628 181.02 74.98 74.98 112.639 74.98 181.02c0 60.348-21.397 118.945-60.251 164.998-9.211 10.906-19.373 21.093-30.209 30.284-46.134 39.154-104.925 60.718-165.54 60.718zm0-480c-123.514 0-224 100.486-224 224 0 52.805 18.719 104.074 52.709 144.363 8.06 9.543 16.961 18.466 26.451 26.516 40.364 34.256 91.801 53.121 144.84 53.121s104.476-18.865 144.837-53.119c9.493-8.052 18.394-16.976 26.459-26.525 33.985-40.281 52.704-91.55 52.704-144.356 0-123.514-100.486-224-224-224z"/><path d="m256 256c-52.935 0-96-43.065-96-96s43.065-96 96-96 96 43.065 96 96-43.065 96-96 96zm0-160c-35.29 0-64 28.71-64 64s28.71 64 64 64 64-28.71 64-64-28.71-64-64-64z"/><path d="m411.202 455.084c-1.29 0-2.6-.157-3.908-.485-8.57-2.151-13.774-10.843-11.623-19.414 2.872-11.443 4.329-23.281 4.329-35.185 0-78.285-63.646-142.866-141.893-143.99l-2.107-.01-2.107.01c-78.247 1.124-141.893 65.705-141.893 143.99 0 11.904 1.457 23.742 4.329 35.185 2.151 8.571-3.053 17.263-11.623 19.414s-17.263-3.052-19.414-11.623c-3.512-13.989-5.292-28.448-5.292-42.976 0-46.578 18.017-90.483 50.732-123.63 32.683-33.114 76.285-51.708 122.774-52.358.075-.001.149-.001.224-.001l2.27-.011 2.27.01c.075 0 .149 0 .224.001 46.489.649 90.091 19.244 122.774 52.358 32.715 33.148 50.732 77.053 50.732 123.631 0 14.528-1.78 28.987-5.292 42.976-1.823 7.262-8.343 12.107-15.506 12.108z"/></g></svg>
						</a>
						<ul class="submenu">
							<div class="grid">
								<?php if (isset($_COOKIE['user'])): ?>
									<a class="grid_buttons" href="profile.php">profile</a>
									<a class="grid_buttons" href="exit.php">log out</a>
								<?php else: ?>
									<a class="grid_buttons" href="#popupsignup">sign up</a>
									<a class="grid_buttons" href="#popupsignin">sign in</a>
								<?php endif; ?>
							</div>
						</ul>
					</div>
				</li>
			</nav>
		</div>
		<div class="greyline"></div>
		<div class="mail_massage">
			<?php
				if (isset($_SESSION['mail_message']))
				{
					echo $_SESSION['mail_message'];
					unset($_SESSION['mail_message']);
				}
			?>
		</div>
		<div id="popupsignup" class="popupsignup">
			<a href="##" class="popup_area"></a>
			<div class="popup_body">
				<div class="popup_content">
					<h2>SIGN UP</h2>
					<p class="popup_smalltext">
						or <a class="popup_link" href="#popupsignin">sign in</a>
					</p>
					<div class="massage_block">
						<?php
							if (isset($_SESSION['error_msg']))
							{
								echo $_SESSION['error_msg'];
								unset($_SESSION['error_msg']);
							}
						?>
					</div>
					<form action="check.php" method="POST">
						<input required type="text" class="form_input" name="login" id="login" placeholder="your login"> <br>
						<input required type="email" class="form_input" name="email" id="email" placeholder="your email"> <br>
						<input required type="password" class="form_input" name="password" id="password" placeholder="your password"> <br>
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
					<div class="massage_block">
						<?php
							if (isset($_SESSION['error_msgau']))
							{
								echo $_SESSION['error_msgau'];
								unset($_SESSION['error_msgau']);
							}
						?>
					</div>
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
	</header>
</body>
</html>