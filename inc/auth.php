<?php

include "db.php";

$email = $_POST['log_email'];
$password = md5($_POST['log_password']);

// $email = 'a-sorom@mail.ru';
// $password = md5('1234');

// echo $password;

$result = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$i = mysqli_fetch_assoc($result);

// mysqli_query($connection, "DELETE FROM `users` WHERE `id` = 3");

// echo $i['token'];

if (!is_null($i)) {
	setcookie("token", $i['token'], time() + 3600 * 24 * 30, "/");
	header("Location: /");
} else {
	header("Location: /service");
}


?>