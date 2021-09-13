<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POTS :: Photos</title>
	<link rel="shortcut icon" href="<?= $link ?>/assets/img/logo.png" type="image/x-icon">
</head>
<body>
	<?php
		include "../inc/db.php";
		include "../inc/header.php";
		include "../assets/transition.php";
	?>
	
	<script type="text/javascript">
		
	</script>
	<center>
		<section style="width: 800px;text-align: left;" class="section">
			<br><br><br><br><br><br>
			<h1 class="title">Photos</h1>

			<iframe src='/inwidget/index.php?width=800&inline=3&view=9&toolbar=false&preview=large' data-inwidget scrolling='no' frameborder='no' style='border:none;width:800px;height:850px;overflow:hidden;'></iframe>
			
	</section>

	<style type="text/css">
		.icon, .text {
			display: none;
		}
	</style>
	</center>

	<br><br>
	<?php
		include '../inc/footer.php';
	?>
</body>
</html>