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
	<script src="register.js"></script>
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
            <li class="active"><a href="../Final/final.php">Home</a></li>
			<li><a href="../Final/register.html">Register</a></li>
			<li><a href="../Final/login.html">Login</a></li>
          </ul>
		     
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!--http://www.w3schools.com/php/php_form_required.asp-->

		<div class = "container1"
		<div id = "sidebar"> </div>
	</div>

	<div class = "container1"
		<div id = "content"> 
	<h2> Enter a Sasquatch Artist to Add it to the Database</h2>
	<h3> make sure to include the artist's genre and what day they are playing</h3>
	<form action="final.php" method = "post">
	<p>
	<label> Artist Name: </label> 
	<input type="text" name="name">
	<br><br>
	</p>
	<p>
	<label>Genre:</label>
	<input type="text" name="category">
	<br><br>
	</p>
	<p>
	<label>Day Playing Sasquatch: </label> 
	<input type="text" name="day">
	<br><br>
	</p>
	<input type = "submit" name ="submit" value = "Submit Artist">
	</form>
	
	<div id ="box"> 
	<iframe src="https://player.vimeo.com/video/118585906" width="500" height="281" frameborder="0"></iframe>
	</div>
	
	
	
	
	
	PRESS TWICE TO CHANGE
	<br>LISTENED TO
	<br><br><br>
	


<?php
session_start();
	//create connection
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'bauerbr-db';
	$dbuser = 'bauerbr-db';
	$dbpass = 'M2whRxJMNGLI85Ki';

	$con = new mysqli("oniddb.cws.oregonstate.edu", "bauerbr-db", "M2whRxJMNGLI85Ki", "bauerbr-db");
	if ($con->connect_errno) {
		echo "Failed to connect to con: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		echo "";
	}
	//$sql = "CREATE DATABASE sasquatch";
	//if($con-> query($sql) === TRUE) {
		//echo "Database created";
	//} else {
		//echo "Error creating database: " . $mysqli->error;
	//}

	//if ($con->query("CREATE TABLE sasquatch(
	//id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	//name VARCHAR(255) NOT NULL ,
	//category VARCHAR(255),
	//going TINYINT(1),
	//listened TINYINT(1))") == TRUE){
		// printf("table created succesfully");
	 //}
	 
	// if($con-> query($con) === TRUE) {
		//echo "Table created";
	//} else {
		//echo "Error creating Table " . $con->error;
	//}
$session_name = " ";
$session_name = $_SESSION["username"];

	if(isset($_POST['submit'])){
	//Inserting Values through form
	if (empty($_POST["name"])) {
		echo "<b>Name cannot be empty*<b>";
	} else {
		$sql = "INSERT INTO sasquatch (name,category,day,username) VALUES('$_POST[name]','$_POST[category]','$_POST[day]','$session_name')";
		if(!$result = $con->query($sql)){
			die('There was an error running the query [' . $con->error . ']');
			}
		}
	}
	
	$sort = "SELECT category FROM sasquatch WHERE username ='$session_name' OR username IS NULL OR '' = username OR username = ' '";
	if(!$result = $con->query($sort)){
		die('There was an error running the query [' . $con->error . ']');
		$result ->close();
	}
	unset($categoryArrayNon);
	$categoryArrayNon = array();
	while ($row = mysqli_fetch_array($result)){
		array_push($categoryArrayNon, $row["category"]);
	}
	
	$table = "SELECT * FROM sasquatch WHERE username ='$session_name' OR username IS NULL OR '' = username OR username = ' '";
	
		if(isset($_POST['filter'])){
			if($_POST['dropdown'] == "All_Genres"){
				$table = "SELECT * FROM sasquatch WHERE username ='$session_name' OR username IS NULL OR '' = username OR username = ' '";
			} else {
				$table =  "SELECT * FROM sasquatch WHERE category = '$_POST[dropdown]' AND (username ='$session_name' OR  username IS NULL OR '' = username OR username = ' ')";
			}
			}
			
			
	$categoryArray = array_unique($categoryArrayNon);
	$genre = count($categoryArray);
	//Dropdown Box
	echo "<form action='final.php' method = 'post'>";
	echo "<select name ='dropdown'>";
	echo "<option value = All_Genres > All_Genres </option>";
	for($i = 0; $i < $genre+1000; $i++){
		if($categoryArray[$i] == ''){
			$categoryArray[$i] = "blank";
		} else {	
			echo "<option value='" .$categoryArray[$i]."'>".$categoryArray[$i]."  </option>";
		}
}
echo "</select>";
echo "<input type = 'submit' name ='filter' value = 'Filter By Genre'>";
echo "</form>";

	if(!$stmt = $con->query($table)){
		die('There was an error running the query [' . $con->error . ']');
	}
	
	echo "<table class ='table'>";
	echo "<caption> Artists Sasquatch 2015</caption>";
	echo "<tr>";
	echo "<th> Artist Name </th>";
	echo "<th> Genre </th>";
	echo "<th> Day </th>";
	echo "<th> Link to Sasquatch Website </th>";
	echo "<th> Listened To </th>";
	echo "</tr>";
	
	while ($row = mysqli_fetch_array($stmt)){
		if($row["listened"] == 1){
			$listenedvalue = "Yep";
			
		} else if($row["listened"] == 0) {
			$listenedvalue= "Nope";
			
		}
	$artist_name = "";
	$count_name = "";
	$artist_link = "";
	
	$i = 0;
	$artist_name = explode(" ",$row["name"]);
	$count_name = count($artist_name);
	for($i = 0; $i < $count_name; $i++){
			if($i == 0){
				$artist_link .= $artist_name[0];
			} else if($i != 0){
				$artist_link .= "-";
				$artist_link .= $artist_name[$i];
			}
		}	
		
		echo "<tr>";
		echo "<td>" . $row["name"] . "</td>";
		echo "<td>" . $row["category"] . "</td>";
		echo "<td>" . $row["day"] . "</td>";
		echo "<td> <a href='http://lineup.sasquatchfestival.com/band/$artist_link'>". $row["name"]. "</a></td>";
		echo "<td><form action ='final.php' method = 'post'> <input type ='hidden' name='hidden2' value =" . $row["listened"]. "><input type ='hidden' name='hidden3' value =" . $row["id"]. "><input type ='submit' name ='listenedstatus' value =" . $listenedvalue . "></form><td>";
		echo "</tr>";
	}
	echo "</table>";

	
	//Changed Checked out Status
	
	if(isset($_POST['listenedstatus'])){
		if($_POST['hidden2'] == 1){
		$newListnedValue = 0;
	} else {
		$newListnedValue = 1;
	}
	if($con->query("UPDATE sasquatch SET listened = '$newListnedValue' WHERE id = '$_POST[hidden3]'") == FALSE ){
		echo "ERROR";
	}
}



//<span class="error">*  <?php echo $errName; </span>
//Check to make sure Name isnt blank.
//$errName = "";
//$nameTest = "";
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //if (empty($_POST["name"])) {
    //$errName = "Name of video is required";
  //} else {
    //$nameTest = test_input($_POST["name"]);
  //}
//}
if(empty($session_name) == FALSE){
	echo "<div id ='login'> Welcome " . $session_name . ".<br><br> </div>";
	echo "<div id ='logout'>";
	echo "<a href ='logout.php' id = 'Logoutbutton'> Logout </a>";
	echo "</div>";
} else {
	echo "<div id ='logout'>";
	echo "<a href ='login.html' >login</a>";
	echo "</div>";
}

	
?>	
		</div>
	</div>
	</body>
</html>

