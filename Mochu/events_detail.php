<?php include 'includes/db.php'; ?>

<html>
<head>
	<title> Retreiving Data from Database </title>
	<script src="js/jquery.js"> </script>
	<script src="bootstrap/js/bootstrap.js"> </script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
	
	<div class="container">

	
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

				<div class="col-md-16">
					<table class="table table-striped table-hover">
						<thead> 
						<tr>
							<th>event_ID</th>
							<th>name</th>
							<th>start_time</th>
							<th>Edate</th>
							<th>end_time</th>
							<th>contact</th>
							<th>organizer</th>
							<th>picture</th>
							<th>type</th>
							<th>description</th>
						</tr>
						<tr>
							<th>loc_ID</th>
							<th>loc_name</th>
							<th>total_seats</th>
							<th>room_no</th>
							<th>fl_no</th>
							<th>bldg</th>
						</tr>
							
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Events e, Locations l WHERE e.loc_ID=l.loc_ID AND event_ID='$_GET[detail_id]'";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['event_ID'].'</td>
									<td>'.$rows['name'].'</td>
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
								</tr>
								';
							} ?>
			 
						</tbody>
					</table>
					<a href="events_detail_edit.php?edit_id='.$rows['event_ID'].'" class="btn btn-warning">Edit Events Details</a>
				</div>
				
	
		


	</div>

</body>
</html>