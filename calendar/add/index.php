<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8">
		<title>Add Event</title>
		<style type="text/css">
			
			header, footer {
				padding: 1em;
				color: white;
				background-color: green;
				clear: left;
				text-align: center;
			}
			.center {
				text-align: center;
			}
			p {
				font-size: 0.875em;
				font-weight: bold;
			}
		</style>
	</head>
	
	<body>
		<?php
			session_start();
			
			require_once('../../util.php');
			
			if ($_SESSION['username'] == null){
				Util::alert('You are not logged in!', 'http://localhost/login/');
			}
		?>
		<header>Add an Event</header>
		<div class="center">
			<form method="post" action="go.php">
				<p>
					<label>Event Title: 
						<input type="text" name="title" />
					</label>
				</p>
				<p>
					<label>Event Description: 
						<br><textarea type="text" name="info" rows="6" cols="70" placeholder="Event's description here"></textarea>
					</label>
				</p>
				<p>
					<label>Start Date: 
						<input type="datetime-local" name="date"/>
					</label>
				</p>
				<p>
					<input type="submit" value="Add"/>
					<input type="reset" value="Reset" />
				</p>
			</form>
		</div>
	</body>
</html>
