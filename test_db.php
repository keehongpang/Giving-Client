<?php
require_once("includes/config.php");

// connect to the db 
$mysqli = new mysqli (EE_DB_HOST, EE_DB_USER, EE_DB_PASS, EE_DB_NAME);

// Check connection 
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

// set the default timezone to use
date_default_timezone_set('America/New_York');
echo "Connected..." . PHP_EOL;

$mysqli->close();


?>
