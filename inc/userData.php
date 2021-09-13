<?php
include "db.php";

$token = $_COOKIE["token"];

$userdata = mysqli_query($connection, "SELECT * FROM `users` WHERE `token` = '$token'");
$userdata = mysqli_fetch_assoc($userdata);

$user_name = $userdata['name'];
$user_email = $userdata['email'];
$user_status = $userdata['status'];
$user_id = $userdata['id'];

?>