<?php
$email = $_POST['email'];

include "db.php";

$result = mysqli_query($connection, "SELECT `name` FROM `users` WHERE `email` = '$email'");
$result = mysqli_fetch_assoc($result);

// echo $result;
if ($result == "") {
	echo 0;
} else {
	echo 1;
}

?>