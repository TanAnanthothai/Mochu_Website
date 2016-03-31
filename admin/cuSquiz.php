<?php include 'includes/db.php'; 

	if(isset($_SESSION['user_email'])){
	  header("Location:myaccount.php");
	  exit();
	}


	/////DELETE Rows /////
	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM Questions WHERE q_ID = '$_GET[del_id]' ";
		$run_sql = mysqli_query($conn,$del_sql);
	}

	///Add Rows /////
	if(isset($_POST['submit_form'])){
		$q_content = strip_tags($_POST['q_content']);
		$q_img = strip_tags($_POST['q_img']);

		$ins_sql = "INSERT INTO Questions (q_content, q_img) VALUES ('$q_content', '$q_img')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:cuSquiz.php");
	}else{
		echo "this doesn't work";
	}

	/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$q_ID = strip_tags($_POST['q_ID']);
		$q_content = strip_tags($_POST['q_content']);
		$q_img = strip_tags($_POST['q_img']);
		//$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$ins_sql = "UPDATE Questions SET q_content='$q_content', q_img='$q_img' WHERE q_ID = '$q_ID' " ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:cuSquiz.php");
	}else{
		echo "this doesnt work";
	}

?>

<html>
<head>
	<title> Retreiving Data from Questions </title>
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
          <li><a href="audioGuide.php">Audio Guide</a></li>
          <li class="active"><a href="cuSquiz.php">CU Squiz</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

	<div class="container-fluid" style="margin-top:100px">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Questions (from Database)</h2><br>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-striped table-hover">
				<thead> 
					<th>ID</th>
					<th>Question</th>
					<th>Image URL</th>
					<th> Choices</th>
					<th> Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT * FROM Questions";
					$run_sql = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run_sql)){
						echo '
						<tr> 
							<td>'.$rows['q_ID'].'</td>
							<td>'.$rows['q_content'].'</td>
							<td>'.$rows['q_img'].'</td>
							<td><div align="center"><a class="btn btn-success" href="cuSquiz_detail.php?detail_id='.$rows['q_ID'].'">Choices</a></div></td>
							<td><div align="center"><a class="btn btn-warning" href="cuSquiz_edit_questions.php?edit_id='.$rows['q_ID'].'">Edit</a></div></td>
							<td><div align="center"><a class="btn btn-danger" href="cuSquiz.php?del_id='.$rows['q_ID'].'">Delete</a></div></td>

						</tr>
						';
					}
					?>
				</tbody>
				
			</table>
			<a class="btn btn-info" href="cuSquiz_add_questions.php">Add Questions</a>
			</div>
		</div>
	</div>
</body>
</html>