<html>
<head>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sasquatch Music Festival Artist List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
</head>
<body>
<script src = "register.js"></script>
    <nav class="navbar-default">
      <div class="container">
	  <ul class = "nav navbar-nav">
			<li class = "span1">
			<img style = "height: 50px; width: 50px; margin-top: 10px;" src="https://pbs.twimg.com/profile_images/556214268744318976/Rj-sSmG5.png" alt="">
			</a>
			</li>
	  </ul>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sasquatch Artists</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../Final/final.php">Home</a></li>
			<li class="active"><a href="../Final/register.html">Register</a></li>
			<li><a href="../Final/login.php">Login</a></li>
          </ul>
		     
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
session_start();
session_destroy();
session_unset();
deleted.setcookie();
echo "You have logged out";
echo "<a href='../Final/final.php'> Return to the home page </a>";
	
?>
</body>

