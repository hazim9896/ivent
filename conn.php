<?php
// require_once('<path of this file>');

$mysqli = new mysqli('localhost', 'username', 'password', 'eventdb');

if ($mysqli->connect_errno){
	die('Could not connect to MYSQL' . mysqli_connect_error());
}

?>
