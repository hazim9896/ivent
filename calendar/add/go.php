<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Event</title>
	</head>
	<body>
		<?php
			session_start();

			require_once('../../conn.php');
			require_once('../../db.php');
			require_once('../../util.php');
						
			$username = $_SESSION['username'];
			
			if ($username == null){
				Util::alert('You are not logged in.', 'http://localhost/login/');
			} else {
				$title = $_POST['title'];
				$info = $_POST['info'];
				$date = $_POST['date'];
			
				$id = Db::insertEvent($mysqli, $username, $title, $info, $date);
				
				if ($id > 0){
					if (Db::insertAttendance($mysqli, $username, $id)){
						Util::alert('Event added to your calendar.', 'http://localhost/calendar/event/?id=' . $id);
					} else {
						Util::alert('Event created, but not added to your calendar.', 'http://localhost/calendar/event/?id=' . $id);
					}
				} else {
					Util::alert('Failed to create event.', 'http://localhost/calendar/');
				}
			}
		?>
	</body>
</html>
