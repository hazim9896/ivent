<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Calendar</title>
	</head>
	<body>
		<div>
			<a href="http://localhost/calendar/add/">Add an event</a>
		</div>
		<div>
			<a href="http://localhost/logout/">Logout</a>
		</div>
		<?php
		session_start();
		
		require_once('../conn.php');
		require_once('../db.php');	
		require_once('../util.php');
		
		$username = $_SESSION['username'];
		
		if ($username == null){
			Util::alert('You are not logged in.', 'http://localhost/login');
		}
		
		echo '<h1>' . $username . '\'s calendar</h1>';
		
		try{
			$events = Db::getEvents($mysqli, $username);
			
			if (empty($events)){
				echo '<h3>You have no events in your calendar.</h3>';
			} else {
			
				foreach($events as $event){
					echo '<p>' . $event['member'] . '<br>' . 
								 $event['title'] . '<br>' . 
								 $event['info'] . '<br>' . 
								 $event['date'] . 
								 '<br><a href="http://localhost/calendar/event/?id=' . $event['id'] . 
								 '">View Attendance</a></p><hr>';
				}
			}
		} catch (Exception $e){
			echo '<h1>No events to display</h1>';
		}
		?>
	</body>
</html>
