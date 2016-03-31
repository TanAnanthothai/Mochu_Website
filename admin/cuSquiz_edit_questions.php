<!DOCTYPE html>
<?php
	include 'includes/db.php';

	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Questions WHERE q_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);
		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$q_ID=$rows['q_ID'];
			$q_content = $rows['q_content'];
			$q_img = $rows['q_img'];
		} 
	}else{
			$q_ID='';
			$q_content = '';
			$q_img = '';
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
		           <li><a href="users.php">Users</a></li>
		          <li><a href="audioGuide.php">Audio Guide</a></li>
		          <li class="active"><a href="cuSquiz.php">CU Squiz</a></li>
		          <li><a href="events.php">Events</a></li>
		          <li><a href="logout.php">Logout</a></li>
		        </ul>
		      </div><!--/.nav-collapse -->
		    </div>
		  </nav>

		<div class="container" style="margin-top:100px">
			<h1>Edit Question</h1>
			<form class="form-horizontal" action="cuSquiz.php" method="post" role="form">
				<div class="form-group">
					<label for="q_content" class="control-label col-sm-2" style="margin-top:20px">Questions*</label>
					<div class="col-sm-5">
						<input type="text" id="q_content" class="form-control" style="margin-top:20px" value="<?php echo $q_content; ?>" placeholder="Edit Question" name="q_content" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="q_img" class="control-label col-sm-2">Question Image*</label>
					<div class="col-sm-5">
						<input type="text" id="q_img" class="form-control" value="<?php echo $q_img; ?>" placeholder="q_img" name="Update" required>
 					</div>
				</div>
	
				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="edit_form" value="Submit">
						<input name="q_ID" type="hidden" id="q_ID" value="<?=$_GET['edit_id']?>" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>