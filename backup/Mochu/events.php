<?php include 'includes/db.php'; 

if(isset($_SESSION['user_email'])){
  header("Location:myaccount.php");
  exit();
}


/////DELETE Rows /////
if(isset($_GET['del_id'])){
	$del_sql = "DELETE FROM Events WHERE event_ID = '$_GET[del_id]' ";
	$run_sql = mysqli_query($conn,$del_sql);
}

/////Add Rows /////
	if(isset($_POST['submit_form'])){
		$name=strip_tags($_POST['name']);
		$start_time=strip_tags($_POST['start_time']);
		$Edate=strip_tags($_POST['Edate']);
		$end_time=strip_tags($_POST['end_time']);
		$contact=strip_tags($_POST['contact']);
		$organizer=strip_tags($_POST['organizer']);
		$picture=strip_tags($_POST['picture']);
		$type=strip_tags($_POST['type']);
		$description=strip_tags($_POST['description']);
		$loc_ID=strip_tags($_POST['loc_ID']);

		$ins_sql = "INSERT INTO Events (name, start_time, Edate, end_time, contact, organizer, picture, type, description, loc_ID) 
					VALUES ('$name', '$start_time', '$Edate', '$end_time', '$contact', '$organizer', '$picture', '$type', '$description', '$loc_ID',)" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:events.php");
	}else{
		echo "this doesn't work";
	}

/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$name=strip_tags($_POST['name']);
		$start_time=strip_tags($_POST['start_time']);
		$Edate=strip_tags($_POST['Edate']);
		$end_time=strip_tags($_POST['end_time']);
		$contact=strip_tags($_POST['contact']);
		$organizer=strip_tags($_POST['organizer']);
		$picture=strip_tags($_POST['picture']);
		$type=strip_tags($_POST['type']);
		$description=strip_tags($_POST['description']);
		$loc_ID=strip_tags($_POST['loc_ID']);
		//$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$ins_sql = "UPDATE Events SET name='$name', start_time='$start_time', Edate='$Edate', end_time='$end_time', contact='$contact', 
					organizer='$organizer', picture='$picture', type='$type', description='$description', loc_ID='$loc_ID' WHERE event_ID = '$event_ID' ";
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:events.php");
	}else{
		echo "this doesn't work";
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
           <li><a href="users.php">Users</a></li>
          <li><a href="audioGuide.php">Audio Guide</a></li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
          <li class="active"><a href="events.php">Events</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


	<div class="container-fluid" style="margin-top:100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<h2>Events (from Database)</h2><br>
				</div>
				<div class="col-md-8 col-md-offset-2">

					<table class="table table-striped">
						<thead> 
							<th>event_ID</th>
							<th>name</th>
							<th>start_time</th>
							<th>Edate</th>
							<th>end_time</th>
							<th>contact</th>
							<th>organizer</th>
							<th>more detail</th>
							<th>delete</th>
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Events";
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
									<td><a class="btn btn-info" href="events_detail.php?detail_id='.$rows['event_ID'].'">More Detail</a></td>
									<td><a class="btn btn-danger" href="events.php?del_id='.$rows['event_ID'].'">Delete</a></td>
								</tr>
								';
							}
							?>

						</tbody>
					</table>
					<td><a class="btn btn-info" href="events_add.php">Add New Event</a></td>	
				</div>
			</div>
		</div>
	</body>
	</html>