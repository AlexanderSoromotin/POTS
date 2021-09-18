<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POTS :: About us</title>
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
	
	<div class="background">
		<img class="image-back" src="https://sun9-82.userapi.com/impg/wHqA8YbyBGt58eLM4Frhb9mZHW6cI_hKg_KzEg/siLAlDbCyX0.jpg?size=2560x1707&quality=96&sign=bbb51acdb64724b99b87ecfa1dce1363&type=album">
		<img class="image-front" src="https://sun9-82.userapi.com/impg/wHqA8YbyBGt58eLM4Frhb9mZHW6cI_hKg_KzEg/siLAlDbCyX0.jpg?size=2560x1707&quality=96&sign=bbb51acdb64724b99b87ecfa1dce1363&type=album">
	</div>

	<center>
		<div class="container-1">
			<h1>Princes Of The Space</h1>
		</div>
		<div class="text">
			<div class="container-2">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</center>
	<!-- Блок участников группы -->
		<h1 style="background-color: #000;" class="title">band members <?php if ($user_status == 'Admin'):?> <img src="../assets/img/pen.svg" class="edit_band_members"> <?php endif; ?> </h1>
		<div class="members">
			<center>
			<?php
				$members = mysqli_query($connection, "SELECT * FROM `members` WHERE `status` != 'deleted' ORDER BY `display_index`");

				while($i = mysqli_fetch_assoc($members)) {
					$member_name = $i['name'];
					$member_id = $i['id'];
					$member_role = $i['role'];
					$member_photo = $i['photo'];

					$horizontal = $i['horizontal'];
					$vertical = $i['vertical'];
					$scale = $i['scale'];
					
					echo '
						<div class="block">
							<p>' . $member_role . '</p>
							<div  class="img">
								<img style="margin-left:' . $horizontal . '%;margin-top:' . $vertical . '%;transform: scale(' . $scale . ');" src="' . $member_photo . '">
							</div>	
							<h2>' . $member_name . '</h2>
						</div>
					';
				}
			?>
			</center>
		</div>

	

	<?php
		include "../inc/footer.php";
	?>

	<script type="text/javascript">
		
		let value = window.scrollY;
		if (value > 93) {
			$('.background').css({"margin-top" : "-93px"});
			console.log(11111)
		} else {
			$('.background').css({"margin-top" : "0"});
		}

		window.addEventListener('scroll', function () {
			let value = window.scrollY;
			// console.log(value);
			if (value > 93) {
				$('.background').css({"margin-top" : "-93px"});
			} else {
				$('.background').css({"margin-top" : "0"});
			}
		})
	</script>
</body>
</html>