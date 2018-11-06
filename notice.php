<?php
	session_start();
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
				<a href="welcome.php" class="list-group-item list-group-item-action ">Profile</a>
				<a href="notice.php" class="list-group-item list-group-item-action active">Notice</a>
				<a href="feestatus.php" class="list-group-item list-group-item-action disabled">Fee Status</a>
				<a href="complaint.php" class="list-group-item list-group-item-action disabled">Complaint</a>
			</div>
		</div>
		<div class="col-sm-9" >
			<div class="jumbotron">
					<div class="alert alert-success"style="text-align:center">
					<strong>NOTICE</strong> .
			</div>
			<?php
				include('db_inc.php');
				$sql="SELECT Notice,NoticeDate, DATE_FORMAT(`NoticeDate`, '%e %M, %Y') AS dateToPrint FROM notice ";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				
				if($resultCheck<1)
				{
					echo'<strong>No new notice are available here</strong>';
				}
				else
				{
					echo'<table class="table table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th scope="col">Notice</th>
						 </tr>
					</thead>
					<tbody>';
					$num=0;
						while($row=mysqli_fetch_assoc($result))
						{	
							print "<tr > <td>";
							echo $row['dateToPrint']; 
							print "</td> <td>";
							echo $row['Notice']; 
							print "</td> <td>";	
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