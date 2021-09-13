<?php
	if ($_COOKIE['token'] != "") {
		header("Location: ../");
	}
	echo "cookie = " . $_COOKIE['token'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POTS :: Service</title>
	<link rel="stylesheet" type="text/css" href="../assets/main.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "../inc/head.php";
	?>
	<main class="service">

		<a class="linkBackToMainPage" href="../"><img src="../assets/img/arrow-left.svg" width="50px"></a>

		<div class="form form_show form_log">
			<form class="log" method="post" action="../inc/auth.php">
				<h1>Login</h1>
				<h3>Email</h3>
				<input type="" name="log_email" placeholder="Type your email here">

				<h3>Password</h3>
				<input type="password" name="log_password" placeholder="Type your password here">

				<p></p>
				<button type="button">Enter</button>
				<br>
				<h4>Don't have account? - <b class="logFormBtn">register</b> now</h4>
			</form>
		</div>

		<div style="transform: rotateY(-90deg);" class="form form_reg">
			<form class="reg" method="post" action="../inc/reg.php">
				<h1>Register</h1>
				<h3>Name</h3>
				<input type="" name="reg_name" placeholder="Type your name here">

				<h3>Email</h3>
				<input type="" name="reg_email" placeholder="Type your email here">

				<h3>Password</h3>
				<input type="password" name="reg_first_password" placeholder="Type your password here">

				<h3>Confirm password</h3>
				<input type="password" name="reg_second_password" placeholder="Type your password here">
				<p></p>
				<button type="button">Register</button>
				<br>
				<h4>Have account? - <b class="regFormBtn">login</b> now</h4>
			</form>
		</div>
	</main>



	<script type="text/javascript">
		<?php
			if ($_GET['e'] == "authError") :
		?>
		$('.log p').text("Email and/or password is wrong");
		<?php
			endif;
		?>

		// Авторизация
		$(".log button").click(function () {

			let email = $('.log input[name="log_email"]').val();
			let password = $('.log input[name="log_password"]').val();

			$('.log p').text("");

			// console.log(login + " | " + password);
			if (email.replace(" ", "") == "") {
				$('.log p').text("Вы должны указать почту");
				return;
			}
			if (password.replace(" ", "") == "") {
				$('.log p').text("Вы должны указать пароль");
				return;
			}
			$.ajax({
				type: "POST",
				url: "../inc/authCheck.php",
				cache: false,
				data: {
					email: email
				},
				success: function (flag) {
					console.log(flag);

					if (flag == 0) {
						$('.log p').text("Пользователь с такой почтой не зарегистрирован");
					} else {
						$('.log').submit();
					}
				}
			});
			

			// console.log(login.replace(" ", "").length)
		})

		// Регистрация
		$(".reg button").click(function () {

			let name = $('.reg input[name="reg_name"]').val();
			let email = $('.reg input[name="reg_email"]').val();
			let first_password = $('.reg input[name="reg_first_password"]').val();
			let second_password = $('.reg input[name="reg_second_password"]').val();

			$('.reg p').text("");

			// console.log("Name:" + name + "\nEmail: " + email + "\n1 Pass: " + first_password + "\n2 Pass: " + second_password);

			if (name.replace(" ", "") == "") {
				$('.reg p').text("Вы должны указать имя");
				return;
			}
			if (email.replace(" ", "") == "") {
				$('.reg p').text("Вы должны указать почту");
				return;
			}
			if (first_password.replace(" ", "") == "") {
				$('.reg p').text("Вы должны указать пароль");
				return;
			}
			if (second_password.replace(" ", "") == "") {
				$('.reg p').text("Вы должны указать пароль");
				return;
			}

			if (name.length < 2) {
				$('.reg p').text("Имя должно содержать не менее 2 символов");
				return;
			}
			if (email.length < 4) {
				$('.reg p').text("Некорректная почта");
				return;
			}

			if (first_password.length < 4) {
				$('.reg p').text("Длина пароля должна быть не менее 4 символов");
				return;
			}

			if (first_password != second_password) {
				$('.reg p').text("Пароли не совпадают");
				return;
			}

			$.ajax({
				type: "POST",
				url: "../inc/authCheck.php",
				cache: false,
				data: {
					email: email
				},
				success: function (flag) {
					console.log(flag);

					if (flag == 1) {
				

						$('.reg p').text("Пользователь с такой почтой уже зарегистрирован");
					} else {
						$('.reg').submit();
					}
				}
			});
			

			// console.log(login.replace(" ", "").length)
		})

		$('.logFormBtn').click(function () {
			// console.log(1)
			$('.form_log').removeClass('form_show');
			$('.form_log').addClass('form_hidden');

			setTimeout(function () {
				$('.form_reg').removeClass('form_hidden');
				$('.form_reg').addClass('form_show');
			}, 300)
			
		})

		$('.regFormBtn').click(function () {
			// console.log(2)

			$('.form_reg').removeClass('form_show');
			$('.form_reg').addClass('form_hidden');

			setTimeout(function () {
				$('.form_log').removeClass('form_hidden');
				$('.form_log').addClass('form_show');
			}, 300)
		})

		// Убираем возможность вернуться на предыдущую страницу, потому что вернувшись, страница не обновлена, и, если пользователь вышел из аккаунта, то его не перенаправит на страницу регистрации
		history.pushState(null, null, location.href);
		window.onpopstate = function(event) {
		    history.go(1);
		};
	</script>
</body>
</html>