<?php

	$db_url = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "pots";

	$connection = mysqli_connect($db_url, $db_username, $db_password, $db_name);
	$connection->set_charset("utf8");

?>
