<?php include 'includes/db.php'; 

	if(isset($_SESSION['user_email'])){
	  header("Location:myaccount.php");
	  exit();
	}

?>

<html>
<head>
	<title> View Feedbacks </title>
	<script src="js/jquery.js"> </script>
	<script src="bootstrap/js/bootstrap.js"> </script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">MOCHU</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="myaccount.php">My Account</a></li>
          <li><a href="managers.php">Managers</a></li>
          <li><a href="members.php">Members</a></li>
          <li class="dropdown">
          	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal Guide<span class="caret"></span></a>
          		<ul class="dropdown-menu">
		            <li><a href="audioGuide.php">Audio Guide</a></li>
          			<li><a href="contents.php">Contents</a></li>
		         </ul>
		   </li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="locations.php">Locations</a></li>
          <li class="active"><a href="feedbacks.php">Feedbacks</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

	<div class="container-fluid" style="margin-top:100px">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Feedbacks (from Database)</h2><br>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-striped table-hover">
				<thead> 
					<th>ID</th>
					<th>Rating</th>
					<th>Comment</th>
					<th>Given Date</th>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT * FROM Feedbacks";
					$run_sql = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run_sql)){
						echo '
						<tr> 
							<td>'.$rows['fdb_ID'].'</td>
							<td>'.$rows['rating'].'</td>
							<td>'.$rows['msg'].'</td>
							<td>'.$rows['Fdate'].'</td>
						</tr>
						';
					}
					?>
				</tbody>
				
			</table>
			</div>
		</div>
	</div>
</body>
</html>