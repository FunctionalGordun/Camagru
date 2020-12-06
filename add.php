<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/add.css">
	<title>Add</title>
</head>
<body>
	<?php include "header.php" ?>
	<!-- <div class="add_container">
		<div class="block1">
			<div class="button_container">
				<button>Upload file</button>
				<button>Make photo</button>
			</div>
			<div class="photo_viewer">
				<img src="./assets/img/2IEqr_kwt68.jpg">
				
				
			</div>
			<button>PUBLISH</button>
		</div>
		<div class="block2">
			
		</div>
	</div> -->
	<video id="video" autoplay>Video stream</video>
	<!-- <script async src="./assets/js/camera.js"></script> -->
	<script>
		const video = document.getElementById('video');

function startup()
{
	navigator.mediaDevices.getUserMedia({
		audio: false,
		video: true
	}).then(stream => {
		video.srcObject = stream;
	}).catch(console.error)

}

window.addEventListener('load', startup, false);
	</script>
</body>
</html>