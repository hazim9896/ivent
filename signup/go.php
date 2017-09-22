<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Sign Up</title>
	</head>
	<body>
		<div>
			<h1>
			<?php
			require_once('../conn.php');
			require_once('../db.php');


			if ($_POST){
				$username = $_POST['uid'];
				$password = $_POST['pwd'];
	
				if(Db::hasUser($mysqli, $username)){
					die ('This username has been taken!');
				} else {
					if (Db::insertUser($mysqli, $username, $password)){
						//echo 'Successfully signed up!';
						header("Location: http://localhost/calendar");
						exit();
					} else {
						echo 'Failed to signed up.';
					}
				}
			}
			?>
			</h1>
		</div>
	</body>
</html>
