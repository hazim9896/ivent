<html>
	<head>
		<meta charset="utf-8">
		<title>Ivent</title>
	</head>
	<body>
		<?php
			session_start();
			
			if ($_SESSION['username'] != null){
				header('Location: http://localhost/calendar');
				exit();
			}
		?>
		<div>
			<a href="http://localhost/login/">Log In</a>
		</div>
		<div>
			<a href="http://localhost/signup/">Sign Up</a>
		</div>
		<div>
			<a href="http://localhost/about">About Us</a>
		</div>
		<hr/>
		<img src="logo.png" alt="Ivent Logo" height="200"/>
		<h2>Ivent</h2>
		<h4>Your favourite Event Management System</h4>
		<hr/>
	</body>
</html>
