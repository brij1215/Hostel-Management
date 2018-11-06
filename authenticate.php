<?php
session_start();
?>
<?php
if(isset($_SESSION['admin']))
{
}	
else 
	{
		include('db_inc.php');
		$uid=mysqli_real_escape_string($conn,$_POST['username']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
				//Error handlors and check input are empty
		if(empty($uid) || empty($pwd))
		{
			$_SESSION['login_failure']="Please Enter valid Id and password which is Empty";
			header("location: ../hostelmng/admin.php?login=empty");
			exit();
		}
		else
		{
			$sql="SELECT * FROM admin where Id='$uid'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck<1)
			{
				$_SESSION['login_failure']="you have Entered wrong user Id";
				header("location: ../hostelmng/admin.php?login=ID_error");
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
						$_SESSION['admin']=$row['Id'];
						$_SESSION['Name']=$row['Name'];
						$_SESSION['Type']=$row['Type'];
						$_SESSION['Pwd']=$row['Pwd'];
						
					}
					else		
					{	
						$_SESSION['login_failure']="you have Entered wrong user Password";
						header("location: ../hostelmng/admin.php?login=PWD_error");
						exit();
					}
				}
			}				
		}
			
	}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Panel</title>
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
  <h1><strong>Hostel Management System Admin Panel</strong></h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Welcome Admin <?php echo $_SESSION['Name']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    
	<?php
		if(isset($_SESSION['admin']))
		{
			echo'<form class="form-inline my-2 my-lg-0"action="adminlogout.php" method="post">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="logout">LogOut</button>
				</form>';
		}
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
				<a href="authenticate.php" class="list-group-item list-group-item-action active">Create Notice</a>
				<a href="solve_comp.php" class="list-group-item list-group-item-action">Solve Complaints</a>
				<a href="changestatus.php" class="list-group-item list-group-item-action ">Update Fee Status</a>
			</div>
		</div>
		<div class="col-sm-9" >
				
			<div class="jumbotron">
				<?php if(!isset($_SESSION['create_notice'])){ ?>
				<form class="form loginform" method="POST" action="create_notice.php">
					<div class="login-panel panel panel-default">
						<div class="panel-heading"><strong>Create Notice:</strong></div></br></br>
						  <div class="form-group">
						    <label class="control-label">Select Hostel Name</label>
							<select class="custom-select"name="hostel_name">
								<option value="Swami Vivekananda Boys Hostel">Swami Vivekananda Boys Hostel</option>
								<option value="B.G. Tilak Hostel">B.G. Tilak Hostel</option>
								<option value="M.M. Malviya Hostel">M.M. Malviya Hostel</option>
								<option value="P.D. Tondon Hostel">P.D. Tondon Hostel</option>
								<option value="PG Hostel">PG Hostel</option>
								<option value="R.N. Tagore Hostel">R.N. Tagore Hostel</option>
								<option value="S.V. Patel Hostel">S.V. Patel Hostel</option>
								<option value="S.N. Girls Hostel">S.N. Girls Hostel</option>
								<option value="K.N. Girls Hostel">K.N. Girls Hostel</option>
								<option value="International House">International House</option>
							</select>
						  </div>
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label">Write Notice Here</label>
										<textarea class="form-control" id="notice" name="notice" rows="2"></textarea>
								</div>
								<button type="submit" class="btn btn-success" >Create Notice</button>
							</div>
						</div>
				</form>
				<?php } else if(isset($_SESSION['create_notice'])){  ?>
				<div class="alert alert-dismissible alert-secondary">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Attention!</strong> </br>
				<?php echo $_SESSION['create_notice'];unset($_SESSION['create_notice']);} ?>
				
				</div>
				
			</div>
			
		</div>
	</div>
</div>
	<div class="footer">
  <p>@Hostel_management_Team</p>
</div>
 </body>
</html>