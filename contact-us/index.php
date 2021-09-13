<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POTS :: Contact us</title>
	<link rel="shortcut icon" href="<?= $link ?>/assets/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "../inc/db.php";
		include "../inc/header.php";
		include "../assets/transition.php";
	?>

	<br><br><br><br><br><br>
	<h1 class="title">Contact us</h1>

	<center>
		<div class="contact-form">
			<input title="Name" class="contact-form-name" type="" name="" placeholder="Name">
			<input title="Email" class="contact-form-email" type="" name="" placeholder="Email">
			<textarea title="Message" class="contact-form-message" placeholder="Message"></textarea>
			<button>Send</button>

			<span>Usually, appeals are considered within a day, but no more.</span>

			<b></b>
		</div>
	</center>

	<?php
		include "../inc/footer.php";
	?>

	<script type="text/javascript">
		function showInputError (classname) {
			$(classname).css({'background-color' : 'rgba(255, 255, 255, .25)'});
			setTimeout(function () {
				$(classname).css({'background-color' : 'unset'});
			}, 300)
		}
		function showSuccessMessage () {
			$('.contact-form-name').val('');
			$('.contact-form-email').val('');
			$('.contact-form-message').val('');

			$('.contact-form b').text('Appeal sent!');
			$('.contact-form b').css({'opacity' : '1'});

			setTimeout(function () {
				$('.contact-form b').css({'opacity' : '0'});
				setTimeout(function () {
					$('.contact-form b').text('');
				}, 350)
			}, 3000)
		}
		$('.contact-form button').click(function () {
			name = $('.contact-form-name').val();
			email = $('.contact-form-email').val();
			message = $('.contact-form-message').val();

			if (name.length < 1) {
				showInputError('.contact-form-name');
				return;
			}
			if (email.length < 1) {
				showInputError('.contact-form-email');
				return;
			}
			if (message.length < 1) {
				showInputError('.contact-form-message');
				return;
			}
			$.ajax({
				url: '../inc/sendMessage.php',
				type: 'POST',
				cache: false,
				data: {
					name: name,
					email: email,
					message: message
				},
				success: function () {
					showSuccessMessage();
				}
			})
		})
	</script>
</body>
</html>