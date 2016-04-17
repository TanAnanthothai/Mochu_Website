<!DOCTYPE html>
<?php
	include 'includes/db.php';
	$q_ID='';
	$q_content = '';
	$q_img = '';

	if(isset($_POST['submit_form'])){
		$q_content = strip_tags($_POST['q_content']);
		$q_img = strip_tags($_POST['q_img']);
		$ins_sql = "INSERT INTO Questions (q_content, q_img) VALUES ('$q_content', '$q_img')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		echo "Add the data to database successfully.";
		header("Location:cuSquiz.php");
	}else{
		echo "this doesnt work";
	}


?>


<html>
	<head>
	<title> Add New Question </title>
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
		          <li><a href="members.php">Members</a></li>
		          <li class="dropdown">
		          	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal Guide<span class="caret"></span></a>
		          		<ul class="dropdown-menu">
				            <li><a href="audioGuide.php">Audio Guide</a></li>
		          			<li><a href="contents.php">Contents</a></li>
				         </ul>
				   </li>
		          <li class="active"><a href="cuSquiz.php">CU Squiz</a></li>
		          <li><a href="events.php">Events</a></li>
		          <li><a href="locations.php">Locations</a></li>
		          <li><a href="feedbacks.php">Feedbacks</a></li>
		          <li><a href="logout.php">Logout</a></li>
		        </ul>
		      </div><!--/.nav-collapse -->
		    </div>
		  </nav>

		<div class="container" style="margin-top:100px">
			<h1>Add New Question</h1>
			<form class="form-horizontal" action="cuSquiz.php" method="post" role="form">
				<div class="form-group">
					<label for="q_content" class="control-label col-sm-2" style="margin-top:20px">Question*</label>
					<div class="col-sm-5">
						<input type="text" id="q_content" class="form-control" style="margin-top:20px" value="<?php echo $q_content; ?>" placeholder="Enter new question" name="q_content" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="q_img" class="control-label col-sm-2">Question Image*</label>
					<div class="col-sm-5">
						<input type="text" id="q_img" class="form-control" value="<?php echo $q_img; ?>" placeholder="Update button" name="q_img" required>
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