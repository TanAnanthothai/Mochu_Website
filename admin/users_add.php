<!DOCTYPE html>
<?php
	$user_ID = '';
	$Fname = '';
	$email = '';
	$Lname = '';
	$gender = '';
	$contact = '';
	$Bday = '';
	$last_login = '';
?>


<html>

	<head>
	<title> Add New User </title>
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

		<div class="container" style="margin-top:100px">
			<h1>Add New User</h1>
			<form class="form-horizontal" action="users.php" method="post" role="form">
				
				<div class="form-group">
					<label for="Fname" class="control-label col-sm-2" style="margin-top:20px">First Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Fname" class="form-control" style="margin-top:20px" value="<?php echo $Fname; ?>" placeholder="Enter your first name" name="Fname" required>
 					</div>
				</div>
				
				<div class="form-group">
					<label for="Lname" class="control-label col-sm-2">Last Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Lname" class="form-control" value="<?php echo $Lname; ?>" placeholder="Enter your last name" name="Lname" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-sm-2">E-mail*</label>
					<div class="col-sm-5">
						<input type="text" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email address" name="email" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="gender" class="control-label col-sm-2">Gender*</label>
					<div class="col-sm-5">
						<input type="text" id="gender" class="form-control" value="<?php echo $gender; ?>" placeholder="Male/Female" name="gender" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="contact" class="control-label col-sm-2">Contact*</label>
					<div class="col-sm-5">
						<input type="text" id="contact" class="form-control" value="<?php echo $contact; ?>" placeholder="08XXXXXXXX" name="contact" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="Bday" class="control-label col-sm-2">Birthday*</label>
					<div class="col-sm-5">
						<input type="text" id="Bday" class="form-control" value="<?php echo $Bday; ?>" placeholder="YYYY-MM-DD" name="Bday" required>
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