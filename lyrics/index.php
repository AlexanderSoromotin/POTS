<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POTS :: Lyrics</title>
	<link rel="shortcut icon" href="<?= $link ?>/assets/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include "../inc/db.php";
		include "../inc/header.php";
		include "../assets/transition.php";
	?>
	
	<script type="text/javascript">
		
	</script>
	<br><br><br><br><br><br>
	<h1 class="title">lyrics <?php if ($user_status == 'Admin'):?> <img src="../assets/img/pen.svg" class="edit_lyrics"> <?php endif; ?> </h1>

	<div class="lyrics-main">
		<center>
			<section class="lyrics-menu">
				<?php
					$albums_query = mysqli_query($connection, "SELECT * FROM `albums` WHERE `status` != 'deleted' ORDER BY `id` DESC");
					while ($album = mysqli_fetch_assoc($albums_query)) {
						echo '<div class="album"> <span>' . $album['title'] . '</span><img src="../assets/img/arrow-down.svg">';
						$text_ul = '<ul>';
						$album_id = $album['id'];

						$lyrics_query = mysqli_query($connection, "SELECT `title` FROM `lyrics` WHERE `status` != 'deleted' AND `album_id` = '$album_id' ORDER BY `id`");

						while ($lyrics_title = mysqli_fetch_assoc($lyrics_query)['title']) {
							$text_ul = $text_ul . '<li>' . $lyrics_title . '</li>';
						}
						echo $text_ul . '</ul></div>';

					}
				?>
			</section>
			
			<section class="lyrics">
				<?php
					$lyrics_query = mysqli_query($connection, "SELECT * FROM `lyrics` WHERE `status` != 'deleted' ORDER BY `id`");

					while ($lyrics = mysqli_fetch_assoc($lyrics_query)) {
						$title = $lyrics['title'];
						$text = $lyrics['text'];

						echo '
							<h2 title="' . $title . '">' . $title . '</h2>
							<span>' . $text . '</span>
							<br><br>
							<hr>

						';
					}
				?>
			</section>
		</center>
	</div>

	<script type="text/javascript">
		$('.lyrics-menu span, .lyrics-menu img').click(function () {
			if ($(this).parent().hasClass('show')) {
				$(this).parent().removeClass('show');
			} else {
				$(this).parent().addClass('show');
			}
		})

		$('.lyrics-menu li').click(function(){
			let title = $(this).text(); 

			console.log(title)
			console.log($('lyrics h2[text="' + title + '"'))
			
			$('html, body').animate({          
				scrollTop:  $('.lyrics h2[title="' + title + '"').offset().top - 100
			}, 600);                            
		});
	</script>

	<br><br>
	<?php
		include '../inc/footer.php';
	?>
</body>
</html>