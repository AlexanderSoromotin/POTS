<?php

include "db.php";

$name = $_POST['reg_name'];
$email = $_POST['reg_email'];
$password = md5($_POST['reg_first_password']);


$token = md5($email . $password . 'superTokenHeheheHahaha' . rand(0, 1000));

mysqli_query($connection, "INSERT INTO `users` (`name`, `email`, `password`, `token`) VALUES ('$name' , '$email', '$password', '$token' )");

setcookie("token", $token, time() + 3600 * 24 * 30, "/");

header("Location: /");


?>