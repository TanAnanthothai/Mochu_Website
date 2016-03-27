<?php include 'includes/db.php'; 


/////DELETE Rows /////
if(isset($_GET['del_id'])){
	$del_sql = "DELETE FROM Choices WHERE ch_ID = '$_GET[del_id]' ";
	$run_sql = mysqli_query($conn,$del_sql);
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
	
	<div class="container">

	
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
							<th>ch_ID</th>
							<th>ch_content</th>
							<th>is_key</th>
<!-- 							<th>edit</th>
							<th>delete</th> -->
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
									<!--<td><a class="btn btn-warning" href="newAdd_cuSquiz_choices.php?edit_id='.$rows['ch_ID'].'">Edit</a></td>
									<td><a class="btn btn-danger" href="cuSquiz_detail.php?del_id='.$rows['ch_ID'].'">Delete</a></td>-->
								</tr>
								';
							} ?>
			 
						</tbody>
					</table>
					<!-- <a class="btn btn-success" href="newAdd_cuSquiz_choices.php">Add Choices</a> -->
				</div>
				
	
		


	</div>

</body>
</html>