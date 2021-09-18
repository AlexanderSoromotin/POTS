<?php
	include "head.php";
	include "userData.php";
?>
<!-- Анимация перехода -->
<div class="transition-to-left-side"></div>
<link rel="stylesheet" type="text/css" href="<?= $link?>/assets/main.css">

<header>
	<center>
		<div>		
			<h1 class="header-logo"><a >PRINCES OF THE SPACE</a></h1>
		</div>
		<ul class="menu-ul">
			<!-- <li class="header-news"><a href="<?= $link?>/">news</a></li> -->
			<!-- <li class="header-albums"><a href="<?= $link?>">albums</a></li> -->
			<!-- <li class="header-members"><a href="<?= $link?>"><a href="">band members</a></a></li> -->
			<li class="header-home"><a>home</a></li>
			<li class="header-photos"><a>photos</a></li>
			<li class="header-lyrics"><a>lyrics</a></li>
			<li class="header-contact"><a>contact us</a></li>
			<li class="header-about"><a>about us</a></li>
		</ul>
	</center>
	<?php
		// Только у админов появляется меню
		if ($user_status == "Admin") :
	?>

		<div class="profile">
			<img class="open-profile" src="<?= $link?>/assets/img/menu.svg">
			<ul>
				<img class="close-profile" src="<?= $link?>/assets/img/close.svg">

				<?php
					if ($user_status) :
				?>

					<h3>Hello, <?= $user_name?>!</h3>

					<?php
						if ($user_status == "Admin") :
					?>
						<br>
						<p>Edit content</p>
						<li class="edit_news">Edit news</li>
						<li class="edit_albums">Edit albums</li>
						<li class="edit_band_members">Edit band members</li>
						<li class="edit_lyrics">Edit lyrics</li>
						<br><br>
						<p>Settings</p>
						<li class="edit_users">Edit users</li>
						<li class="site_settings">Site settings</li>
					<?php
						endif;
					?>

					<center>
						<a href="<?= $link?>/inc/logout.php"><button>Logout</button></a>
					</center>
					<p style="margin-bottom: 1px; color: rgba(0, 0, 0, .5); margin-top: 5px;">Email: <?= $user_email?></p>
					<?php
						if ($user_status == "Admin") :
					?>
						<p style="margin-bottom: 10px; color: rgba(0, 0, 0, .5);">Your status: <?= $user_status?></p>
					<?php
						endif;
					?>


				<?php
					else :
				?>
					<center>
						<a href="<?= $link?>/service"><button>Log in</button></a>
					</center>
				<?php
					endif;
				?>
			</ul>
		</div>
	<?php
		endif;
	?>
	<script type="text/javascript">
		

		let value = window.scrollY;
		if (value > 93) {
			$('header').css({"margin-top" : "-93px"});
			$('.profile').css({"margin-top" : "77px"});
			$('.image').css({"margin-top" : "93px"});
		} else {
			$('header').css({"margin-top" : "0"});
			$('.profile').css({"margin-top" : "0"});
			$('.image').css({"margin-top" : "154px"});
		}
		$('.profile .open-profile').click(function () {
			$('.profile').addClass('profile-opened');
		});
		$('.profile .close-profile').click(function () {
			$('.profile').removeClass('profile-opened');
		});


		window.addEventListener('scroll', function () {
			let value = window.scrollY;
			// console.log(value);
			if (value > 93) {
				$('header').css({"margin-top" : "-93px"});
				$('.profile').css({"margin-top" : "77px"});
				$('.image').css({"margin-top" : "93px"});
			} else {
				$('header').css({"margin-top" : "0"});
				$('.profile').css({"margin-top" : "0"});
				$('.image').css({"margin-top" : "154px"});
			}
		})
	</script>
</header>

<?php
	if ($user_status == "Admin") :
?>

<div class="edit">
	


	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- ################=-    NEWS REDACTOR    -=######################### -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->



	<div class="editNews editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>EDIT NEWS</h1>

		<div class="list">
			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_img">Image</p>
				<p class="ex_link_title">Link and title</p>
				<p class="ex_text">Text</p>
				<p class="ex_date">Date</p>
				<p class="ex_control">Action</p>
			</div>

			<div class="block" id="id_add" style="padding: 20px 0; transform: scale(1); box-shadow: 0 0 30px rgba(0, 0, 0, .3);">
				<!-- <button class="open-add-block white-btn"><img src="assets/img/arrow-down.svg" height="10px"></button> -->
				<!-- <div class="block-add-content"> -->
					<p class="id">?</p>
					<p class="img">
						<img src="' .  $news_img . '">
					</p>
					<p class="link_title">
						<input type="" name="image" title="Link to photo" placeholder="Link to photo" value="" class="edit-news-image">
						<textarea title="Title" placeholder="Title" class="edit-news-title"></textarea>
					</p>
					<p class="text">
						<textarea placeholder="Text" class="edit-news-text"></textarea>
					</p>
					<p class="date">
						<input type="" name="" placeholder="YYYY-MM-DD HH:MM:SS" title="Date (YYYY-MM-DD HH:MM:SS)" value="" class="edit-news-date">
					</p>
					<!-- <p class="style">
						
					</p> -->

					<p class="control">
						<b style="height: 0px;"></b>
						<button class="edit-news-add">ADD</button>
					</p>
				<!-- </div> -->
			</div>
			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_img">Image</p>
				<p class="ex_link_title">Link and title</p>
				<p class="ex_text">Text</p>
				<p class="ex_date">Date</p>
				<p class="ex_control">Action</p>
			</div>

			<?php
				$news_query = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `date` DESC");

				while ($news = mysqli_fetch_assoc($news_query)) {
					$news_id = $news['id'];
					$news_img = $news['img'];
					$news_title = $news['title'];
					$news_text = $news['text'];
					$news_date = $news['date'];
					$news_status = $news['status'];
					$news_redactor_id = $news['last_redactor'];

					if ($news_status == 'show') {
						$news_redactor_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `name` FROM `users` WHERE `id` = '$news_redactor_id'"))['name'];

						if ($news_redactor_id != 0) {
							$news_redactor = '<br><p class="redactor">Last redactor: ' . $news_redactor_name . ' (ID: ' . $news_redactor_id . ')</p>';
						} else {
							$news_redactor = "";
						};
						// $news_style = $news['style'];

						echo '
						<div class="block" id="id_' . $news_id . '">
							<p class="id">' . $news_id . '</p>
							<p class="img">
								<img src="' .  $news_img . '">
							</p>
							<p class="link_title">
								<input type="" name="image" title="Link to photo" placeholder="Link to photo" value="' . $news_img . '" class="edit-news-image">
								<textarea title="Title" placeholder="Title" class="edit-news-title">' . $news_title . '</textarea>
							</p>
							<p class="text">
								<textarea placeholder="Text" class="edit-news-text">' . $news_text . '</textarea>
							</p>
							<p class="date">
								<input type="" name="" placeholder="YYYY-MM-DD HH:MM:SS" title="Date (YYYY-MM-DD HH:MM:SS)" value="' . $news_date . '" class="edit-news-date">
							</p>
							<!-- <p class="style">
								
							</p> -->

							<p class="control">
								<b></b>
								<button class="edit-news-save">Save</button>
								<button class="edit-news-delete">Delete</button>
							</p>
							' . $news_redactor . '
						</div>
						';
					}
				}
			?>
		</div>
	</div>



	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- ################=-   ALBUMS REDACTOR   -=######################### -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->



	<div class="editAlbums editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>ALBUM EDITOR</h1>

		<div class="list">
			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_img">Image</p>
				<p class="ex_title_text">Title | Image</p>
				<p class="ex_links">Links</p>
				<p class="ex_links">Links</p>
				<p class="ex_control">Action</p>
			</div>

			<div class="block" id="id_add" style="padding: 20px 0; transform: scale(1); box-shadow: 0 0 30px rgba(0, 0, 0, .3);">
				<p class="id">?</p>
				<p class="img">
					<img src="image">
				</p>
				<p class="title_text">
					<input type="" name="" title="Title" placeholder="Title" value="" class="edit-album-title">
					<input type="" name="image" title="Link to img" placeholder="Link to img" value="" class="edit-album-image">
					<!-- <input type="" name="" title="Date YYYY-MM-DD HH:MM:SS" placeholder="Date" value="" class="edit-album-date"> -->
					<input class="inputUploads" type="file" name="file">
					
				</p>

				
				<p class="links">
					<input type="" name="" title="Link to Spotify" placeholder="Link to Spotify" value="" class="edit-album-spotify">
					<input type="" name="" title="Link to Itunes" placeholder="Link to Itunes" value="" class="edit-album-itunes">
					<input type="" name="" title="Link to Apple Music" placeholder="Link to Apple Music" value="" class="edit-album-applemusic">
					
				</p>
				<p class="links">
					<input type="" name="" title="Link to Yandex Music" placeholder="Link to Yandex Music" value="" class="edit-album-yandexmusic">
					<input type="" name="" title="Link to YouTube Music" placeholder="Link to YouTube Music" value="" class="edit-album-youtubemusic">
					<input type="" name="" title="Link to Deezer" placeholder="Link to Deezer" value="" class="edit-album-deezer">
				</p>
				
				<p class="control">
					<b style="height: 0px;"></b>
					<button class="edit-album-add">ADD</button>
				</p>				
			</div>


			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_img">Image</p>
				<p class="ex_title_text">Title | Image</p>
				<p class="ex_links">Links</p>
				<p class="ex_links">Links</p>
				<p class="ex_control">Action</p>
			</div>

			<?php
				$albums_query = mysqli_query($connection, "SELECT * FROM `albums` ORDER BY `date` DESC");

				while ($albums = mysqli_fetch_assoc($albums_query)) {
					$album_id = $albums['id'];
					$album_img = $albums['img'];
					$album_title = $albums['title'];

					$album_spotify = $albums['spotify'];
					$album_itunes = $albums['itunes'];
					$album_apple_music = $albums['apple_music'];
					$album_yandex_music = $albums['yandex_music'];
					$album_youtube_music = $albums['youtube_music'];
					$album_deezer = $albums['deezer'];

					$album_status = $albums['status'];
					$album_date = $albums['date'];

					$album_redactor_id = $albums['last_redactor'];

					if ($album_status == 'show') {
						$album_redactor_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `name` FROM `users` WHERE `id` = '$album_redactor_id'"))['name'];
						if ($album_redactor_id != 0) {
							$album_redactor = '<br><p class="redactor">Last redactor: ' . $album_redactor_name . ' (ID: ' . $album_redactor_id . ')</p>';
						} else {
							$album_redactor = "";
						};

						echo '
						<div class="block" id="id_' . $album_id . '">
							<p class="id">' . $album_id . '</p>
							<p class="img">
								<img src="' .  $album_img . '">
							</p>
							<p class="title_text">
								<input type="" name="" title="Title" placeholder="Title" value="' . $album_title . '" class="edit-album-title">
								<input type="" name="image" title="Link to img" placeholder="Link to img" value="' . $album_img . '" class="edit-album-image">
								<!-- <input type="" name="" title="Date YYYY-MM-DD HH:MM:SS" placeholder="Date" value="' . $album_date . '" class="edit-album-date"> -->
								<input class="inputUploads" type="file" name="file">
								
							</p>

							
							<p class="links">
								<input type="" name="" title="Link to Spotify" placeholder="Link to Spotify" value="' . $album_spotify . '" class="edit-album-spotify">
								<input type="" name="" title="Link to Itunes" placeholder="Link to Itunes" value="' . $album_itunes . '" class="edit-album-itunes">
								<input type="" name="" title="Link to Apple Music" placeholder="Link to Apple Music" value="' . $album_apple_music . '" class="edit-album-applemusic">
								
							</p>
							<p class="links">
								<input type="" name="" title="Link to Yandex Music" placeholder="Link to Yandex Music" value="' . $album_yandex_music . '" class="edit-album-yandexmusic">
								<input type="" name="" title="Link to YouTube Music" placeholder="Link to YouTube Music" value="' . $album_youtube_music . '" class="edit-album-youtubemusic">
								<input type="" name="" title="Link to Deezer" placeholder="Link to Deezer" value="' . $album_deezer . '" class="edit-album-deezer">
								
							</p>
							
							<p class="control">
								<b></b>
								<button class="edit-album-save">Save</button>
								<button class="edit-album-delete">Delete</button>
							</p>
							' . $album_redactor . '
						</div>
						';
					}
				}
			?>
		</div>
	</div>


	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- #############=-   BAND MEMBERS REDACTOR   -=###################### -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->


	<div class="editMembers editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>BAND MEMBERS EDITOR</h1>

		<div class="list">

			<br><br>

			<div class="block" id="id_add" style="padding: 20px 0; transform: scale(1.04); box-shadow: 0 0 30px rgba(0, 0, 0, .3);">
				<p class="img">
					<img src="???">
				</p>

				<p class="inputsRange">
					<span>Horizontal</span>
					<input class="horizontal" type="range" min="-300" max="300" value="0">

					<span>Vertical</span>
					<input class="vertical" type="range" min="-200" max="200" value="0">

					<span>Scale</span>
					<input class="scale" type="range" step="0.01" min="0.2" max="4" value="1">

					<button title="Bring to the original position" class="white-btn">Reset</button>
				</p>


				<p class="inputs">
					<span>Name</span>
					<input type="" name="" title="Name" placeholder="Name" value="" class="edit-member-name">
					
					<span>Role</span>
					<input type="" name="" title="Role" placeholder="Role" value="" class="edit-member-role">
					
					<span>Display index</span>
					<input type="" name="" title="Display order, the lower - the first" placeholder="Display index" value="" class="edit-member-index">

					<br>


					<span>Photo</span>
					<input type="" name="image" title="Link to photo" placeholder="Link to photo" value="" class="edit-member-photo">
					
					

					<span>Upload photo</span>

					<input class="inputUploads" type="file" name="file">

					<!-- <button class="white-btn" type="button">Upoad photo</button> -->



				</p>

				<p class="control">
					<b style="height: 0px;"></b>
					<button class="edit-members-add">ADD</button>
				</p>
			</div>


			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<?php
				$members_query = mysqli_query($connection, "SELECT * FROM `members` ORDER BY `display_index`");

				while ($members = mysqli_fetch_assoc($members_query)) {
					$member_id = $members['id'];
					$member_name = $members['name'];
					$member_role = $members['role'];
					$member_photo = $members['photo'];
					$member_status = $members['status'];
					$member_index = $members['display_index'];

					$horizontal = $members['horizontal'];
					$vertical = $members['vertical'];
					$scale = $members['scale'];

					$member_redactor_id = $members['last_redactor'];

					if ($member_status == 'show') {
						$member_redactor_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `name` FROM `users` WHERE `id` = '$member_redactor_id'"))['name'];

						if ($member_redactor_id != 0) {
							$member_redactor = '<br><p class="redactor">Last redactor: ' . $member_redactor_name . ' (ID: ' . $member_redactor_id . ')</p>';
						} else {
							$member_redactor = "";
						};

						echo '
						<div class="block" id="id_' . $member_id . '">
							<p class="id">ID: ' . $member_id . '</p>
							<p class="img">
								<img style="margin-left:' . $horizontal . '%;margin-top:' . $vertical . '%;transform: scale(' . $scale . ');" src="' .  $member_photo . '">
							</p>

							<p class="inputsRange">
								<span>Horizontal</span>
								<input class="horizontal" type="range" min="-300" max="300" value="' . $horizontal . '">

								<span>Vertical</span>
								<input class="vertical" type="range" min="-200" max="200" value="' . $vertical . '">

								<span>Scale</span>
								<input class="scale" type="range" step="0.01" min="0.1" max="4" value="' . $scale . '">

								<button title="Bring to the original position" class="white-btn">Reset</button>
							</p>

							<p class="inputs">
								<span>Name</span>
								<input type="" name="" title="Name" placeholder="Name" value="' . $member_name . '" class="edit-member-name">
								
								<span>Role</span>
								<input type="" name="" title="Role" placeholder="Role" value="' . $member_role . '" class="edit-member-role">

								<span>Display index</span>
								<input type="" name="" title="Display order, the lower - the first" placeholder="Display index" value="' . $member_index . '" class="edit-member-index">
								<br>
								<span>Photo</span>
								<input type="" name="image" title="Link to photo" placeholder="Link to photo" value="' . $member_photo . '" class="edit-member-photo">
								
								<span>Upload photo</span>

								<input class="inputUploads" type="file" name="file">

								<!-- <button class="white-btn" type="button">Upoad photo</button> -->

							</p>
	
							<p class="control">
								<b></b>
								<button class="edit-member-save">Save</button>
								<button class="edit-member-delete">Delete</button>
							</p>
							' . $member_redactor . '
						</div>
						';
					}
				}
			?>
		</div>
	</div>



	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- ###############=-    LYRICS REDACTOR    -=######################## -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->



	<div class="editLyrics editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>LYRICS EDITOR</h1>

		<div class="list">

			<div class="example">
				<p class="ex_title">Title</p>
				<p class="ex_text">Text</p>
				<p class="ex_album">Album</p>
				<p class="ex_action">Action</p>
			</div>

			<div class="block" id="id_add" style="padding: 20px 0; transform: scale(1); box-shadow: 0 0 30px rgba(0, 0, 0, .3);">
				<p class="title">
					<input type="" name="" title="Title" placeholder="Title" value="" class="edit-lyrics-title">
				</p>

				<p class="text">
					<textarea title="Text" placeholder="Text" class="edit-lyrics-text"></textarea>
				</p>

				<p class="btn">
					<button><img src="../assets/img/arrow-down.svg"></button>
				</p>

				<p>
					<select>
						<?php
							$albums_names = mysqli_query($connection, "SELECT `title` FROM `albums` WHERE `status` != 'deleted' ORDER BY `id` DESC");
						while ($album_name = mysqli_fetch_assoc($albums_names)['title']) {
							echo'<option>' . $album_name . '</option>';
						}

						?>
					</select>
				</p>

				<p class="control">
					<b style="height: 0px;"></b>
					<button class="edit-lyrics-add">ADD</button>
				</p>
			</div>


			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_title">Title</p>
				<p class="ex_text">Text</p>
				<p class="ex_album">Album</p>
				<p class="ex_action">Action</p>
			</div>
			<?php
				$lyrics_query = mysqli_query($connection, "SELECT * FROM `lyrics` WHERE `status` != 'deleted' ORDER BY `id` DESC");

				while ($lyrics = mysqli_fetch_assoc($lyrics_query)) {
					$lyrics_id = $lyrics['id'];
					$lyrics_title = $lyrics['title'];
					$lyrics_text = $lyrics['text'];

					$lyrics_album_id = $lyrics['album_id'];



					$lyrics_text = str_replace('<br>', PHP_EOL, $lyrics_text);
					
					$lyrics_redactor_id = $lyrics['last_redactor'];

					$lyrics_redactor_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `name` FROM `users` WHERE `id` = '$lyrics_redactor_id'"))['name'];

					if ($lyrics_redactor_id != 0) {
						$lyrics_redactor = '<br><p class="redactor">Last redactor: ' . $lyrics_redactor_name . ' (ID: ' . $lyrics_redactor_id . ')</p>';
					} else {
						$lyrics_redactor = "";
					};

					$album_title = mysqli_fetch_assoc( mysqli_query($connection, "SELECT `title` FROM `albums` WHERE `id` = '$lyrics_album_id'") )['title'];
					$select_text = '<option>' . $album_title . '</option>';

					$albums_names = mysqli_query($connection, "SELECT * FROM `albums` WHERE `id` != '$lyrics_album_id' AND `status` != 'deleted' ORDER BY `id` DESC");
					while ($album_name = mysqli_fetch_assoc($albums_names)['title']) {
						$select_text = $select_text . '<option>' . $album_name . '</option>';
					}

					echo '
					<div class="block" id="id_' . $lyrics_id . '">
						<p class="id">' . $lyrics_id . '</p>
						<p class="title">
							<input type="" name="" title="Title" placeholder="Title" value="' . $lyrics_title . '" class="edit-lyrics-title">
						</p>
						<p class="text">
							<textarea title="Text" placeholder="Text" class="edit-lyrics-text">' . $lyrics_text . '</textarea>
						</p>

						<p class="btn">
							<button><img src="../assets/img/arrow-down.svg"></button>
						</p>

						<p>
							<select>
							  ' . $select_text . '
							</select>
						</p>

						<p class="control">
							<b></b>
							<button class="edit-lyrics-save">Save</button>
							<button class="edit-lyrics-delete">Delete</button>
						</p>
						' . $lyrics_redactor . '
					</div>
					';
					
				}
			?>
		</div>
	</div>




	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- ################=-    USERS REDACTOR    -=######################## -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->



	<div class="editUsers editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>USERS EDITOR</h1>

		<div class="list">

			<br>

			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<div class="example">
				<p class="ex_id">ID</p>
				<p class="ex_name">Name</p>
				<p class="ex_email">Email</p>
				<p class="ex_status">Status</p>
				<p class="ex_action">Action</p>
			</div>
			<?php
				$users_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `status` != 'banned' ORDER BY `id` DESC");

				while ($users = mysqli_fetch_assoc($users_query)) {
					$users_id = $users['id'];
					$users_name = $users['name'];
					$users_email = $users['email'];
					$users_status = $users['status'];

					if ($users_status == 'Admin') {
						$buttons = '
							<button class="edit-users-status-admin selected">Admin</button>
							<button class="edit-users-status-user">User</button>';
					} elseif ($users_status == 'User') {
						$buttons = '
							<button class="edit-users-status-admin">Admin</button>
							<button class="edit-users-status-user selected">User</button>';
					}

					echo '
					<div class="block" id="id_' . $users_id . '">
						<p class="id">' . $users_id . '</p>
						<p class="name">
							<input type="" name="" title="Name" placeholder="Name" value="' . $users_name . '" class="edit-users-name">
						</p>
						<p class="email">
							<input type="" name="" title="Email" placeholder="Email" value="' . $users_email . '" class="edit-users-email">
						</p>
						<p class="status">
							' . $buttons . '
						</p>
						

						<p class="control">
							<b></b>
							<button class="edit-users-save">Save</button>
							<button class="edit-users-delete">Ban</button>
						</p>
					</div>
					';
					
				}
			?>
		</div>
	</div>





	<!-- ################################################################## -->
	<!-- ################################################################## -->
	<!-- #################=-    SITE SETTINGS    -=######################## -->
	<!-- ################################################################## -->
	<!-- ################################################################## -->



	<div class="editSite editpanel">
		<img src="<?=$link?>/assets/img/close.svg" class="close-edit">
		<h1>SITE SETTINGS</h1>

		<div class="list">

			<br>

			<br>
			<button class="btn-reload">Reload page</button>
			<br>

			<?php
				$settings_query = mysqli_query($connection, "SELECT * FROM `settings`");

				while ($settings = mysqli_fetch_assoc($settings_query)) {
					$sett_wallpaper = $settings['main_wallpaper'];
					$sett_theme = $settings['theme'];

					$sett_vk = $settings['vk'];
					$sett_facebook = $settings['facebook'];
					$sett_instagram = $settings['instagram'];
					$sett_youtube = $settings['youtube'];
					$sett_twitter = $settings['twitter'];

					$sett_email = $settings['email'];

					$themes = array('Dark', 'White', 'Christmas');
					$themes_html = '';

					foreach ($themes as $value) {
						if ($sett_theme == $value) {
							$themes_html = $themes_html . '<button class="selected">' . $value . '</button>';
						} else {
							$themes_html = $themes_html . '<button>' . $value . '</button>';
						}
					}


					echo '
					<div class="block" id="id_1">
						<p class="img"><img src="' . $sett_wallpaper . '"></p>

						<p class="inputs">
							<span>Wallpaper on main page</span>
							<input type="" name="image" title="Image. This is displayed on the main page of the site" placeholder="Image" value="' . $sett_wallpaper . '" class="edit-settings-wallpaper">
							<input class="inputUploads" type="file" name="file">

							<span>Theme</span>
							<br>

							<span class="themes">
								' . $themes_html . '
							</span>

							<span style="margin-top: 25px;">Social media</span>

							<input type="" name="" title="VK. This is displayed in the footer of the site" placeholder="VK" value="' . $sett_vk . '" class="edit-settings-vk">

							<input type="" name="" title="Facebook. This is displayed in the footer of the site" placeholder="Facebook" value="' . $sett_facebook . '" class="edit-settings-fb">
							
							<input type="" name="" title="Instagram. This is displayed in the footer of the site" placeholder="Instagram" value="' . $sett_instagram . '" class="edit-settings-inst">

							
							<input type="" name="" title="Youtube. This is displayed in the footer of the site" placeholder="Youtube" value="' . $sett_youtube . '" class="edit-settings-yt">

							<input type="" name="" title="Twitter. This is displayed in the footer of the site" placeholder="Twitter" value="' . $sett_twitter . '" class="edit-settings-tw">

							<span>Email</span>

							<input type="" name="" title="Email. This is displayed in the footer of the site" placeholder="Email" value="' . $sett_email . '" class="edit-settings-email">

						</p>
						
						

						<p class="control">
							<b></b>
							<button class="edit-settings-save">Save</button>
						</p>
					</div>
					';
					
				}
			?>
		</div>
	</div>




	


</div>
<script type="text/javascript">	
	$('.editLyrics .btn button').click(function () {
		if ($(this).parent().parent().hasClass('openLyrics')) {
			$(this).parent().parent().removeClass('openLyrics');
		} else {
			$(this).parent().parent().addClass('openLyrics');
		}
	})

	// Выбор статуса пользователя в окне управления пользователями
	$('.editUsers .status button').click(function () {
		id = $(this).parent().parent().attr('id').replace('id_', '');

		if (!$(this).hasClass('.selected')) {
			$('.editUsers #id_' + id + ' .status button').removeClass('selected');
			$(this).addClass('selected');
			showSaveMessage('.editUsers', id);

		}
	})



	$('.editMembers .inputsRange .horizontal').on('input', function () {
		let id = $(this).parent().parent().attr('id');
		let value = $(this).val();
		console.log(id)
		console.log(value)
		$('.editMembers #' + id + ' .img img').css({"margin-left" : value + "%"});
	})

	$('.editMembers .inputsRange .vertical').on('input', function () {
		let id = $(this).parent().parent().attr('id');
		let value = $(this).val();

		console.log(id)
		console.log(value)

		$('.editMembers #' + id + ' .img img').css({"margin-top" : value + "%"});
	})

	$('.editMembers .inputsRange .scale').on('input', function () {
		let id = $(this).parent().parent().attr('id');
		let value = $(this).val();

		console.log(id)
		console.log(value)

		$('.editMembers #' + id + ' .img img').css({"transform" : "scale(" + value + ")"});
	})
	$('.editMembers .inputsRange button').click(function () {
		let id = $(this).parent().parent().attr('id');

		$('.editMembers #' + id + ' .inputsRange input:eq(0)').val(0);
		$('.editMembers #' + id + ' .inputsRange input:eq(1)').val(0);
		$('.editMembers #' + id + ' .inputsRange input:eq(2)').val(1);

		$('.editMembers #' + id + ' .img img').css({"transform" : "scale(1)", "margin-top" : "0%", "margin-left" : "0%"});
	})

	function changeImageFromUpload (editPanelType, id, files) {
		// var files;
		// files = this.files;
		// files = $('.inputUploads').prop('files')[0];

		console.log("this block id: " + id);
		showSaveMessage('.editMembers', id);
		
		console.log("this input (obj): ");
		console.log($(".editMembers #id_" + id + " .inputUploads"))

		// ничего не делаем если files пустой
		console.log("typeof files: " + typeof files);
		if( typeof files == 'undefined' ) return;

		// создадим объект данных формы
		var data = new FormData();

		// заполняем объект данных файлами в подходящем для отправки формате
		$.each( files, function( key, value ){
			data.append( key, value );
		});

		// добавим переменную для идентификации запроса
		data.append( 'my_file_upload', 1 );

	// AJAX запрос
		$.ajax({
			url : '<?= $link?>/inc/uploadFiles.php',
			type : 'POST',
			data : data,
			cache : false,
			dataType : 'json',
			// отключаем обработку передаваемых данных, пусть передаются как есть
			processData : false,
			// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
			contentType : false, 
			// функция успешного ответа сервера
			success : function( html ){
				console.log("html from server: " + html);

				console.log("this id: " + id);

				var fileName = $(editPanelType + " #id_" + id + " .inputUploads").val().split('/').pop().split('\\').pop();

				console.log("filename: " + fileName);

				updatePhoto(editPanelType, id, "<?= $link ?>/uploads/" + fileName);
			}
		});
		// return fileName;
	}

	




	// Выбор темы в окне редактирования настроек сайта
	$('.editSite .themes button').click(function () {
		
		// if (!$(this).hasClass('.selected')) {
		// 	$('.editSite .themes button').removeClass('selected');
		// 	$(this).addClass('selected');
		// 	showSaveMessage('.editSite', id);

		// }
	})

	// Нажатие на крестик в каждой панели управления
	$('.close-edit').click(function () {
		closeEditpanel();
	})

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

	// Нажатие на кнопку перезагрузки страницы
	$('.btn-reload').click(function () {
		location.reload();
	})

	// Анимация "подпрыгивания" кнопки перезагрузки страницы
	function btnReloadAnimation (type) {
		$(type + ' .btn-reload').css({'margin-top' : '-15px', 'margin-bottom' : '15px'});
			setTimeout(function () {
				$(type + ' .btn-reload').css({'margin-top' : '0px', 'margin-bottom' : '0px'});
			}, 300);

	}

	// Анимация удаления блока из панели управления
	function removeBlock (id, classname) {
		// console.log(id)
		id = classname + ' #' + id; 

		$(id).css({"transform" : "scale(0)", "margin" : "0px", "padding" : "0px", "height" : "0px", "opacity" : "0"});
		setTimeout(function () {
			$(id).remove();
		}, 800);
	}
	// Обновление фото, после того как пользователь введёт новую ссылку
	function updatePhoto (classname, id, url) {
		// console.log(id + ' - ' +  url);

		$(classname + ' #id_' + id + ' .img img').attr('src', url);
	}

	// Сообщение о том, что изменения не сохранены
	function showSaveMessage (classname, id) {
		text = 'Changes not saved!';

		$(classname + ' #id_' + id + ' .control b').text(text);
	}

	// Открытие окна панели управления
	function closeEditpanel () {
		$('.edit').css({"opacity" : "0"});
		$('.edit .editpanel').css({"margin-top" : "30px"});

		setTimeout(() => {
			$('.edit .editpanel').css({"display" : "none"});
			$('.edit').css({"display" : "none"});
			$('.edit .editpanel').css({"margin-top" : "-30px", "opacity" : "0"});
		}, 350);

		$('body').css({'overflow' : 'unset'});
	}

	// Закрытие окна панели управления
	function openEditpanel (name) {
		$('.edit .' + name).css({"display" : "inline"});
		$('.edit').css({"display" : "flex"});

		setTimeout(() => {
			$('.edit').css({"margin-top" : "0px", "opacity" : "1"});
			$('.edit .' + name).css({"margin-top" : "0px", "opacity" : "1"});
		}, 100);

		$('body').css({'overflow' : 'hidden'});
		
		console.log(1)
	};





	// #############################################
	// Действия в окне панели управления (НОВОСТИ)
	// #############################################

	// Изменение фотографии при введении новой ссылки на странице ред. новостей
	$('.editNews input[name="image"]').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		updatePhoto('.editNews', id, this.value);
	})
	// Сообщение о том, что изменения не сохранены на странице ред. новостей
	$('.editNews input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editNews', id);
	})
	// Сообщение о том, что изменения не сохранены на странице ред. новостей
	$('.editNews textarea').on('textarea keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editNews', id);
	})
	// Сохранение новости
	$('.edit-news-save').click(function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		let parent = ".editNews #id_" + id;
		// console.log(id);
		let image = $(parent + ' .edit-news-image').val();
		let title = $(parent + ' .edit-news-title').val();
		let text = $(parent + ' .edit-news-text').val();
		let date = $(parent + ' .edit-news-date').val();

		console.log(image + ' - ' + title + '-' + text + '-' + date);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "news-edit",
				id: id,
				image: image,
				title: title,
				text: text,
				date: date
			},
			success: function () {
				$('.editNews #id_' + id + ' .control b').text('');
				btnReloadAnimation('.editNews');
				// location.reload()
			}
		})
	})
	// Удаление новости
	$('.edit-news-delete').click(function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		let parent = ".editNews #id_" + id;
		// console.log(id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "news-delete",
				id: id
			},
			success: function () {
				removeBlock("id_" + id, '.editNews');
			}
		})
	})
	// Добавление новости
	$('.edit-news-add').click(function () {
		let image = $('.editNews #id_add .edit-news-image').val();
		let title = $('.editNews #id_add .edit-news-title').val();
		let text = $('.editNews #id_add .edit-news-text').val();
		let date = $('.editNews #id_add .edit-news-date').val();

		// console.log(image + ' - ' + title + '-' + text + '-' + date);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "news-add",
				image: image,
				title: title,
				text: text,
				date: date
			},
			success: function () {
				btnReloadAnimation('.editNews');
			}
		})
	})





	// #############################################
	// Действия в окне панели управления (АЛЬБОМЫ)
	// #############################################

	// Изменение фотографии при введении новой ссылки на странице ред. альбомов
	$('.editAlbums input[name="image"]').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		updatePhoto('.editAlbums', id, this.value);
	})
	// Сообщение о том, что изменения не сохранены на странице ред. альбомов
	$('.editAlbums input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editAlbums', id);
	})

	$('.editAlbums .inputUploads').on('change', function(){
		var files;	
		console.log('input is changed!')
		files = this.files;
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');

		fileName = $(".editAlbums #id_" + id + " .inputUploads").val().split('/').pop().split('\\').pop();

		changeImageFromUpload('.editAlbums', id, files);

		$('.editAlbums .title_text .edit-album-image').val("<?= $link?>/uploads/" + fileName);
	});

	// Сохранение альбомов
	$('.edit-album-save').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');
		let parent = ".editAlbums #id_" + id;
		// console.log(id);
		let title = $(parent + ' .edit-album-title').val();
		let image = $(parent + ' .edit-album-image').val();
		let date = $(parent + ' .edit-album-date').val();

		let spotify = $(parent + ' .edit-album-spotify').val();
		let itunes = $(parent + ' .edit-album-itunes').val();
		let applemusic = $(parent + ' .edit-album-applemusic').val();
		let yandexmusic = $(parent + ' .edit-album-yandexmusic').val();
		let youtubemusic = $(parent + ' .edit-album-youtubemusic').val();
		let deezer = $(parent + ' .edit-album-deezer').val();

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "albums-edit",
				id: id,
				title: title,
				image: image,
				date: date,
				spotify: spotify,
				itunes: itunes,
				applemusic: applemusic,
				yandexmusic: yandexmusic,
				youtubemusic: youtubemusic,
				deezer, deezer
			},
			success: function () {
				$('.editAlbums #id_' + id + ' .control b').text('');
				btnReloadAnimation('.editAlbums');
			}
		})
	})
	// Удаление альбомов
	$('.edit-album-delete').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');

		// console.log("Deleted: Album #" + id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "albums-delete",
				id: id
			},
			success: function () {
				removeBlock("id_" + id, '.editAlbums');
			}
		})
	})

	// Добавление альбомов
	$('.edit-album-add').click(function () {
		let title = $('.editAlbums #id_add .edit-album-title').val();
		let image = $('.editAlbums #id_add .edit-album-image').val();
		let date = $('.editAlbums #id_add .edit-album-date').val();

		let spotify = $('.editAlbums #id_add .edit-album-spotify').val();
		let itunes = $('.editAlbums #id_add .edit-album-itunes').val();
		let applemusic = $('.editAlbums #id_add .edit-album-applemusic').val();
		let yandexmusic = $('.editAlbums #id_add .edit-album-yandexmusic').val();
		let youtubemusic = $('.editAlbums #id_add .edit-album-youtubemusic').val();
		let deezer = $('.editAlbums #id_add .edit-album-deezer').val();

		// console.log(image + ' - ' + title + '-' + text + '-' + date);
		console.log(title)
		console.log(image)
		console.log(date)
		console.log(spotify)
		console.log(itunes)
		console.log(applemusic)
		console.log(yandexmusic)
		console.log(youtubemusic)
		console.log(deezer)

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "albums-add",
				title: title,
				image: image,
				date: date,
				spotify: spotify,
				itunes: itunes,
				applemusic: applemusic,
				yandexmusic: yandexmusic,
				youtubemusic: youtubemusic,
				deezer, deezer
			},
			success: function () {
				btnReloadAnimation('.editAlbums');
			}
		})
	})





	// #############################################
	// Действия в окне панели управления (УЧАСТНИКИ ГРУППЫ)
	// #############################################

	// Изменение фотографии при введении новой ссылки на странице ред. участников
	$('.editMembers input[name="image"]').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		updatePhoto('.editMembers', id, this.value);
		// 
	})
	// Сообщение о том, что изменения не сохранены на странице ред. участников
	$('.editMembers input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		
		inputType = $(this).attr("type");
		// console.log(inputType)

		// inputType != "file"
		if ( true ) {
			showSaveMessage('.editMembers', id);
		}
	})
	$('.editMembers .inputsRange button').click(function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editMembers', id);
	})

	// Загрузка фото на сервер
	
	
	$('.editMembers .inputUploads').on('change', function(){
		var files;	
		console.log('input is changed!')
		files = this.files;
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');

		fileName = $(".editMembers #id_" + id + " .inputUploads").val().split('/').pop().split('\\').pop();

		changeImageFromUpload('.editMembers', id, files);

		$('.editMembers .inputs .edit-member-photo').val("<?= $link?>/uploads/" + fileName);
	});

	$('.editMembers .inputs button').on( 'click', function( event ){
	// 	id = $(this).parent().parent().attr("id").replace("id_", "");
	// 	console.log("this block id: " + id);
	// 	showSaveMessage('.editMembers', id);
		
	// 	console.log("this input (obj): ");
	// 	console.log($(".editMembers #id_" + id + " .inputUploads"))

	// 	// ничего не делаем если files пустой
	// 	console.log("typeof files: " + typeof files);
	// 	if( typeof files == 'undefined' ) return;

	// 	// создадим объект данных формы
	// 	var data = new FormData();

	// 	// заполняем объект данных файлами в подходящем для отправки формате
	// 	$.each( files, function( key, value ){
	// 		data.append( key, value );
	// 	});

	// 	// добавим переменную для идентификации запроса
	// 	data.append( 'my_file_upload', 1 );

	// // AJAX запрос
	// 	$.ajax({
	// 		url : '<?= $link?>/inc/uploadFiles.php',
	// 		type : 'POST',
	// 		data : data,
	// 		cache : false,
	// 		dataType : 'json',
	// 		// отключаем обработку передаваемых данных, пусть передаются как есть
	// 		processData : false,
	// 		// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
	// 		contentType : false, 
	// 		// функция успешного ответа сервера
	// 		success : function( html ){
	// 			console.log("html from server: " + html);

	// 			console.log("this id: " + id);

	// 			var fileName = $(".editMembers #id_" + id + " .inputUploads").val().split('/').pop().split('\\').pop();

	// 			console.log("filename: " + fileName);

	// 			updatePhoto('.editMembers', id, "<?= $link ?>/uploads/" + fileName);
	// 			$('.editMembers .inputs .edit-member-photo').val("<?= $link?>/uploads/" + fileName);
	// 			files = "";
	// 		}
	// 	});
	});


	// Сохранение участников
	$('.edit-member-save').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');
		let parent = ".editMembers #id_" + id;
		// console.log(id);
		let name = $(parent + ' .edit-member-name').val();
		let role = $(parent + ' .edit-member-role').val();
		let photo = $(parent + ' .edit-member-photo').val();
		let index = $(parent + ' .edit-member-index').val();

		let horizontal = $(parent + ' .inputsRange input:eq(0)').val();
		let vertical = $(parent + ' .inputsRange input:eq(1)').val();
		let scale = $(parent + ' .inputsRange input:eq(2)').val();
		
		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "members-edit",
				id: id,
				name: name,
				role: role,
				photo: photo,
				index: index,
				horizontal: horizontal,
				vertical: vertical,
				scale: scale
			},
			success: function () {
				$('.editMembers #id_' + id + ' .control b').text('');
				btnReloadAnimation('.editMembers');
			}
		})
	})
	// Удаление удастника
	$('.edit-member-delete').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');

		// console.log("Deleted: Album #" + id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "members-delete",
				id: id
			},
			success: function () {
				removeBlock("id_" + id, '.editMembers');
			}
		})
	})

	// Добавление участника
	$('.edit-members-add').click(function () {
		let name = $('.editMembers #id_add .edit-member-name').val();
		let role = $('.editMembers #id_add .edit-member-role').val();
		let photo = $('.editMembers #id_add .edit-member-photo').val();
		let index = $('.editMembers #id_add .edit-member-index').val();

		let horizontal = $('.editMembers #id_add .inputsRange input:eq(0)').val();
		let vertical = $('.editMembers #id_add .inputsRange input:eq(1)').val();
		let scale = $('.editMembers #id_add .inputsRange input:eq(2)').val();

		console.log(name + ' - ' + role + '-' + photo + '-' + index);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "members-add",
				name: name,
				role: role,
				photo: photo,
				index: index,
				horizontal: horizontal,
				vertical: vertical,
				scale: scale
			},
			success: function () {
				btnReloadAnimation('.editMembers');
			}
		})
	})







	// #############################################
	// Действия в окне панели управления (ТЕСТЫ ПЕСЕН)
	// #############################################

	// Сообщение о том, что изменения не сохранены на странице ред. текстов
	$('.editLyrics input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editLyrics', id);
	})
	// Сообщение о том, что изменения не сохранены на странице ред. текстов
	$('.editLyrics textarea').on('textarea keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editLyrics', id);
	})
	// Сохранение текста песни
	$('.edit-lyrics-save').click(function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		let parent = ".editLyrics #id_" + id;
		// console.log(id);
		let title = $(parent + ' .edit-lyrics-title').val();
		let text = $(parent + ' .edit-lyrics-text').val();

		let album = $(parent + ' select option:selected').text();

		text = text.replace(/\r?\n/g, '<br>');
		console.log(album);

		console.log(title + '\n\n' + text + '\n\n' + id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "lyrics-edit",
				id: id,
				title: title,
				text: text,
				album: album
			},
			success: function () {
				$('.editLyrics #id_' + id + ' .control b').text('');
				btnReloadAnimation('.editLyrics');
				// location.reload()
			}
		})
	})
	// Удаление текста песни
	$('.edit-lyrics-delete').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');

		// console.log("Deleted: Album #" + id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "lyrics-delete",
				id: id
			},
			success: function () {
				removeBlock("id_" + id, '.editLyrics');
			}
		})
	})
	// Добавление текста песни
	$('.edit-lyrics-add').click(function () {
		let parent = ".editLyrics #id_add";
		// console.log(id);
		let title = $(parent + ' .edit-lyrics-title').val();
		let text = $(parent + ' .edit-lyrics-text').val();

		let album = $(parent + ' select option:selected').text();

		text = text.replace(/\r?\n/g, '<br>');
		// console.log(text);

		// console.log(title + '\n' + text + '\n' + album);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "lyrics-add",
				title: title,
				text: text,
				album: album
			},
			success: function () {
				btnReloadAnimation('.editLyrics');
				// location.reload()
			}
		})
	})





	// #############################################
	// Действия в окне панели управления (ПОЛЬЗОВАТЕЛИ)
	// #############################################

	// Сообщение о том, что изменения не сохранены на странице ред. текстов
	$('.editUsers input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editUsers', id);
	})
	// Сохранение пользователей
	$('.edit-users-save').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');
		let parent = ".editUsers #id_" + id;
		// console.log(id);
		let name = $(parent + ' .edit-users-name').val();
		let email = $(parent + ' .edit-users-email').val();
		let status = $(parent + ' .status .selected').text();
		
		// console.log(status)
		
		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "users-edit",
				id: id,
				name: name,
				email: email,
				status: status
			},
			success: function () {
				$('.editUsers #id_' + id + ' .control b').text('');
				btnReloadAnimation('.editUsers');
			}
		})
	})
	// Блокировка пользователя
	$('.edit-users-delete').click(function () {
		let id = $(this).parent().parent().attr("id").replace('id_', '');

		// console.log("Deleted: Album #" + id);

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "users-delete",
				id: id
			},
			success: function () {
				removeBlock("id_" + id, '.editUsers');
			}
		})
	})





	// #############################################
	// Действия в окне панели управления (настройки сайта)
	// #############################################

	// Сообщение о том, что изменения не сохранены на странице ред. сайта
	$('.editSite input').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		showSaveMessage('.editSite', id);
	})
	$('.editSite input[name="image"]').on('input keyup', function () {
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');
		updatePhoto('.editSite', id, this.value);
		// 
	})

	$('.editSite .inputUploads').on('change', function(){
		var files;	
		console.log('input is changed!')
		files = this.files;
		let id = ($(this).parent().parent().attr("id")).replace('id_', '');

		fileName = $(".editSite #id_" + id + " .inputUploads").val().split('/').pop().split('\\').pop();

		changeImageFromUpload('.editSite', id, files);

		$('.editSite .edit-settings-wallpaper').val("<?= $link?>/uploads/" + fileName);
	});

	// Сохранение настроек сайта
	$('.edit-settings-save').click(function () {
		// console.log(id);
		let wallpaper = $('.editSite .block .edit-settings-wallpaper').val();

		let vk = $('.editSite .block .edit-settings-vk').val();
		let fb = $('.editSite .block .edit-settings-fb').val();
		let inst = $('.editSite .block .edit-settings-inst').val();
		let yt = $('.editSite .block .edit-settings-yt').val();
		let tw = $('.editSite .block .edit-settings-tw').val();

		let email = $('.editSite .block .edit-settings-email').val();
		
		console.log(wallpaper)

		$.ajax({
			url: "<?= $link?>/inc/editPanel.php",
			type: "POST",
			cache: false,
			data: {
				type: "settings-edit",
				wallpaper: wallpaper,
				vk: vk,
				fb: fb,
				inst: inst,
				yt: yt,
				tw: tw,
				email: email
			},
			success: function () {
				$('.editSite .block .control b').text('');
				btnReloadAnimation('.editSite');
			}
		})
	})


	


</script>
<?php
	endif;
?>