<!DOCTYPE html>
<?php
	include 'includes/db.php';
	if(isset($_GET['q_id'])) {
		$sql = "SELECT * FROM Questions WHERE Questions.q_ID = '$_GET[q_id]'";
		$run_sql = mysqli_query($conn,$sql);

		while ($rows = mysqli_fetch_assoc($run_sql)) {
			$q_ID = $rows['q_ID'];
			$ch_ID = '';
			$ch_content = '';
			$is_key = '';
		} 

	}else{
		$q_ID = '';
		$ch_ID = '';
		$ch_content = '';
		$is_key = '';
	}
?>


<html>
	<head>
		<title>Add New Choice</title>
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
			<div class="jumbotron">
					<?php
						$sql = "SELECT * FROM Questions WHERE Questions.q_ID='$_GET[q_id]'";
						$run_sql = mysqli_query($conn,$sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<p> 
									<b>Question:</b> '.$rows['q_content'].'<br>
								</p>
								';
							}
					?>			
			</div>


			<h1>Add New Choice</h1>
			<form class="form-horizontal" action="cuSquiz_detail.php?detail_id=<?php echo $q_ID; ?>" method="post" role="form">
			<div class="form-group">
					<label for="q_ID" class="control-label col-sm-2" style="margin-top:20px">Question ID*</label>
					<div class="col-sm-5">
						<input type="text" id="q_ID" class="form-control" style="margin-top:20px" value="<?php echo $q_ID; ?>" placeholder="Enter question number" name="q_ID" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="ch_ID" class="control-label col-sm-2" >Choice ID*</label>
					<div class="col-sm-5">
						<input type="text" id="ch_ID" class="form-control" value="<?php echo $ch_ID; ?>" placeholder="Enter choice number" name="ch_ID" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="ch_content" class="control-label col-sm-2">Choice Content*</label>
					<div class="col-sm-5">
						<input type="text" id="ch_content" class="form-control" value="<?php echo $ch_content; ?>" placeholder="Enter choice" name="ch_content" required>
 					</div>
				</div>
				<div class="form-group">
					<label for="is_key" class="control-label col-sm-2">Score*</label>
					<div class="col-sm-5">
						<input type="text" id="is_key" class="form-control" value="<?php echo $is_key; ?>" placeholder="0/1" name="is_key" required>
 					</div>
				</div>
	
				<div class="form-group">
					<label class="control-label col-sm-2"></label>	
					<div class="col-sm-5">
						<input type="submit" class="btn btn-info btn-block" name="submit_form" value="Submit" >
					</div>
				</div>
			</form>
		</div>
	</body>
</html>