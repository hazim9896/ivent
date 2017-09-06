<?php
require_once('../conn.php');
require_once('../db.php');

echo 
'<html>
	<head>
		<meta charset="utf-8">
		<title>Calendar</title>
	</head>
	<body>';
	

$username = 'user';

try{
	$events = Db::getEvents($mysqli, $username);
	
	foreach($events as $event){
		echo '<p>' . $event['id'] . '<br>' . 
					 $event['member'] . '<br>' . 
					 $event['title'] . '<br>' . 
					 $event['info'] . '<br>' . 
					 $event['date'] . '</p>'
					 . '<hr>';
	}
	
} catch (Exception $e){
	echo '<h1>No events to display</h1>';
}

echo 
'		<div>
			<a href="">Add Event</a>
		</div>
	</body>
</html>';
?>
