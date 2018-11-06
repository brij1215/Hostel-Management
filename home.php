<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mnnit@hostle_management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap_css.css">
  <link rel="stylesheet" href="mystyle.css">
  <script src="jquery.js"></script>
  <script src="jquery_log.js"></script>
  <script src="popper.js"></script>
  <script src="bootstrap_js.js"></script>
</head>
<body style="">

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
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="logout">LogOut</button></form>';
		}	
		else
			echo'<form class="form-inline my-2 my-lg-0"action="welcome.php" method="post">
			<input class="form-control mr-sm-2" type="text" name="id" placeholder="Registration No.">
			<input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">LogIn</button>
				</form>';
	?>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="row">
		<div class="col-sm-4" style="background-color:lavender;">
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
		<div class="col-sm-8" style="background-color:lavenderblush;">
			<p>Motilal Nehru National Institute of Technology Allahabad, Allahabad (MNNIT) is an Institute with total commitment to quality and excellence in academic pursuits. It was established as one of the seventeen Regional Engineering Colleges of India in the year 1961 as a joint enterprise of Government of India and Government of Uttar Pradesh, and was an associated college of University of Allahabad, which is the third oldest university in India.
			For a short duration of two years (2000-2002), the Institute was affiliated to U.P. Technical University. With over 45 years of experience and achievements in the field of technical education, having traversed a long way, on June 26, 2002 MNREC was transformed into National Institute of Technology and Deemed University fully funded by Government of India. With the enactment of National Institutes of Technology Act-2007(29 to 2007), the Institute has been granted the status of institution of national importance w.e.f. 15.08.2007.
			The Institute had begun with offering Bachelor Degree Programmes in Civil, Electrical and Mechanical Engineering. It was the first in the country to start an undergraduate programme in Computer Science & Engineering in 1976-77. Subsequently, in the year 1982-83 undergraduate programmes in Electronics Engineering and Production & Industrial Engineering were started.The first Master’s Programme of the Institute was introduced by the Mechanical Engineering Department in the year 1966. In all other Engineering Departments, Master's Programmes were introduced in the 1970-71. To add a new dimension to itself the Institute established School of Management studies in 1996, which offers a two year / four semester post graduate degree programme in Management (MBA).
			The Institute now offers nine  B.Tech., nineteen M.Tech. Degree Programmes (including part-time), MCA, MBA, M.Sc. (Mathematics and Scientific Computing) and Master of Social work (M.S.W.) programmes and also registers candidates for the Ph.D. degree. The Institute has been recognized by the Government of India as one of the centres for the Quality Improvement Programme for M.Tech. and Ph.D.The Institute has a very progressive policy towards extending all possible facilities to its faculty members to acquire higher degrees and receive advanced training. As a result, majority of the faculty members possess Ph.D. degrees. The entire campus is networked with 94 Mbps lease line.
			In the year 1972, the Institute initiated a self employment project and established an industrial estate with 68 sheds with the objective of encouraging entrepreneurs and creating additional employment avenues.The Institute was selected as a lead institution in the Design theme under Indo-UK REC Project (1994-99). Under this scheme a Design Centre was established.The Institute has been selected as a Lead Institution under World Bank funded Government of India Project on Technical Education Quality Improvement Programme (TEQIP) (2002-2007). Two state level institutions are networked with MNNIT under the project..</p>
			<p>
		</div>
	</div>
</div>
<div class="footer">
  <p>@Hostel_management_Team</p>
</div>
</body>
</html>