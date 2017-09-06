<?php

class Db {

	static function getEvents($mysqli, $username){
		if ($stmt = $mysqli->prepare('SELECT * FROM event WHERE id IN (SELECT event FROM attendance WHERE member = ?)')){
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		}
	}

}

?>
