<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM AudioGuide WHERE au_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);

		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$au_ID = $rows['au_ID'];
			$au_name = $rows['au_name'];
			$au_file = $rows['au_file'];
			$fl_IMG =	$rows['fl_IMG'];
		} 
	}else{
			$au_ID = '';
			$au_name = '';
			$au_file = '';
			$fl_IMG = '';
	}
?>


<html>
	<head>
		<title>Edit Audio Guide</title>
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
          <li class="dropdown active">
          	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal Guide<span class="caret"></span></a>
          		<ul class="dropdown-menu">
		            <li class="active"><a href="audioGuide.php">Audio Guide</a></li>
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
			<h1>Edit Audio Guide</h1>
			<form class="form-horizontal" action="audioGuide.php" method="post" role="form">
				<div class="form-group">
					<label for="name" class="control-label col-sm-2" style="margin-top:20px">Audio Guide Name*</label>
					<div class="col-sm-5">
						<input type="text" id="au_name" class="form-control" style="margin-top:20px" value="<?php echo $au_name; ?>" placeholder="Enter audio guide name" name="au_name" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="au_file" class="control-label col-sm-2">Audio Guide File*</label>
					<div class="col-sm-5">
						<input type="text" id="au_file" class="form-control" value="<?php echo $au_file; ?>" placeholder="Update button" name="au_file" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="fl_IMG" class="control-label col-sm-2">Audio Guide Image*</label>
					<div class="col-sm-5">
						<input type="text" id="fl_IMG" class="form-control" value="<?php echo $fl_IMG; ?>" placeholder="Update button" name="fl_IMG" required>
 					</div>
				</div>		
				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="edit_form" value="Submit">
						<input name="au_ID" type="hidden" id="au_ID" value="<?=$_GET['edit_id']?>" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>