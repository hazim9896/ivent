<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Log In</title>
	</head>
	<body>
		<div>
		<?php
		session_start();
		
		require_once('../conn.php');
		require_once('../db.php');
		require_once('../util.php');
		
		
		if ($_POST){
			$username = $_POST['uid'];
			$password = $_POST['pwd'];
			
			if (Db::hasUser($mysqli, $username)){
				if ($password == Db::getPassword($mysqli, $username)){

					$_SESSION['username'] = $username;

					Util::alert('Welcome back, ' . $username . '!', 'http://localhost/calendar/');
					exit();
				} else {
					Util::alert('Wrong username or password. Please try again.', 'http://localhost/login/');
				}
			} else {
				Util::alert('No such user exist. Maybe you want to sign up?', 'http://localhost/login/');
			}
		}
		?>
		</div>
	</body>
	
</html>
