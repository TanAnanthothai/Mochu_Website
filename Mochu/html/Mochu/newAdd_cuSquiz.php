<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Questions WHERE q_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);
		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$q_content = $rows['q_content'];
			$q_img = $rows['q_img'];
		} 
	}else{
			$q_content = '';
			$q_img = '';
	}
	if(isset($_POST['submit_form'])){
		$q_content = strip_tags($_POST['q_content']);
		$q_img = strip_tags($_POST['q_img']);
	
		$ins_sql = "INSERT INTO Questions (q_content, q_img) VALUES ('$q_content', '$q_img')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		echo "Add the data to database successfully.";
	}else{
		//echo "this doesnt work";
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
			<form class="form-horizontal" action="newAdd_cuSquiz.php" method="post" role="form">
				<div class="form-group">
					<label for="q_content" class="control-label col-sm-2">Questions*</label>
					<div class="col-sm-5">
						<input type="text" id="q_content" class="form-control" value="<?php echo $q_content; ?>" placeholder="q_content Name" name="q_content" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="q_img" class="control-label col-sm-2">Question Img*</label>
					<div class="col-sm-5">
						<input type="text" id="q_img" class="form-control" value="<?php echo $q_img; ?>" placeholder="q_img" name="q_img" required>
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