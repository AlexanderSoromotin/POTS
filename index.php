<?php
	$v = $_GET["v"];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PRINCES OF THE SPACE</title>
	<link rel="shortcut icon" href="<?= $link ?>/assets/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<?php
		include "inc/db.php";
		include "inc/header.php";

		$wallpaper = mysqli_fetch_array( mysqli_query($connection, "SELECT `main_wallpaper` FROM `settings` ") )[0];
		include "assets/transition.php";
	?>

	<section class="image" style='background: url("<?= $wallpaper ?>");background-size: cover;background-position: center top;'>
			<!-- <img src="https://sun9-56.userapi.com/impg/wHqA8YbyBGt58eLM4Frhb9mZHW6cI_hKg_KzEg/siLAlDbCyX0.jpg?size=2560x1707&quality=96&proxy=1&sign=bbb51acdb64724b99b87ecfa1dce1363&type=album"> -->
	</section>

	<section class="section">

		<!-- Блок новостей -->
		<h1 class="title">news <?php if ($user_status == 'Admin'):?> <img src="assets/img/pen.svg" class="edit_news"> <?php endif; ?> </h1>
		<div class="news">
			<button><img src="assets/img/arrow.svg"></button>
			<button><img src="assets/img/arrow.svg"></button>

			<div class="news-list">
				<?php
					$news = mysqli_query($connection, "SELECT * FROM `news` WHERE `status` != 'deleted' ORDER BY `date` DESC");

					while($i = mysqli_fetch_assoc($news)) {
						$news_id = $i['id'];
						$news_img = $i['img'];
						$news_title = $i['title'];
						$news_text = $i['text'];
						$news_date = $i['date'];
						$news_style = $i['style'];
						$news_status = $i['status'];

						$news_date_mounth = substr($news_date, 5, 2);
						$news_date_day = substr($news_date, 8, 2);

						if ($news_date_mounth == "01") {
							$news_date_mounth = "JAN";
						}
						if ($news_date_mounth == "02") {
							$news_date_mounth = "FEB";
						}
						if ($news_date_mounth == "03") {
							$news_date_mounth = "MAR";
						}
						if ($news_date_mounth == "04") {
							$news_date_mounth = "APR";
						}
						if ($news_date_mounth == "05") {
							$news_date_mounth = "MAY";
						}
						if ($news_date_mounth == "06") {
							$news_date_mounth = "JUN";
						}
						if ($news_date_mounth == "07") {
							$news_date_mounth = "JUL";
						}
						if ($news_date_mounth == "08") {
							$news_date_mounth = "AUG";
						}
						if ($news_date_mounth == "09") {
							$news_date_mounth = "SEP";
						}
						if ($news_date_mounth == "10") {
							$news_date_mounth = "OCT";
						}
						if ($news_date_mounth == "11") {
							$news_date_mounth = "NOV";
						}
						if ($news_date_mounth == "12") {
							$news_date_mounth = "DEC";
						}
						echo '
							<div class="block">
								<center>
									<div class="img">
										<img src="' . $news_img . '" alt="">
									</div>
								</center>
								<div class="date">

									<p>' . $news_date_mounth . '</p>
									<p>' . $news_date_day . '</p>
								</div>
								<div class="text">
									<h1>' . $news_title . '</h1>
									<p>' . $news_text . '</p>
								</div>
							</div>
						';
					}
				?>
			</div>
		</div>

		<!-- Блок альбомов -->
		<h1 class="title">ALBUMS <?php if ($user_status == 'Admin'):?> <img src="assets/img/pen.svg" class="edit_albums"> <?php endif; ?> </h1>

		<!-- add class "center" to center all and show buttons-->
		<div class="albums ">
			<button><img src="assets/img/arrow.svg"></button>
			<button><img src="assets/img/arrow.svg"></button>

			<div class="albums-list">
				<?php
					$albums = mysqli_query($connection, "SELECT * FROM `albums` WHERE `status` != 'deleted' ORDER BY `date` DESC");

					while($i = mysqli_fetch_assoc($albums)) {
						$album_title = $i['title'];
						$album_id = $i['id'];
						$album_img = $i['img'];
						$album_date = $i['date'];

						$album_sp = $i['spotify'];
						$album_it = $i['itunes'];
						$album_am = $i['apple_music'];
						$album_ym = $i['yandex_music'];
						$album_ytm = $i['youtube_music'];
						$album_dz = $i['deezer'];

						$album_status = $i['status'];
						
						echo '
							<div class="block">
								<center>
									<div class="img">
										<img src="' . $album_img . '">
									</div>
									<div class="links">
										<ul>
											<li><a href="' . $album_sp . '"><img src="assets/img/logos/sp.svg"></a></li>
											<li><a href="' . $album_it . '"><img src="assets/img/logos/it.png"></a></li>
											<li class="apple-music"><a href="' . $album_am . '"><img src="assets/img/logos/am.png"></a></li>
											<li><a href="' . $album_ym . '"><img src="assets/img/logos/ym.png"></a></li>
											<li><a href="' . $album_ytm . '"><img src="assets/img/logos/ytm.png"></a></li>
											<li><a href="' . $album_dz . '"><img src="assets/img/logos/dz.png"></a></li>
										</ul>
									</div>
								</center>
							</div>
						';
					}
				?>
			</div>
		</div>

		<!-- Блок участников группы -->
		<h1 class="title">band members <?php if ($user_status == 'Admin'):?> <img src="assets/img/pen.svg" class="edit_band_members"> <?php endif; ?> </h1>
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
		<br>

		<!-- Футер -->
		<?
			include 'inc/footer.php';
		?>
	</section>

<script type="text/javascript">

	// Анимация поднятия текста в блоке новостей
	$('.news .block').click(function () {
		if(!$(this).hasClass('show')){
			$('.show').removeClass('show');
			$(this).addClass('show');	
		} else {
			$(this).removeClass('show');
		};
	})

	// Анимация листания новостей
	pos1 = 0;
	function slideNews (side) {
		bodyWidth = $('body').width();
		newsListWidth = $('.news .block').width() * $('.news .block').length ;

		if (side == "rightBTN" && (pos1 * -1 + bodyWidth < newsListWidth)) {
			pos1 -= $('.news .block').width();
			$('.news-list').css({"left" : pos1 + "px"});
			// newsListLeftSpace += $('.block').width();
		}
		if (side == "leftBTN" && (pos1 < 0)) {
			pos1 += $('.news .block').width();
			$('.news-list').css({"left" : pos1 + "px"});
		}
		console.log("############################################");
		console.log("bodyWidth : " + bodyWidth);
		console.log("newsListWidth : " + newsListWidth);
		console.log("pos1 : " + pos1);
	}
	pos2 = 0;
	if ($('body').width() > ($('.albums .block').width() + 60) * $('.albums .block').length) {
		$('.albums').addClass("center");
	} else {
		$('.albums').removeClass("center");
	}

	// Анимация листания альбомов
	function slideAlbums (side) {
		bodyWidth = $('body').width();
		albumsListWidth = ($('.albums .block').width() + 60) * $('.albums .block').length ;

		if (side == "rightBTN" && (pos2 * -1 + bodyWidth < albumsListWidth)) {
			pos2 -= $('.albums .block').width();
			$('.albums-list').css({"left" : pos2 + "px"});
			// newsListLeftSpace += $('.block').width();
		}
		if (side == "leftBTN" && (pos2 < 0)) {
			pos2 += $('.albums .block').width();
			$('.albums-list').css({"left" : pos2 + "px"});
		}
		console.log("############################################");
		console.log("bodyWidth : " + bodyWidth);
		console.log("albumsListWidth : " + albumsListWidth);
		console.log("pos2 : " + pos2);
	}

	// Листание новостей и альбомов
	$('.news button:eq(0)').click(function () {
		slideNews("leftBTN");
	}) 
	$('.news button:eq(1)').click(function () {
		slideNews("rightBTN");
	}) 
	$('.albums button:eq(0)').click(function () {
		slideAlbums("leftBTN");
	}) 
	$('.albums button:eq(1)').click(function () {
		slideAlbums("rightBTN");
	}) 

	
</script>

</body>
</html>