<?php
	session_start();
?>
<?php
	if(isset($_SESSION['RegNo']))
	{
		session_start();
		session_unset();
		session_destroy();
		header("Location: ../hostelmng/home.php");
		exit();
	}	
?>