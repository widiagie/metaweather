<?php 
/* Database Configuration */
$db_username = "root"; //Database Username
$db_password = ""; //Database Password 
$hostname = "localhost"; //Mysql Hostname
$db_name = 'metaweather'; //Database Name 

$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);

if ($mysqli->connect_error) {
	die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
} 