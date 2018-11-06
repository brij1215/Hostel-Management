<?php
	session_start();
?>
<?php
	include('db_inc.php');
		$hname=mysqli_real_escape_string($conn,$_POST['hostel_name']);
		$notice=mysqli_real_escape_string($conn,$_POST['notice']);
		$date = date('Y-m-d H:i:s');
		$sql="INSERT INTO `notice` (`HostelName`,`noticeDate`,`Notice`) VALUES ('$hname','$date','$notice')";
		$result=mysqli_query($conn,$sql);
		$_SESSION['create_notice'] = TRUE;
		$_SESSION['create_notice'] = "You have successfully created new notice ";
		header("location: ../hostelmng/authenticate.php");
		
?>