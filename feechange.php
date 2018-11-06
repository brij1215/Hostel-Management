<?php
	session_start();
?>
<?php
	include('db_inc.php');
		$reg=mysqli_real_escape_string($conn,$_POST['Sname']);
		$status=mysqli_real_escape_string($conn,$_POST['change_status']);
		$sql="UPDATE student SET FeeStatus='$status' WHERE RegNo='$reg' ";
		$result=mysqli_query($conn,$sql);
		$_SESSION['update_fee'] = TRUE;
		$_SESSION['update_fee'] = "You have successfully updated the <b>".$reg." </b>fee status";
		header("location: ../hostelmng/changestatus.php");
		
?>