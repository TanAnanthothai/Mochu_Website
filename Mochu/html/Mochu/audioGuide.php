<?php include 'includes/db.php'; 

	if(isset($_SESSION['user_email'])){
	  header("Location:myaccount.php");
	  exit();
	}

	/////DELETE Rows /////
	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM AudioGuide WHERE au_ID = '$_GET[del_id]' ";
		$run_sql = mysqli_query($conn,$del_sql);
	}

	/////Add Rows /////
	if(isset($_POST['submit_form'])){
		$name = strip_tags($_POST['au_name']);
		$au_file = strip_tags($_POST['au_file']);
		$fl_IMG = strip_tags($_POST['fl_IMG']);
		$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:audioGuide.php");
	}else{
		echo "this doesnt work";
	}

	/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$au_ID = strip_tags($_POST['au_ID']);
		$name = strip_tags($_POST['au_name']);
		$au_file = strip_tags($_POST['au_file']);
		$fl_IMG = strip_tags($_POST['fl_IMG']);
		//$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$ins_sql = "UPDATE AudioGuide SET au_name='$name', au_file='$au_file', fl_IMG='$fl_IMG' WHERE au_ID = '$au_ID' " ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:audioGuide.php");
	}else{
		echo "this doesnt work";
	}
	


?>
<html>
<head>
	<title> Audio Guide </title>
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
           <li><a href="users.php">Users</a></li>
          <li class="active"><a href="audioGuide.php">Audio Guide</a></li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


	<div class="container-fluid" style="margin-top:100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<h2>Audio Guide (from Database)</h2><br>
				</div>
				<div class="col-md-8 col-md-offset-2">

					<table class="table table-striped">
						<thead> 
							<th>au_ID</th>
							<th>au_name</th>
							<th>au_file</th>
							<th>fl_IMG</th>
							<th>edit</th>
							<th>delete</th>
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM AudioGuide";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['au_ID'].'</td>
									<td>'.$rows['au_name'].'</td>
									<td>'.$rows['au_file'].'</td>
									<td>'.$rows['fl_IMG'].'</td>
									<td><a class="btn btn-warning" href="audioGuide_edit.php?edit_id='.$rows['au_ID'].'">Edit</a></td>
									<td><a class="btn btn-danger" href="audioGuide.php?del_id='.$rows['au_ID'].'">Delete</a></td>
								</tr>
								';
							}
							?>

						</tbody>
					</table>
					<td><a class="btn btn-info" href="audioGuide_add.php">Add Audio Guide</a></td>	
				</div>
			</div>
		</div>
	</body>
	</html>