<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Users u, Managers m WHERE u.user_ID = m.user_ID AND u.user_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);

		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$user_ID = $rows['user_ID'];
			$Fname = $rows['Fname'];
			$email = $rows['email'];
			$password = $rows['password'];
			$Lname = $rows['Lname'];
			$gender = $rows['gender'];
			$contact = $rows['contact'];
			$Bday = $rows['Bday'];
			$last_login = $rows['last_login'];

			$role = $rows['role'];
			$access_lvl = $rows['access_lvl'];
		} 

	}else{
			$user_ID = '';
			$Fname = '';
			$email = '';
			$password = '';
			$Lname = '';
			$gender = '';
			$contact = '';
			$Bday = '';
			$last_login = '';

			$role = '';
			$access_lvl = '';
	}
?>


<html>
	<head>
	<title> Edit Manager </title>
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
              <li  class="active"><a href="managers.php">Managers</a></li>
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
              <li><a href="feedbacks.php">Feedbacks</a></li>
              <li><a href="logout.php">Logout</a></li>
		        </ul>
		      </div><!--/.nav-collapse -->
		    </div>
		 </nav>

		<div class="container" style="margin-top:100px">
			<h1>Edit Manager</h1>
			<form class="form-horizontal" action="managers.php" method="post" role="form">

				<div class="form-group">
					<label for="Fname" class="control-label col-sm-2" style="margin-top:20px">First Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Fname" class="form-control" style="margin-top:20px" value="<?php echo $Fname; ?>" placeholder="Enter your first name" name="Fname" required>
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
					<label for="password" class="control-label col-sm-2">E-mail*</label>
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
					<label for="role" class="control-label col-sm-2">Role*</label>
					<div class="col-sm-5">
						<input type="text" id="role" class="form-control" value="<?php echo $role; ?>" placeholder="Enter role" name="role" required>
 					</div>
				</div>

				<div class="form-group">
					<label for="access_lvl" class="control-label col-sm-2">Access Level*</label>
					<div class="col-sm-5">
						<input type="text" id="access_lvl" class="form-control" value="<?php echo $access_lvl; ?>" placeholder="Enter access level" name="access_lvl" required>
 					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="edit_form" value="Submit">
						<input name="user_ID" type="hidden" id="user_ID" value="<?=$_GET['edit_id']?>" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>