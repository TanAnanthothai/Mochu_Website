<?php 
//include('includes/config.php');
include('includes/db.php');

session_start();

if(!isset($_SESSION['user_email'])){
  header("Location:index.php?err=".urlencode("You need to login first!!"));
  exit();
}


?>


<html>
<head>
  <title> My Account </title>
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
          <li class="active"><a href="myaccount.php">My Account</a></li>
          <li><a href="users.php">Users</a></li>
          <li><a href="audioGuide.php">Audio Guide</a></li>
          <li><a href="cuSquiz.php">CU Squiz</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container" style="margin-top:100px">
    
    <div class="jumbotron">
      <h2> Welcome <?php echo $_SESSION['user_email'] ?> </h2>
    </div>

  </div>

</body>
</html>



