<?php include 'includes/db.php'; ?>

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
		          <li class="active"><a href="events.php">Events</a></li>
		          <li><a href="locations.php">Locations</a></li>
		          <li><a href="feedbacks.php">Feedbacks</a></li>
		          <li><a href="logout.php">Logout</a></li>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	  </nav>
	
	<div class="container" style="margin-top:100px">

	
				<div class="jumbotron">
					<?php
						$sql = "SELECT * FROM Events WHERE event_ID='$_GET[detail_id]'";
						$run_sql = mysqli_query($conn,$sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<p> 
									<b>Event ID:</b> '.$rows['event_ID'].'<br>
									<b>Event Name:</b> '.$rows['name'].'<br>
								</p>

								';
							}
					?>
					
					
				</div>

				<div class="col-md-14">
					<table class="table table-striped table-hover">
						<thead> 
						<tr>
							<th>Start Time</th>
							<th>Date</th>
							<th>End Time</th>
							<th>Contact</th>
							<th>Organizer</th>
							<th>Picture</th>
							<th>Type</th>
							<th>Description</th>
						</tr>
						<tr>
							<th>Location ID</th>
							<th>Location Name</th>
							<th>Total Seats</th>
							<th>Room</th>
							<th>Floor</th>
							<th>Building</th>
						</tr>
							
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Events e, Locations l WHERE e.loc_ID=l.loc_ID AND event_ID='$_GET[detail_id]'";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['start_time'].'</td>
									<td>'.$rows['Edate'].'</td>
									<td>'.$rows['end_time'].'</td>
									<td>'.$rows['contact'].'</td>
									<td>'.$rows['organizer'].'</td>
									<td>'.$rows['picture'].'</td>
									<td>'.$rows['type'].'</td>
									<td>'.$rows['description'].'</td>
								</tr>
								<tr>
									<td>'.$rows['loc_ID'].'</td>
									<td>'.$rows['loc_name'].'</td>
									<td>'.$rows['total_seats'].'</td>
									<td>'.$rows['room_no'].'</td>
									<td>'.$rows['fl_no'].'</td>
									<td>'.$rows['bldg'].'</td>
								<tr>
								';
							} ?>
			 
			 				
						</tbody>
					</table>
				</div>

				<div>
						<?php 
							$sql = "SELECT event_ID FROM Events WHERE event_ID='$_GET[detail_id]'";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								
									<a href="events_detail_edit.php?edit_id='.$rows['event_ID'].'" class="btn btn-warning">Edit Events Details</a>
								
								';
							} ?>
				</div>
				
	
		


	</div>

</body>
</html>