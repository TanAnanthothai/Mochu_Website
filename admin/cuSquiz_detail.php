<?php include 'includes/db.php'; 


/////DELETE Rows /////
if(isset($_GET['del_id'])){
	$del_sql = "DELETE FROM Choices WHERE ch_ID = '$_GET[del_id]' ";
	$run_sql = mysqli_query($conn,$del_sql);
}


?>

<html>
<head>
	<title> Retreiving Data from Database </title>
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
	           <li><a href="users.php">Users</a></li>
	          <li><a href="audioGuide.php">Audio Guide</a></li>
	          <li class="active"><a href="cuSquiz.php">CU Squiz</a></li>
	          <li><a href="events.php">Events</a></li>
	          <li><a href="logout.php">Logout</a></li>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	  </nav>
	
	<div class="container" style="margin-top:100px">

	
				<div class="jumbotron">
					<?php
						$sql = "SELECT * FROM Questions WHERE Questions.q_ID='$_GET[detail_id]'";
						$run_sql = mysqli_query($conn,$sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<p> 
									<b>Question:</b> '.$rows['q_content'].'<br>
								</p>
								';
							}
					?>
					
					
				</div>

				<div class="col-md-8 col-md-offset-2">
					<table class="table table-striped table-hover">
						<thead> 
							<th>ID</th>
							<th>Choice</th>
							<th>Score</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Choices WHERE Choices.q_ID='$_GET[detail_id]'";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['ch_ID'].'</td>
									<td>'.$rows['ch_content'].'</td>
									<td>'.$rows['is_key'].'</td>
									<td><a class="btn btn-warning" href="newAdd_cuSquiz_choices.php?edit_id='.$rows['ch_ID'].'">Edit</a>
									<td><a class="btn btn-danger" href="cuSquiz_detail.php?del_id='.$rows['ch_ID'].'">Delete</a></td>
								</tr>
								';
							} ?>
			 
						</tbody>
					</table>
					<a class="btn btn-info" href="newAdd_cuSquiz_choices.php">Add New Choice</a>
				</div>
				
	
		


	</div>

</body>
</html>