<?php include 'includes/db.php'; 

if(isset($_SESSION['user_email'])){
  header("Location:myaccount.php");
  exit();
}


/////DELETE Rows /////
if(isset($_GET['del_id'])){
	$del_sql = "DELETE FROM Users WHERE id = '$_GET[del_id]' ";
	$run_sql = mysqli_query($conn,$del_sql);
}


?>
<html>
<head>
	<title> Events </title>
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
           <li class="active"><a href="users.php">Users</a></li>
          <li><a href="audioGuide.php">Audio Guide</a></li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


	<div class="container-fluid" style="margin-top:100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<h2>Users (from Database)</h2><br>
				</div>
				<div class="col-md-8 col-md-offset-2">

					<table class="table table-striped">
						<thead> 
							<th>user_ID</th>
							<th>Fname</th>
							<th>Lname</th>
							<th>email</th>
							<th>gender</th>
							<th>contact</th>
							<th>Bday</th>
							<th>last_login</th>
						
						
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Users";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['user_ID'].'</td>
									<td>'.$rows['Fname'].'</td>
									<td>'.$rows['email'].'</td>
									<td>'.$rows['Lname'].'</td>
									<td>'.$rows['gender'].'</td>
									<td>'.$rows['contact'].'</td>
									<td>'.$rows['Bday'].'</td>
									<td>'.$rows['last_login'].'</td>
								</tr>
								';
							}
							?>

						</tbody>
					</table>
					<!-- <td><a class="btn btn-info" href="newAdd_audioGuide.php">Add new Events</a></td> -->	
				</div>
			</div>
		</div>
	</body>
	</html>