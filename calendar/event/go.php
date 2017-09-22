<?php
	require_once('../../conn.php');
	require_once('../../db.php');
	require_once('../../util.php');
	
	if ($_POST){
		session_start();
		
		$username = $_SESSION['username'];
		
		if (empty($username)){
			Util::alert('You are not logged in!', 'http://localhost/login');
		}
		
		$event = $_POST['id'];
		
		if (Db::insertAttendance($mysqli, $username, $event)){
			Util::alert('Event added to your calendar.', 'http://localhost/calendar/event/?id=' . $id);
		} else {
			Util::alert('Failed to add event to your calendar.', 'http://localhost/calendar/event/?id=' . $id);
		}
	}
?>
