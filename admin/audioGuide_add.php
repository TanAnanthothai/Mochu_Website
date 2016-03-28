<!DOCTYPE html>
<?php
	$au_name = '';
	$au_file = '';
	$fl_IMG = '';
	
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
			<form class="form-horizontal" action="audioGuide.php" method="post" role="form">
				<div class="form-group">
					<label for="name" class="control-label col-sm-2">Audio Guide Name*</label>
					<div class="col-sm-5">
						<input type="text" id="au_name" class="form-control" value="<?php echo $au_name; ?>" placeholder="Full Name" name="au_name" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="au_file" class="control-label col-sm-2">Audio Guide File*</label>
					<div class="col-sm-5">
						<input type="text" id="au_file" class="form-control" value="<?php echo $au_file; ?>" placeholder="au_file" name="au_file" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="fl_IMG" class="control-label col-sm-2">Audio Guide Image*</label>
					<div class="col-sm-5">
						<input type="text" id="fl_IMG" class="form-control" value="<?php echo $fl_IMG; ?>" placeholder="Add your subject" name="fl_IMG" required>
 					</div>
				</div>
	
			
				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-default btn-block" name="submit_form" value="Submit form">

					</div>
				</div>
			</form>
		</div>
	</body>
</html>