<?php 
//include('includes/config.php');
include('includes/db.php');
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
    <form method="post" style="margin-top:150px">
    
      <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
    
      <button type="submit" name="send_my_password" class="btn btn-default">Send my password</button>
      <a herf="index.php" class="btn btn-danger">Cancel </a>
    </form>

  </div><!-- /.container -->

</body>
</html>



