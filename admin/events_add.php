<!DOCTYPE html>
<?php
	$event_ID='';
	$name='';
	$start_time='';
	$Edate='';
	$end_time='';
	$contact='';
	$organizer='';
	$picture='';
	$type='';
	$description='';
	$loc_ID='';
?>


<html>
	<head>
		<title>Add New Event</title>
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
			<h1>Add New Event</h1>
			<form class="form-horizontal" action="events.php" method="post" role="form">
				
				<div class="form-group">
					<label for="name" class="control-label col-sm-2" style="margin-top:20px">Event Name*</label>
					<div class="col-sm-5">
						<input type="text" id="name" class="form-control" value="<?php echo $name; ?>" style="margin-top:20px" placeholder="Enter event name" name="name" required>
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
						<input type="text" id="loc_ID" class="form-control" value="<?php echo $loc_ID; ?>" placeholder="Update" name="loc_ID" required>
 					</div>
				</div>
			
				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="submit_form" value="Submit">

					</div>
				</div>
			</form>
		</div>
	</body>
</html>