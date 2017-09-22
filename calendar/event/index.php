<html>
	<head>
		<meta charset="utf-8">
		<title>View Event</title>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
	<div>
		<a href="http://localhost/calendar/">My Calendar</a>
	</div>
	<div>
		<a href="http://localhost/logout/">Logout</a>
	</div>
	<br>
	<div class="center">
<?php
	require_once('../../conn.php');
	require_once('../../db.php');
	require_once('../../util.php');
	
	session_start();
	
	$username = $_SESSION['username'];
	
	if ($username == null){
		Util::alert('You are not logged in!', 'http://localhost/login/');
	} else {
		$id = $_GET['id'];
		
		if ($id < 1){
			Util::redirect('http://localhost/calendar/');
		}
		
		$event = Db::getEvent($mysqli, $id);
		
		if (empty($event)){
			Util::alert('This event does not exist! Returning to your calendar.', 'http://localhost/calendar/');
		}
	
		echo '<header>' . $event['title'] . '</header>';
		echo '<p>' . $event['info'] . '<br>';
	
		if ($event['member'] == $username){
			echo '<br>This event was created by <strong>you.</strong><br>';
		} else {
			echo '<br>This event was created by <strong>' . $event['member'] . '</strong><br>';
		}
	
		echo '<br><strong>Time: </strong>' . $event['date'] . '<hr>';
	
		echo '<br><strong>Event link:</strong> http://localhost/calendar/event/?id=' . $event['id'] . '</p><hr>';
		
		if (Db::notAttending($mysqli, $event['id'], $username)){
			echo '<h2>Will you be attending this event?</h2>
				  <form method="post" action="go.php">
				  	<input name="id" type="hidden" value="' . $event['id'] . '"/>
				  	<input type="submit" value="YES"/>
				  </form><hr>';
  	  	}
  	  	
  	  	$attendance = Db::getAttendance($mysqli, $event['id'], $username);
  	  	
  	  	if (empty($attendance)){
  	  		echo '<h4>No one is attending this event yet. Share the event link to collect attendees.</h4>';
  	  	} else {
  	  		echo '<h4>Who will be attending this event:</h4>
  				  <ol>';
  	  		foreach($attendance as $attend){
  	  			echo '<li>' . $attend['member'] . '</li>';
  	  		}
  	  		
  	  		echo '</ol><hr>';
  	  	}
	}
?>
</div>
</body>
</html>
