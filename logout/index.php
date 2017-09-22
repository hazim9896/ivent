
<?php
	// LOGOUT
	require_once('../util.php');
	
	session_start();
	
	$_SESSION['username'] = null;
	
	session_destroy();
	
	Util::alert('You are logged out! Bye bye :D', 'http://localhost/');
?>
