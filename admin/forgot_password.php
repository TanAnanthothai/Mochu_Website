<?php 
//include('includes/config.php');
include('includes/db.php');

//$strTo = "teerakorn.a@gmail.com";
//$strSubject = "Testing send mail";
$strHeader = "From: mochu@teerakorn.me";
$strMessage = "Helloooo from Mochu";

if (isset($_POST['send_my_password'])){
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $query="SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($query);
    if($row=$result->fetch_assoc()){
        $password=$row['password'];
        if(mail($email, 'Forgot Password', "Your Password is: $password", $strHeader)){
          header("Location:forgot_password.php?success=".urlencode("Your Password has been sent to your email!!"));
          exit();
        } else {
          header("Location:forgot_password.php?err=".urlencode("Sorry we cannot send your password at this time."));
          exit();
        }
    }
    else {
        header("Location:forgot_password.php?err=".urlencode("Sorry there is no user with the password exist."));
        exit();
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
          <li><a href="register.php">Register</a></li>
          <li><a href="audioGuide.php">Audio Guide</a></li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
  
      <form action="forgot_password.php" method="post" style="margin-top:150px">
        <h2> Retrieve Password</h2>
        <hr>
      
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="Email" required> 
        </div>
      
        <button type="submit" name="send_my_password" class="btn btn-default">Send my password</button>
        <a herf="index.php" class="btn btn-danger">Cancel </a>
      </form>
   

  </div><!-- /.container -->

</body>
</html>



