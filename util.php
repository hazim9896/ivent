<?php
	class Util{
		
		static function alert($msg, $url){
			echo '<script type="text/javascript">
					alert("' . $msg . '");
					window.location.href = "' . $url . '";
				</script>';
		}
		
		static function redirect($url){
			header('Location: ' . $url);
		}
	}
?>
