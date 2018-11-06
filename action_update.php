<?php
	session_start();
?>
<?php
	include('db_inc.php');
		$old=mysqli_real_escape_string($conn,$_POST['old']);
		$new=mysqli_real_escape_string($conn,$_POST['new']);
		$first=$_SESSION['RegNo'];
		$second=$_SESSION['Name'];
		$password=$_SESSION['Pwd'];
		if($old==$password)
		{
			$sql="update student SET Pwd='$new' where RegNo='$first'";
			$result=mysqli_query($conn,$sql);
			$_SESSION['update_pwd'] = TRUE;
			$_SESSION['update_pwd'] = "Password successfully updated";
			header('Location:welcome.php');
		}			
		
?>