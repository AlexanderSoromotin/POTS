<?php

$token = '7dc353f9839e2de0034b770ce5dddfc4ee5ac08338867b059e1c4179f1febd57f77a8e0b780902e1477bd';
$email = $_POST['email'];
$name = $_POST['name'];
$text = $_POST['message'];
$date = date("j F Y, H:i");

$message = '
==========================
Алексей, вам оставили обращение:

Дата: ' . $date . '
Имя: ' . $name . '
Почта: ' . $email . '
Текст обращения:

	' . $text . '
';
// Александр - 235359833
// Алексей - 259385415
$request_params = array(
		'message' => $message, 
		'peer_id' => '259385415', 
		'access_token' => $token,
		'v' => '5.87'
	);

	$get_params = http_build_query($request_params); 
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);

