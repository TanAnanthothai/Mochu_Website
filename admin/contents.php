<?php include 'includes/db.php'; 

	if(isset($_SESSION['user_email'])){
	  header("Location:myaccount.php");
	  exit();
	}

	/////DELETE Rows /////
	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM Contents WHERE content_ID = '$_GET[del_id]' ";
		$run_sql = mysqli_query($conn,$del_sql);
	}

	/////Add Rows /////
	if(isset($_POST['submit_form'])){
		$content_title = strip_tags($_POST['content_title']);
		$content_description = strip_tags($_POST['content_description']);
		$created_date = strip_tags($_POST['created_date']);
		$ins_sql = "INSERT INTO Contents (content_title, content_description, created_date) VALUES ('$content_title', '$content_description', '$created_date')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:contents.php");
	}else{
		echo "this doesn't work";
	}

	/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$content_ID = strip_tags($_POST['content_ID']);
		$content_title = strip_tags($_POST['content_title']);
		$content_description = strip_tags($_POST['content_description']);
		$created_date = strip_tags($_POST['created_date']);
		//$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$ins_sql = "UPDATE Contents SET content_title='$content_title', content_description='$content_description', created_date='$created_date' WHERE content_ID = '$content_ID' " ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:contents.php");
	}else{
		echo "this doesn't work";
	}
	


?>
<html>
<head>
	<title> Personal Guide Contents </title>
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


	<div class="container-fluid" style="margin-top:100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				<h2>Contents (from Database)</h2><br>
				</div>
				<div class="col-md-10 col-md-offset-1">

					<table class="table table-striped">
						<thead> 
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th>Created Date</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>

						<tbody>
							<?php 
							$sql = "SELECT * FROM Contents";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['content_ID'].'</td>
									<td>'.$rows['content_title'].'</td>
									<td>'.$rows['content_description'].'</td>
									<td>'.$rows['created_date'].'</td>
									<td><a class="btn btn-warning" href="contents_edit.php?edit_id='.$rows['content_ID'].'">Edit</a></td>
									<td><a class="btn btn-danger" href="contents.php?del_id='.$rows['content_ID'].'">Delete</a></td>
								</tr>
								';
							}
							?>

						</tbody>
					</table>
					<td><a class="btn btn-info" href="contents_add.php">Add New Content</a></td>	
				</div>
			</div>
		</div>
	</body>
	</html>