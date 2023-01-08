<?php
function isLoginSessionExpired() {
	$login_session_duration = 10; 
	$current_time = time(); 
	//echo $current_time." = ";
	
	// echo $_SESSION['loggedin_time'];
	//echo " time difference ".(time() - $_SESSION['loggedin_time']);
	
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
		//echo "TRUE";
			return true; 
		} 
	}
	return false;
}
?>