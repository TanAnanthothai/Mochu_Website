<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Users WHERE user_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);

		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$user_ID = $rows['user_ID'];
			$Fname = $rows['Fname'];
			$email = $rows['email'];
			$Lname = $rows['Lname'];
			$gender = $rows['gender'];
			$contact = $rows['contact'];
			$Bday = $rows['Bday'];
			$last_login = $rows['last_login'];
		} 

	}else{
			$user_ID = '';
			$Fname = '';
			$email = '';
			$Lname = '';
			$gender = '';
			$contact = '';
			$Bday = '';
			$last_login = '';
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
		<div class="container">
			<h1>Submit Form</h1>
			<form class="form-horizontal" action="users.php" method="post" role="form">

				<div class="form-group">
					<label for="Fname" class="control-label col-sm-2">First Name*</label>
					<div class="col-sm-5">
						<input type="text" id="Fname" class="form-control" value="<?php echo $Fname; ?>" placeholder="Enter your first name" name="Fname" required>
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
						<input type="submit" class="btn btn-default btn-block" name="edit_form" value="Submit form">
						<input name="user_ID" type="hidden" id="user_ID" value="<?=$_GET['edit_id']?>" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>