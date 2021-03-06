<?php 
session_start();
//include('includes/config.php');
include('includes/db.php');

if(isset($_SESSION['user_email'])){
  header("Location:myaccount.php");
  exit();
}


function isUnique($email){
    $query= "SELECT * FROM Users WHERE email='$email'";
    global $conn;
    $result = $conn->query($query);
    if($result->num_rows>0){
      return false;
    }
    else {
      return true;
    }
}

if(isset($_POST['register'])){
  $_SESSION['Fname']=$_POST['Fname'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['password']=$_POST['password'];
  $_SESSION['confirm_password']=$_POST['confirm_password'];

  if(strlen($_POST['Fname'])<3){
    header("Location:register.php?err=".urlencode("The name must be at least 3 characters long."));
    exit();
  }
  else if($_POST['password'] != $_POST['confirm_password']){
    header("Location:register.php?err=".urlencode("The password and confirm password do not match."));
    exit();
  }
  else if(strlen($_POST['password'])<5){
    header("Location:register.php?err=".urlencode("The password must be at least 5 characters."));
    exit();
  }
  else if(strlen($_POST['confirm_password'])<5){
    header("Location:register.php?err=".urlencode("The password must be at least 5 characters."));
    exit();
  }
  else if(!isUnique($_POST['email'])){
    header("Location:register.php?err=".urlencode("Email is already existed. Please use another one."));
    exit();
  }
  else{
    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $token= bin2hex(openssl_random_pseudo_bytes(32));
    $query = "INSERT INTO Users (Fname,email,password,Lname,gender,contact,Bday,last_login) VALUES ('$Fname', '$email', '$password', '$Lname', 
             '$gender', '$contact','$Bday', '$last_login')" ;

    $conn-> query($query);
    $_SESSION['user_email'] = $email;
    header("Location:myaccount.php");
  }
  
}



?>

<html>
<head>
  <title> Registering from Audio Guide </title>
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
          <li><a href="index.php">Login</a></li>
          <li class="active"><a href="register.php">Register</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <form action="register.php" method="post" style="margin-top:90px">
      <h2>Register</h2>
      <?php
        if(isset($_GET['err'])){ ?>
          <div class="alert alert-danger"> <?php echo $_GET['err']; ?></div>
     <?php } ?>
      <hr>

     <div class="form-group">
        <label>First Name</label>
        <input name="Fname" class="form-control" placeholder="Enter your first name" value="<?php echo @$_SESSION['Fname']; ?>" required> 
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input name="Lname" class="form-control" placeholder="Enter your last name" value="<?php echo @$_SESSION['Lname']; ?>" required> 
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo @$_SESSION['email']; ?>" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo @$_SESSION['password']; ?>" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" value="<?php echo @$_SESSION['confirm_password']; ?>" required>
      </div>

      <div class="form-group">
        <label>Gender</label>
        <input name="gender" class="form-control" placeholder="Male/Female" value="<?php echo @$_SESSION['gender']; ?>" required> 
      </div>

      <div class="form-group">
        <label>Contact</label>
        <input name="contact" class="form-control" placeholder="08XXXXXXXX" value="<?php echo @$_SESSION['contact']; ?>" required> 
      </div>

      <div class="form-group">
        <label>Birthday</label>
        <input name="Bday" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo @$_SESSION['Bday']; ?>" required> 
      </div>


      <button type="submit" name="register" class="btn btn-info" >Register</button>
    </form>

  </div><!-- /.container -->

</body>
</html>



