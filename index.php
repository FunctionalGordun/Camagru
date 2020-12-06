<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/index.css">
	<title>Camagru</title>
</head>
<body>
	<?php include "header.php" ?>
	<div class="photo_container">
		<div> <p>qwe</p></div>
	</div>
	<?php if (isset($_COOKIE['user'])):
		echo $_COOKIE['user'];
	?>
	<?php endif; ?>
</script>
</body>
</html>