<?php
 session_start();
  if(isset($_SESSION["id"]) OR isset($_COOKIE['email'])){
    echo header('location:user.php');
  }
if(isset($_POST["login"])){
extract($_POST);
$link = mysqli_connect("localhost","root","","mosaic");
if(mysqli_connect_errno()) {
	echo "Failed to connect to database";
}
$sql = "SELECT * FROM user_details WHERE email = '$email' AND pass ='$passwd'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);
if($count==1) {
	foreach($result as $row){
		session_start();
		$_SESSION["id"]=$row["user_id"];
	}
	setcookie('email',$email,time()+60*60*24*7);
		echo header('Location:user.php');
}
else {
	echo header("Location:login.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="navigation container-fluid" style="background-color:#ECECEC">
				<ul class="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Categories</a>
						<ul class="sub-menu">
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Food</a></li>	
							<li><a href="#">Travel</a></li>	
							<li><a href="#">Sports</a></li>	
							<li><a href="#">Entertainment</a></li>	
						</ul>
					</li>
					<li><a href="about.html">About</a></li>
					<li><a href="about.html">Contact</a></li>
					<li><a href="#">Login</a></li>
				</ul>
	</div>
<br><br>
	<div class="container-fluid" style="margin-bottom: 60px;">
		<div style="float: left; margin-left: 5%;margin-top: 3%;">
		<a href="http://facebook.com" style="margin-right: 10px; margin-left: 10px;"><i class="fa fa-facebook" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://plus.google.com" style="margin-right: 10px;"><i class="fa fa-google-plus" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://twitter.com" style="margin-right: 10px;"><i class="fa fa-twitter" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://tumblr.com" style="margin-right: 10px;"><i class="fa fa-tumblr" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://instagram.com" style="margin-right: 10px;"><i class="fa fa-instagram" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://linkedin.com" style="margin-right: 10px;"><i class="fa fa-linkedin" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
	</div>
	<div>
		<img src="logo.jpg" style="height: 37%;width: 37%;margin-left: 11%;">
</div>
	</div>

	<!--login/signup form-->
	<div style="background-color: #ECECEC;min-height:70px;"></div>
<div style="background-color:#ECECEC;">
	<div style="background-color: white;margin-left: 25%; margin-right: 7%;border: 1px solid #C7C7C7;padding-left: 2%;padding-right: 2%;padding-bottom:2%;width: 50%;">
	<div style="padding-top: 5%;border-bottom: 1px solid #C7C7C7;">
		<h2>Login</h2>
	</div>
	<form class="login_form" style="padding: 2% 2% 2% 2%;display: block;" action="login.php"; method="POST">
		<label style="padding: 1% 1% 1% 1%;"><b> Email</b></label><br>
		<input style="padding: 1% 1% 1% 1%;" type="text" name="email" placeholder="Enter email" required><br>
		<label style="padding: 1% 1% 1% 1%;"><b>Password</b></label><br>
		<input style="padding: 1% 1% 1% 1%;" type="password" name="passwd" placeholder="Enter Password" required><br><br>
		<button style="padding: 1% 5% 1% 5%;" type="submit" name="login">Login</button>
	</form>
	<br>
	<a href="signup.php">New blogger ?</a>
</div>
</div>

<div style="background-color: #ECECEC;min-height:70px;"></div>

  	<!--footer-->
  		<div class="container-fluid" style="margin-bottom: 40px;padding-top: 3%">
		<div style="float: left; margin-left: 5%;margin-top: 3%;">
		<a href="http://facebook.com" style="margin-right: 10px; margin-left: 10px;"><i class="fa fa-facebook" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://plus.google.com" style="margin-right: 10px;"><i class="fa fa-google-plus" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://twitter.com" style="margin-right: 10px;"><i class="fa fa-twitter" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://tumblr.com" style="margin-right: 10px;"><i class="fa fa-tumblr" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://instagram.com" style="margin-right: 10px;"><i class="fa fa-instagram" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
		<a href="http://linkedin.com" style="margin-right: 10px;"><i class="fa fa-linkedin" style="font-size: 140%;
	color: #6E6E6E;"></i></a>
	</div>
	<div>
		<h1 style="font-family: 'Comic Sans MS', cursive, sans-serif;margin-left: 43.5%;color:#E19F33;font-size: 40px;">MOSAIC</h1>
</div>
	</div>
</body>
</html>