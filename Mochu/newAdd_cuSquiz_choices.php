<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Choices WHERE ch_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);
		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$ch_ID = $row['ch_ID'];
			$q_ID = $row['q_ID'];
			$ch_content = $rows['ch_content'];
			$is_key = $rows['is_key'];
		} 
	}else{
			$ch_ID = '';
			$q_ID = '';
			$ch_content = '';
			$is_key = '';
	}
	if(isset($_POST['submit_form'])){
		$ch_ID = strip_tags($_POST['ch_ID']);
		$q_ID = strip_tags($_POST['q_ID']);
		$ch_content = strip_tags($_POST['ch_content']);
		$is_key = strip_tags($_POST['is_key']);
	
		$ins_sql = "INSERT INTO Choices (ch_ID, q_ID, ch_content, is_key) VALUES ('$ch_ID','$q_ID','$ch_content', '$is_key')" ;
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
			<form class="form-horizontal" action="newAdd_cuSquiz_choices.php" method="post" role="form">
			<div class="form-group">
					<label for="ch_ID" class="control-label col-sm-2">ch_ID*</label>
					<div class="col-sm-5">
						<input type="text" id="ch_ID" class="form-control" value="<?php echo $ch_ID; ?>" placeholder="ch_ID" name="ch_ID" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="q_ID" class="control-label col-sm-2">q_ID*</label>
					<div class="col-sm-5">
						<input type="text" id="q_ID" class="form-control" value="<?php echo $q_ID; ?>" placeholder="q_ID" name="q_ID" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="ch_content" class="control-label col-sm-2">ch_content*</label>
					<div class="col-sm-5">
						<input type="text" id="ch_content" class="form-control" value="<?php echo $ch_content; ?>" placeholder="ch_content" name="ch_content" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="is_key" class="control-label col-sm-2">is_key*</label>
					<div class="col-sm-5">
						<input type="text" id="is_key" class="form-control" value="<?php echo $is_key; ?>" placeholder="is_key" name="is_key" required>
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