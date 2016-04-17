<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Events WHERE event_ID='$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);
		while ($rows = mysqli_fetch_assoc($run_sql)) {

			$event_ID=$rows['event_ID'];
			$start_time=$rows['start_time'];
			$Edate=$rows['Edate'];
			$end_time=$rows['end_time'];
			$contact=$rows['contact'];
			$name=$rows['name'];
			$description=$rows['description'];
			$organizer=$rows['organizer'];
			$picture=$rows['picture'];
			$type=$rows['type'];
			$loc_ID=$rows['loc_ID'];

		} 
	}else{
			$event_ID='';
			$start_time='';
			$Edate='';
			$end_time='';
			$contact='';
			$name='';
			$description='';
			$organizer='';
			$picture='';
			$type='';
			$loc_ID='';
	}
?>


<html>
	<head>
		<title>New Form</title>
		<script src="js/jquery.js"> </script>
		<script src="bootstrap/js/bootstrap.js"> </script>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<style>
			.my-fixed{
				resize: none;
			}
		</style>
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
			<h1>Edit Event</h1>
			<form class="form-horizontal" action="events.php" method="post" role="form">

				<div class="form-group">
					<label for="name" class="control-label col-sm-2" style="margin-top:20px">Event Name*</label>
					<div class="col-sm-5">
						<input type="text" id="name" class="form-control" style="margin-top:20px" value="<?php echo $name; ?>" placeholder="Enter event name" name="name" required>
 					</div>
				</div>
				
				<div class="form-group">
					<label for="start_time" class="control-label col-sm-2">Start Time*</label>
					<div class="col-sm-5">
						<input type="text" id="start_time" class="form-control" value="<?php echo $start_time; ?>" placeholder="XX:XX:XX" name="start_time" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="end_time" class="control-label col-sm-2">End Time*</label>
					<div class="col-sm-5">
						<input type="text" id="end_time" class="form-control" value="<?php echo $end_time; ?>" placeholder="XX:XX:XX" name="end_time" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="Edate" class="control-label col-sm-2">Date*</label>
					<div class="col-sm-5">
						<input type="text" id="Edate" class="form-control" value="<?php echo $Edate; ?>" placeholder="YYYY-MM-DD" name="Edate" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="contact" class="control-label col-sm-2">Contact*</label>
					<div class="col-sm-5">
						<input type="text" id="contact" class="form-control" value="<?php echo $contact; ?>" placeholder="08XXXXXXXX" name="contact" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="organizer" class="control-label col-sm-2">Organizer*</label>
					<div class="col-sm-5">
						<input type="text" id="organizer" class="form-control" value="<?php echo $organizer; ?>" placeholder="Enter organizer" name="organizer" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="picture" class="control-label col-sm-2">Picture*</label>
					<div class="col-sm-5">
						<input type="text" id="picture" class="form-control" value="<?php echo $picture; ?>" placeholder="Update button" name="picture" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="type" class="control-label col-sm-2">Type*</label>
					<div class="col-sm-5">
						<input type="text" id="type" class="form-control" value="<?php echo $type; ?>" placeholder="Update choices" name="type" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="description" class="control-label col-sm-2">Description*</label>
					<div class="col-sm-5">
						<input type="text" id="description" class="form-control" value="<?php echo $description; ?>" placeholder="Enter event description" name="description" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="loc_ID" class="control-label col-sm-2">Location ID*</label>
					<div class="col-sm-5">
						<input type="text" id="loc_ID" class="form-control" value="<?php echo $loc_ID; ?>" placeholder="Update location choices" name="loc_ID" required>
 					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="edit_form" value="Submit">
						<input name="event_ID" type="hidden" id="event_ID" value="<?=$_GET['edit_id']?>">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>