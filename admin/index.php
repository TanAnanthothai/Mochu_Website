<?php 


session_start();
//include('includes/config.php');
include('includes/db.php');

if(isset($_SESSION['user_email'])){
  header("Location:myaccount.php");
  exit();
}



if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $query = "SELECT * FROM Users WHERE email='$email' and password='$password' ";

  $result = $conn->query($query);

  if($row= $result->fetch_assoc()){
      if($row['status']==1){
        $_SESSION['user_email'] = $email;
        header("Location:myaccount.php");
        exit();
      }
      else{
        header("Location:index.php?err=".urlencode("The user account is not activated!"));
        exit();
      }
  }else{
      header("Location:index.php?err=".urlencode("Wrong Email or Password"));
      exit();

  }

}


?>

<html>
<head>
  <title> Index & Login</title>
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
          <li class="active"><a href="index.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">

    <form action="index.php" method="post" style="margin-top:90px">
      <h2> Login </h2>
      <hr>
      <?php if(isset($_GET['success'])) { ?>
        <div class="alert alert-success"> <?php echo $_GET['success']; ?> </div>
      <?php } ?>
       <?php if(isset($_GET['err'])) { ?>
        <div class="alert alert-danger"> <?php echo $_GET['err']; ?> </div>
      <?php } ?>

    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
   <!--    <div class="checkbox">
        <label>
          <input type="checkbox" name="remember_me"> Remember Me
        </label>
      </div> -->
      <button type="submit" name="login" class="btn btn-info">Login</button>
      <a href="forgot_password.php"> Forgot Password </a>
    </form>

  </div><!-- /.container -->

</body>
</html>



