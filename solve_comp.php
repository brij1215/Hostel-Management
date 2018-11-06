<?php
session_start();
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
				<a href="authenticate.php" class="list-group-item list-group-item-action ">Create Notice</a>
				<a href="solve_comp.php" class="list-group-item list-group-item-action active">Solve Complaints</a>
				<a href="changestatus.php" class="list-group-item list-group-item-action ">Update Fee Status</a>
			</div>
		</div>
		<div class="col-sm-9" >
				
			<div class="jumbotron">
				<?php
				include('db_inc.php');
				$sql="SELECT * FROM complaint where CompStatus=Process";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				
				if($resultCheck<1)
				{
					echo'</br></br></br><strong>No new Complaints Available Here</strong>';
				}
				else
				{
					echo'<table class="table table-hover">
					<thead>
						<tr>
							<th>CompID</th>
							<th >Complaint</th>
							<th>Status</th>
							<th>Date</th>
						 </tr>
					</thead>
					<tbody>';

						while($row=mysqli_fetch_assoc($result))
						{	
							print " <tr><td>";
							echo $row['CompId'];
							print "</td> <td>";
							echo $row['Complaint'];
							print "</td > <td>";
							echo $row['CompStatus'];
							print "</td > <td>";
							echo $row['CompDate']; 
							print "</td> </tr>";
							
						}
						echo'</tbody></table>';
				}
			?>
				
			</div>
			
		</div>
	</div>
</div>
	<div class="footer">
  <p>@Hostel_management_Team</p>
</div>
 </body>
</html>