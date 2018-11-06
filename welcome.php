<?php
	session_start();
?>
<?php
  if(isset($_SESSION['RegNo']))
  {
  }
  else
  {
	{
		include('db_inc.php');
		$uid=mysqli_real_escape_string($conn,$_POST['id']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
				//Error handlors and check input are empty
		if(empty($uid) || empty($pwd))
		{
			header("location: ../hostelmng/home.php?login=empty");
			exit();
		}
		else
		{
			$sql="SELECT * FROM student where RegNo='$uid'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck<1)
			{
				header("location: ../hostelmng/home.php?login=error");
				exit();
			}
			else
			{
				if($row=mysqli_fetch_assoc($result))
					//dashing the password
				{
					
					// login the user
					if($row['Pwd']==$pwd)
					{
						$_SESSION['RegNo']=$row['RegNo'];
						$_SESSION['Name']=$row['Name'];
						$_SESSION['Program']=$row['Program'];
						$_SESSION['ProgramYear']=$row['ProgramYear'];
						$_SESSION['Address']=$row['Address'];
						$_SESSION['HostelName']=$row['HostelName'];
						$_SESSION['Email']=$row['Email'];
						$_SESSION['Pwd']=$row['Pwd'];
						
					}
					else		
					{
						header("location: ../hostelmng/home.php?login=error");
						exit();
					}
				}
			}				
		}
			
	}
	
 }




?>
<!DOCTYPE html>
<html>
 <head>
  <title>Mnnit@hostle_management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap_css.css">
  <script src="jquery.js"></script>
  <script src="jquery_log.js"></script>
  <script src="popper.js"></script>
  <script src="bootstrap_js.js"></script>
  <script src="js/jquery.min.js" type="text/javascript"></script> 
  <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="js/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link rel="stylesheet" href="mystyle.css">
 </head>
 <body>
	<div class="container-fluid"style="text-align:center">
  <br>
  <img src="media/MNNIT_logo.png" class="rounded" alt="MNNIT_logo" width="500" height="200"> 
  <h1><strong>Hostel Management System</strong></h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://www.mnnit.ac.in/index.php/facilities/hostels/rules">Hostel Rules</a>
      </li>
      <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hostel List</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Swami Vivekananda Boys Hostel</a>
				<a class="dropdown-item" href="#">B.G. Tilak Hostel</a>
				<a class="dropdown-item" href="#">M.M. Malviya Hostel</a>
				<a class="dropdown-item" href="#">P.D. Tondon Hostel</a>
				<a class="dropdown-item" href="#">PG Hostel</a>
				<a class="dropdown-item" href="#">R.N. Tagore Hostel</a>
				<a class="dropdown-item" href="#">S.V. Patel Hostel</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">S.N. Girls Hostel</a>
				<a class="dropdown-item" href="#">K.N. Girls Hostel</a>
				<a class="dropdown-item" href="#">International House</a>
			</div>
  </li>
    </ul>
    <?php 
		if(isset($_SESSION['RegNo']))
		{
			echo'<form class="form-inline my-2 my-lg-0"action="logout.php" method="post">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="logout">LogOut</button>
				</form>';
		}
			
		else
			echo'<form class="form-inline my-2 my-lg-0"action="welcome.php" method="post">
			<input class="form-control mr-sm-2" type="text" name="id" placeholder="Registration No.">
			<input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit">LogIn</button>
				</form>';
	?>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="row">
		<div class="col-sm-3" style="background-color:lavender;">
			<div class="alert alert-success"style="text-align:center">
					<strong>DashBoard</strong> .
			</div>
			<div class="list-group">
				<a href="welcome.php" class="list-group-item list-group-item-action active">Profile</a>
				<a href="notice.php" class="list-group-item list-group-item-action">Notice</a>
				<a href="feestatus.php" class="list-group-item list-group-item-action ">Fee Status</a>
				<a href="complaint.php" class="list-group-item list-group-item-action">Complaint</a>
			</div>
		</div>
		<div class="col-sm-9" >
			<?php if(isset($_SESSION['RegNo']))
				$first=$_SESSION['RegNo'];
				$second=$_SESSION['Name'];
				$third=$_SESSION['HostelName'];
				$four=$_SESSION['Email'];
				echo"<strong>Your Details is:</strong></br>Registration no= ".$_SESSION['RegNo']."</br> Name= ".$_SESSION['Name']."</br> Hostel= ".$_SESSION['HostelName'].'</br>Email: '.$four.'</br>'; 
			?>
			</br></br>
			<?php
				if(isset($_SESSION['update_pwd'])){ ?>
			<div class="alert alert-dismissible alert-secondary">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Attention!</strong> </br>
				<?php echo $_SESSION['update_pwd']; ?>
				</div>
				<?php } ?>	
			<?php
				if(!isset($_SESSION['update_pwd'])){ ?>	
			<div class="jumbotron">
					<hr class="my-4">
					<p>If you want to update your profile.</p>
					<p class="lead">
					<a class="btn btn-primary btn-lg" href="Update_profile.php" role="button">Update Profile</a>
					</p>
			</div>
			<?php } else{unset($_SESSION['update_pwd']);} ?>	
			
		</div>
	</div>
</div>
	<div class="footer">
  <p>@Hostel_management_Team</p>
</div>
 </body>
</html>