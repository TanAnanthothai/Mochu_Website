<?php include 'includes/db.php'; 


/////DELETE Rows /////
	if(isset($_GET['del_id']) && isset($_GET['q_id'])){
		$select_sql = "SELECT * FROM Choices WHERE Choices.ch_ID = '$_GET[del_id]' AND Choices.q_ID = '$_GET[q_id]'";
		$result = mysqli_query($conn,$select_sql);
	 	while($rows = mysqli_fetch_assoc($result)){
	 		$question_id=$rows['q_ID'];
	 	}	
		$del_sql = "DELETE FROM Choices WHERE ch_ID = '$_GET[del_id]' AND q_ID = '$_GET[q_id]'";
		$run_sql = mysqli_query($conn,$del_sql);
		header("Location:cuSquiz_detail.php?detail_id=$question_id");
	} else {
		echo "this doesn't work";
	}

/////Add Rows /////
	if(isset($_POST['submit_form'])){
		$q_ID = strip_tags($_POST['q_ID']);
		$ch_ID = strip_tags($_POST['ch_ID']);
		$ch_content = strip_tags($_POST['ch_content']);
		$is_key = strip_tags($_POST['is_key']);
		$ins_sql = "INSERT INTO Choices (q_ID, ch_ID, ch_content, is_key) VALUES ('$q_ID', '$ch_ID','$ch_content', '$is_key')";
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:cuSquiz_detail.php?detail_id=$q_ID");
	}else{
		echo "this doesn't work";
	}

/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$q_ID = strip_tags($_POST['q_ID']);
		$ch_ID = strip_tags($_POST['ch_ID']);
		$ch_content = strip_tags($_POST['ch_content']);
		$is_key = strip_tags($_POST['is_key']);
		
		$ins_sql = "UPDATE Choices SET ch_ID='$ch_ID', ch_content='$ch_content', is_key='$is_key' WHERE q_ID = '$q_ID' " ;
		$run_sql = mysqli_query($conn, $ins_sql);
		header("Location:cuSquiz_detail.php?detail_id=$q_ID");
	}else{
		echo "this doesn't work";
	}


?>

<html>
<head>
	<title> Retreiving Data from Database </title>
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

	
				<div class="jumbotron">
					<?php
						$sql = "SELECT * FROM Questions WHERE Questions.q_ID='$_GET[detail_id]'";
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

				<div class="col-md-8 col-md-offset-2">
					<table class="table table-striped table-hover">
						<thead> 
							<th>ID</th>
							<th>Choice</th>
							<th>Score</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>
						<tbody>
							<?php 
							$sql = "SELECT * FROM Choices WHERE Choices.q_ID='$_GET[detail_id]'";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['ch_ID'].'</td>
									<td>'.$rows['ch_content'].'</td>
									<td>'.$rows['is_key'].'</td>
									<td><a class="btn btn-warning" href="cuSquiz_edit_choices.php?edit_id='.$rows['ch_ID'].'&q_id='.$rows['q_ID'].'">Edit</a>
									<td><a class="btn btn-danger" href="cuSquiz_detail.php?del_id='.$rows['ch_ID'].'&q_id='.$rows['q_ID'].'">Delete</a></td>
								</tr>
								';
							} 
							?>
						</tbody>
					</table>

					<div>
						<?php 
							$q_sql = "SELECT * FROM Questions WHERE Questions.q_ID='$_GET[detail_id]'";
							$run1_sql = mysqli_query($conn,$q_sql);
							while($rows1 = mysqli_fetch_assoc($run1_sql)){
								$ques_ID=$rows1['q_ID'];
							}

							$i=0;
							$ch_sql = "SELECT * FROM Choices WHERE Choices.q_ID='$_GET[detail_id]'";
							$run2_sql = mysqli_query($conn,$ch_sql);
							while($rows2 = mysqli_fetch_assoc($run2_sql)){
								$i++;
							} 

							if($i<4){
								echo '<a class="btn btn-info" href="cuSquiz_add_choices.php?q_id='.$ques_ID.'">Add New Choice</a>';
							}
						?>
					</div>

				</div>
			
	</div>

</body>
</html>