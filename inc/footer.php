
<!-- <h1 class="title"></h1> -->
<?php

$footer = mysqli_fetch_assoc( mysqli_query($connection, "SELECT * FROM `settings`") );
?>

<footer>
	<center>
		<span>
			<h1 class="header-logo" style="cursor: default; ">Princes Of The Space</h1>
			<h2><?= $footer['email'] ?></h2>
		</span>
		<br>
		<p>
			<a target="_blink" href="<?= $footer['vk'] ?>"><img src="<?= $link?>/assets/img/vk.svg"></a>
			<a target="_blink" href="<?= $footer['facebook'] ?>"><img src="<?= $link?>/assets/img/fb.svg"></a>
			<a target="_blink" href="<?= $footer['instagram'] ?>"><img src="<?= $link?>/assets/img/inst.svg"></a>
			<a target="_blink" href="<?= $footer['youtube'] ?>"><img src="<?= $link?>/assets/img/yt.svg"></a>
			<a target="_blink" href="<?= $footer['twitter'] ?>"><img src="<?= $link?>/assets/img/tw.svg"></a>
			
		</p>
	</center>
</footer>

<script type="text/javascript">
	<?php if ($user_status == 'Admin'):?>
		// Открытие окон редактирования 
	$('.edit_news').click(() => {
		openEditpanel('editNews');
	});
	$('.edit_albums').click(() => {
		openEditpanel('editAlbums');
	});
	$('.edit_band_members').click(() => {
		openEditpanel('editMembers');
	});
	$('.edit_lyrics').click(() => {
		openEditpanel('editLyrics');
	});
	$('.edit_users').click(() => {
		openEditpanel('editUsers');
	});
	$('.site_settings').click(() => {
		openEditpanel('editSite');
	});
	<?php
		endif;
	?>
</script>
<?php
	mysqli_close($connection);
?>