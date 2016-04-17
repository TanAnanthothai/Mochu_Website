<!DOCTYPE html>
<?php
	$user_ID = '';
	$Fname = '';
	$email = '';
	$password = '';
	$Lname = '';
	$gender = '';
	$contact = '';
	$Bday = '';
	$last_login = '';

	$occupation = '';
	$quiz_score = '';
	$fb_ID = '';
	$register_date = '';

?>


<html>

	<head>
	<title> Add New Member </title>
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
              <li class="active"><a href="members.php">Members</a></li>
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
              <li><a href="feedbacks.php">Feedbacks</a></li>
              <li><a href="logout.php">Logout</a></li>
		        </ul>
		      </div><!--/.nav-collapse -->
		    </div>
		 </nav>

		<div class="container" style="margin-top:100px">
			<h1>Add New Member</h1>
			<form class="form-horizontal" action="members.php" method="post" role="form">
				
				<div class="form-group">
					<label for="Fname" class="control-label col-sm-2" style="margin-top:20px">First Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Fname" class="form-control" style="margin-top:20px" value="<?php echo $Fname; ?>" placeholder="Enter first name" name="Fname" required>
 					</div>
				</div>
				
				<div class="form-group">
					<label for="Lname" class="control-label col-sm-2">Last Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Lname" class="form-control" value="<?php echo $Lname; ?>" placeholder="Enter last name" name="Lname" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-sm-2">E-mail*</label>
					<div class="col-sm-5">
						<input type="text" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter email address" name="email" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="password" class="control-label col-sm-2">Password*</label>
					<div class="col-sm-5">
						<input type="text" id="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter password" name="password" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="fb_ID" class="control-label col-sm-2">Facebook*</label>
					<div class="col-sm-5">
						<input type="text" id="fb_ID" class="form-control" value="<?php echo $fb_ID; ?>" placeholder="Enter facebook ID" name="fb_ID" required>
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
					<label for="occupation" class="control-label col-sm-2">Occupation*</label>
					<div class="col-sm-5">
						<input type="text" id="occupation" class="form-control" value="<?php echo $occupation; ?>" placeholder="Enter occupation" name="occupation" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="quiz_score" class="control-label col-sm-2">Quiz Score*</label>
					<div class="col-sm-5">
						<input type="text" id="quiz_score" class="form-control" value="<?php echo $quiz_score; ?>" placeholder="Enter quiz score" name="quiz_score" required>
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