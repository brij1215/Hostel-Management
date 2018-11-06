<?php
	session_start();
?>
<?php
	include('db_inc.php');
		$comp=mysqli_real_escape_string($conn,$_POST['complaint']);
		$first=$_SESSION['RegNo'];
		$second=$_SESSION['Name'];
		$third=$_SESSION['HostelName'];
		$four=$_SESSION['Email'];
		$date = date('Y-m-d H:i:s');
		$sql="INSERT INTO `complaint` (`StdId`,`Complaint`,`CompDate`) VALUES ('$first','$comp','$date')";
		$result=mysqli_query($conn,$sql);
		$_SESSION['reg_comp'] = TRUE;
		$_SESSION['reg_comp'] = "Your Complaint is successfully registered ";
		header('Location:complaint.php');
		
?>
