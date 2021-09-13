<?php
$type = $_POST['type'];
include "db.php";

// Редактирование новости
if ($type == "news-edit") {
	$id = $_POST['id'];
	$image = $_POST['image'];
	$title = addslashes($_POST['title']);
	$text = addslashes($_POST['text']);
	$date = $_POST['date'];

	include 'userData.php';

	if ($date == '') {
		mysqli_query($connection, "UPDATE `news` SET `img` = '$image', `title` = '$title', `text` = '$text', `last_redactor` = '$user_id' WHERE `id` = '$id' ");
	} else {
		mysqli_query($connection, "UPDATE `news` SET `img` = '$image', `title` = '$title', `text` = '$text', `date` = '$date', `last_redactor` = '$user_id' WHERE `id` = '$id' ");
	}
	
}
// Удаление новости
if ($type == "news-delete") {
	$id = $_POST['id'];
	mysqli_query($connection, "UPDATE `news` SET `status` = 'deleted' WHERE `id` = '$id'");
}
// Добавление новости
if ($type == "news-add") {
	$image = $_POST['image'];
	$title = addslashes($_POST['title']);
	$text = addslashes($_POST['text']);
	$date = $_POST['date'];

	include 'userData.php';

	if ($date == '') {
		mysqli_query($connection, "INSERT INTO `news` (`img`, `title`, `text`, `last_redactor`) VALUES ('$image', '$title', '$text', '$user_id') ");
	} else {
		mysqli_query($connection, "INSERT INTO `news` (`img`, `title`, `text`, `date`, `last_redactor`) VALUES ('$image', '$title', '$text', '$date', '$user_id') ");
	}
}	





// Редактирование альбома
if ($type == "albums-edit") {
	$id = $_POST['id'];
	$title = addslashes($_POST['title']);
	$image = $_POST['image'];
	$date = $_POST['date'];
	$spotify = $_POST['spotify'];
	$itunes = $_POST['itunes'];
	$applemusic = $_POST['applemusic'];
	$yandexmusic = $_POST['yandexmusic'];
	$youtubemusic = $_POST['youtubemusic'];
	$deezer = $_POST['deezer'];

	include 'userData.php';

	if ($date == '') {
		mysqli_query($connection, "UPDATE `albums` SET `title` = '$title', `img` = '$image', `spotify` = '$spotify', `itunes` = '$itunes', `apple_music` = '$applemusic', `yandex_music` = '$yandexmusic', `youtube_music` = '$youtubemusic', `deezer` = '$deezer', `last_redactor` = '$user_id' WHERE `id` = '$id' ");
	} else {
		mysqli_query($connection, "UPDATE `albums` SET `title` = '$title', `img` = '$image', `date` = '$date', `spotify` = '$spotify', `itunes` = '$itunes', `apple_music` = '$applemusic', `yandex_music` = '$yandexmusic', `youtube_music` = '$youtubemusic', `deezer` = '$deezer', `last_redactor` = '$user_id' WHERE `id` = '$id' ");
	}
}
// Удаление альбома
if ($type == "albums-delete") {
	$id = $_POST['id'];
	mysqli_query($connection, "UPDATE `albums` SET `status` = 'deleted' WHERE `id` = '$id'");
}
// Добавление альбома
if ($type == "albums-add") {
	$title = addslashes($_POST['title']);
	$image = $_POST['image'];
	$date = $_POST['date'];
	$spotify = $_POST['spotify'];
	$itunes = $_POST['itunes'];
	$applemusic = $_POST['applemusic'];
	$yandexmusic = $_POST['yandexmusic'];
	$youtubemusic = $_POST['youtubemusic'];
	$deezer = $_POST['deezer'];

	include 'userData.php';

	if ($date == '') {
		mysqli_query($connection, "INSERT INTO `albums` (`title`, `img`, `spotify`, `itunes`, `apple_music`, `yandex_music`, `youtube_music`, `deezer`, `last_redactor`) VALUES ('$title', '$image', '$spotify', '$itunes', '$applemusic', '$yandexmusic', '$youtubemusic', '$deezer', '$user_id')");
	} else {
		mysqli_query($connection, "INSERT INTO `albums` (`title`, `img`, `spotify`, `itunes`, `apple_music`, `yandex_music`, `youtube_music`, `deezer`, `last_redactor`, `date`) VALUES ('$title', '$image', '$spotify', '$itunes', '$applemusic', '$yandexmusic', '$youtubemusic', '$deezer', '$user_id', '$date')");
	}
}





// Редактирование  участника
if ($type == "members-edit") {
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
	$role = addslashes($_POST['role']);
	$photo = $_POST['photo'];
	$index = $_POST['index'];

	$horizontal = $_POST['horizontal'];
	$vertical = $_POST['vertical'];
	$scale = $_POST['scale'];

	include 'userData.php';

	mysqli_query($connection, "UPDATE `members` SET `name` = '$name', `role` = '$role', `photo` = '$photo', `display_index` = '$index', `horizontal` = '$horizontal', `vertical` = '$vertical', `scale` = '$scale', `last_redactor` = '$user_id' WHERE `id` = '$id' ");
}
// Удаление участника
if ($type == "members-delete") {
	$id = $_POST['id'];
	mysqli_query($connection, "UPDATE `members` SET `status` = 'deleted' WHERE `id` = '$id'");
}
// Добавление участника
if ($type == "members-add") {
	$name = addslashes($_POST['name']);
	$role = addslashes($_POST['role']);
	$photo = $_POST['photo'];
	$index = $_POST['index'];

	$horizontal = $_POST['horizontal'];
	$vertical = $_POST['vertical'];
	$scale = $_POST['scale'];

	include 'userData.php';

	mysqli_query($connection, "INSERT INTO `members` (`name`, `role`, `photo`, `display_index`, `last_redactor`, `horizontal`, `vertical`, `scale`) VALUES ('$name', '$role', '$photo', '$index', '$user_id', '$horizontal', '$vertical', '$scale')");
}



// Редактирование текста песни
if ($type == "lyrics-edit") {
	$id = $_POST['id'];
	$title = addslashes($_POST['title']);
	$text = addslashes($_POST['text']);
	$album = addslashes($_POST['album']);

	$album_id = mysqli_fetch_assoc( mysqli_query($connection, "SELECT `id` FROM `albums` WHERE `title` = '$album'") )['id'];

	include "userData.php";

	mysqli_query($connection, "UPDATE `lyrics` SET `title` = '$title', `text` = '$text', `album_id` = '$album_id', `last_redactor` = '$user_id' WHERE `id` = '$id'");
}
// Удаление текста песни
if ($type == "lyrics-delete") {
	$id = $_POST['id'];
	mysqli_query($connection, "UPDATE `lyrics` SET `status` = 'deleted' WHERE `id` = '$id'");
}
// Добавление текста песни
if ($type == "lyrics-add") {
	$title = addslashes($_POST['title']);
	$text = addslashes($_POST['text']);
	$album = addslashes($_POST['album']);

	$album_id = mysqli_fetch_assoc( mysqli_query($connection, "SELECT `id` FROM `albums` WHERE `title` = '$album'") )['id'];

	include "userData.php";

	mysqli_query($connection, "INSERT INTO `lyrics` (`title`, `text`, `album_id`, `last_redactor`) VALUES ('$title', '$text',  '$album_id', '$user_id') ");
}


// Редактирование пользователей
if ($type == "users-edit") {
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
	$email = $_POST['email'];
	$status = $_POST['status'];

	mysqli_query($connection, "UPDATE `users` SET `name` = '$name', `email` = '$email', `status` = '$status' WHERE `id` = '$id'");
}
// Удаление пользователя
if ($type == "users-delete") {
	$id = $_POST['id'];
	mysqli_query($connection, "UPDATE `users` SET `status` = 'banned' WHERE `id` = '$id'");
}







// Редактирование  настроек сайта
if ($type == "settings-edit") {
	$wallpaper = $_POST['wallpaper'];

	$vk = $_POST['vk'];
	$fb = $_POST['fb'];
	$inst = $_POST['inst'];
	$yt = $_POST['yt'];
	$tw = $_POST['tw'];

	$email = $_POST['email'];

	mysqli_query($connection, "UPDATE `settings` SET `main_wallpaper` = '$wallpaper', `vk` = '$vk', `facebook` = '$fb', `instagram` = '$inst', `youtube` = '$yt', `twitter` = '$tw', `email` = '$email'");
}


?>