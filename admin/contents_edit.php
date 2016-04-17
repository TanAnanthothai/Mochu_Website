<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['edit_id'])) {
		$edit_sql = "SELECT * FROM Contents WHERE content_ID = '$_GET[edit_id]'";
		$run_sql = mysqli_query($conn,$edit_sql);

		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$content_ID = $rows['content_ID'];
			$content_title = $rows['content_title'];
			$content_description = $rows['content_description'];
			$created_date =	$rows['created_date'];
		} 
	}else{
			$content_ID = '';
			$content_title = '';
			$content_description = '';
			$created_date = '';
	}
?>


<html>
	<head>
		<title>Edit Content</title>
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
		            <li><a href="audioGuide.php">Audio Guide</a></li>
          			<li class="active"><a href="contents.php">Contents</a></li>
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
			<h1>Edit Content</h1>
			<form class="form-horizontal" action="contents.php" method="post" role="form">
				<div class="form-group">
					<label for="name" class="control-label col-sm-2" style="margin-top:20px">Content Title*</label>
					<div class="col-sm-5">
						<input type="text" id="content_title" class="form-control" style="margin-top:20px" value="<?php echo $content_title; ?>" placeholder="Enter content title" name="content_title" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="content_description" class="control-label col-sm-2">Content Description*</label>
					<div class="col-sm-5">
						<input type="text" id="content_description" class="form-control" value="<?php echo $content_description; ?>" placeholder="Enter content description" name="content_description" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="created_date" class="control-label col-sm-2">Created Date*</label>
					<div class="col-sm-5">
						<input type="text" id="created_date" class="form-control" value="<?php echo $created_date; ?>" placeholder="YYYY-MM-DD" name="created_date" required>
 					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="edit_form" value="Submit">
						<input name="content_ID" type="hidden" id="content_ID" value="<?=$_GET['edit_id']?>" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>