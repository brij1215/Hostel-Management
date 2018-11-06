<?php
	session_start();
?>
<?php
	if(isset($_SESSION['admin']))
	{
		session_start();
		session_unset();
		session_destroy();
		header("Location: ../hostelmng/admin.php");
		exit();
	}	
?>