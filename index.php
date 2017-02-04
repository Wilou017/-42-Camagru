<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.php';
	define('PAGENAME', 'Accueil');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once ROOT.'/inc/head.php'; ?>
</head>
<body>
	<?php include_once ROOT.'/inc/header.php'; ?>
	<div class="content">
		<br>
		<video id="video" width="640" height="480" autoplay></video>
		<button id="snap">Snap Photo</button>
		<button id="fullscreen">fullscreen</button>
		<button id="pause" style="font-family: 'Material Icons';">pause</button>
		<button id="play">play</button>
		<canvas id="canvasPhotoBase" width="640" height="480"></canvas>
		<form>
			<input type="text" id="inputBase"/>
		</form>
	</div>
	<?php include_once ROOT.'/inc/footer.php'; ?>
	<script src="<? SITEURL ?>/js/camera.js"></script>
</body>
</html>