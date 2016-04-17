<?php include 'includes/db.php'; 

if(isset($_SESSION['user_email'])){
  header("Location:myaccount.php");
  exit();
}


/////DELETE Rows /////
	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM Users WHERE user_ID = '$_GET[del_id]' ";
		$run_sql = mysqli_query($conn,$del_sql);
	}

/////Add Rows /////
	if(isset($_POST['submit_form'])){
		$Fname = strip_tags($_POST['Fname']);
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
		$Lname = strip_tags($_POST['Lname']);
		$gender = strip_tags($_POST['gender']);
		$contact = strip_tags($_POST['contact']);
		$Bday = strip_tags($_POST['Bday']);
		$last_login = strip_tags($_POST['last_login']);

		$fb_ID = strip_tags($_POST['fb_ID']);
		$occupation = strip_tags($_POST['occupation']);
		$quiz_score = strip_tags($_POST['quiz_score']);
		$register_date = strip_tags($_POST['register_date']);

		$user_sql = "INSERT INTO Users (Fname,email,password,Lname,gender,contact,Bday,last_login) VALUES ('$Fname', '$email', '$password', '$Lname', '$gender', '$contact',
				   '$Bday', '$last_login')" ;
		$run1_sql = mysqli_query($conn, $user_sql);

		$select_sql = "SELECT * FROM Users WHERE Fname='$Fname' AND Lname='$Lname' AND email='$email' AND password='$password' AND gender='$gender' AND contact='$contact' AND Bday='$Bday'";
		$run2_sql = mysqli_query($conn,$select_sql);
		while($rows = mysqli_fetch_assoc($run2_sql)){
			$user_ID=$rows['user_ID'];
		}

		$member_sql = "INSERT INTO Members (occupation,quiz_score,fb_ID,register_date,user_ID) VALUES ('$occupation', '$quiz_score', '$fb_ID', '$register_date', '$user_ID')";
		$run3_sql = mysqli_query($conn, $member_sql);
		
		header("Location:members.php?user_ID=$Fuser_ID");
	}else{
		echo "this doesn't work";
	}

	/////Edit Rows /////
	if( (isset($_POST['edit_form']) )){
		$user_ID = strip_tags($_POST['user_ID']);
		$Fname = strip_tags($_POST['Fname']);
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
		$Lname = strip_tags($_POST['Lname']);
		$gender = strip_tags($_POST['gender']);
		$contact = strip_tags($_POST['contact']);
		$Bday = strip_tags($_POST['Bday']);
		$last_login = strip_tags($_POST['last_login']);
		//$ins_sql = "INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$user_sql = "UPDATE Users SET Fname='$Fname', email='$email', Lname='$Lname', gender='$gender', contact='$contact', Bday='$Bday',
					last_login='$last_login' WHERE user_ID = '$user_ID' " ;
		$run1_sql = mysqli_query($conn, $user_sql);

		$fb_ID = strip_tags($_POST['fb_ID']);
		$occupation = strip_tags($_POST['occupation']);
		$quiz_score = strip_tags($_POST['quiz_score']);
		$register_date = strip_tags($_POST['register_date']);

		$member_sql = "UPDATE Members SET occupation='$occupation', quiz_score='$quiz_score', fb_ID='$fb_ID', register_date='$register_date' WHERE user_ID = '$user_ID'";
		$run2_sql = mysqli_query($conn, $member_sql);


		header("Location:members.php");
	}else{
		echo "this doesn't work";
	}


?>
<html>
<head>
	<title> Members </title>
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
              <li class="active"><a href="members.php">Members</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal Guide<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="audioGuide.php">Audio Guide</a></li>
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


	<div class="container-fluid" style="margin-top:100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-15 col-md-offset-0.5">
				<h2>Members (from Database)</h2><br>
				</div>
				<div class="col-md-15 col-md-offset-0.5">

					<table class="table table-striped">
						<thead> 
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Facebook</th>
							<th>Gender</th>
							<th>Contact</th>
							<th>Birth Date</th>
							<th>Occupation</th>
							<th>Quiz Score</th>
							<th>Register Date</th>
							<th>Last Login</th>
							<th>Edit</th>
							<th>Delete</th>
						</thead>

						<tbody>
							<?php 
							$sql = "SELECT * FROM Users u, Members m WHERE u.user_ID=m.user_ID";
							$run_sql = mysqli_query($conn,$sql);
							while($rows = mysqli_fetch_assoc($run_sql)){
								echo '
								<tr> 
									<td>'.$rows['user_ID'].'</td>
									<td>'.$rows['Fname'].'</td>
									<td>'.$rows['Lname'].'</td>
									<td>'.$rows['email'].'</td>
									<td>'.$rows['password'].'</td>
									<td>'.$rows['fb_ID'].'</td>
									<td>'.$rows['gender'].'</td>
									<td>'.$rows['contact'].'</td>
									<td>'.$rows['Bday'].'</td>
									<td>'.$rows['occupation'].'</td>
									<td>'.$rows['quiz_score'].'</td>
									<td>'.$rows['register_date'].'</td>
									<td>'.$rows['last_login'].'</td>
									<td><a class="btn btn-warning" href="members_edit.php?edit_id='.$rows['user_ID'].'">Edit</a></td>
									<td><a class="btn btn-danger" href="members.php?del_id='.$rows['user_ID'].'">Delete</a></td>
								</tr>
								';
							}
							?>

						</tbody>
					</table>
					<td><a class="btn btn-info" href="members_add.php">Add New Member</a></td>	
					
				</div>
			</div>
		</div>
	</body>
	</html>