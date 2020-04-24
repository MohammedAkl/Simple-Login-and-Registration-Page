<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  background-image: url("bg2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  text-align: center;
    margin-top: 200px;

}
.text-danger{

	font-size: 50px;
}
.text-info{

	font-size: 80px;
}

</style>



<head>
  <title>Welcome</title>
</head>
<body>
	<h1 class="text-info">Welcome </h1>
	<?php 
	session_start();
	$con=mysqli_connect('localhost','root','','registration') or die(mysql_error());
	if (!$con) {
		echo "noo";

	}
	if (!mysqli_select_db($con,'registration')) {
		echo "db no";
	}
	$username = $_SESSION['username'];
	echo " <div class=\"text-danger\">$username</div>" ;

	
	?>
	
</body>
</html>
