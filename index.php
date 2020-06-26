<?php
  session_start();
  if(isset($_SESSION["id"]) OR isset($_COOKIE['email'])){
    echo header('location:user.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.modal {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
	}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    border: 1px solid #888;
    width: 60%;
}

.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
.card-text {
min-height: 6%;
max-height: 6%;
  </style>
}
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
					<li><a href="login.php">Login</a></li>
				</ul>
	</div>
<br>
	<div class="container-fluid" style="margin-bottom: 40px;">
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
	<hr style="border-color:#C7C7C7"><br>

	<!--Slide show code-->
	<div class="container" style="margin-bottom: 50px;">
  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    		<ol class="carousel-indicators">
    		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    		  <li data-target="#myCarousel" data-slide-to="1"></li>
    		  <li data-target="#myCarousel" data-slide-to="2"></li>
    		  <li data-target="#myCarousel" data-slide-to="3"></li>
    		  <li data-target="#myCarousel" data-slide-to="4"></li>
    		</ol>
 	<!-- Wrapper for slides -->
    	<div class="carousel-inner">
    	  <div class="item active">
    	    <img src="first.jpg" alt="Los Angeles" style="width:100%; height: 400px;">
    	  </div>

      	  <div class="item">
      	    <img src="second.jpg" alt="Chicago" style="width:100%; height: 400px;">
     	  </div>
    
      	  <div class="item">
          	<img src="third.jpg" alt="New york" style="width:100%; height: 400px;">
      	  </div>

      	  <div class="item">
          	<img src="fourth.jpg" alt="New york" style="width:100%; height: 400px;">
      	  </div>

      	  <div class="item">
          	<img src="fifth.jpg" alt="New york" style="width:100%; height: 400px;">
      	  </div>
    	</div>
     <!-- Left and right controls -->
    	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      		<span class="glyphicon glyphicon-chevron-left"></span>
      		<span class="sr-only">Previous</span>
    	</a>
    	<a class="right carousel-control" href="#myCarousel" data-slide="next">
    	  <span class="glyphicon glyphicon-chevron-right"></span>
    	  <span class="sr-only">Next</span>
    	</a>
  		</div>
	</div>
	<br>
  <!--Recent posts-->
	<h2 style="margin-left: 7%;">Recent Posts</h2>
<hr style="margin-right: 90px; margin-left: 90px;border-color:#C7C7C7">
<?php
$mysqli = mysqli_connect('localhost','root','','mosaic');
?>
	<div class="row" style="padding-bottom: 50px;margin-right: 90px; margin-left: 90px;">
    	<div class="col-sm-4">
  <div class="card">
    <img class="card-img-top" src="fifth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <?php
      $query = "select * from posts where category='lifestyle'";
      $result = mysqli_query($mysqli,$query);
      $row = mysqli_fetch_row($result);
      echo '<h4 class="card-title">'.$row[3].'</h4>
      <p class="card-text">'.$row[4].'</p>';
      ?>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">Read More</a>
    </div>
  </div>
  <br><br>
  <div class="card">
    <img class="card-img-top" src="fifth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <?php

      ?>
      <h4 class="card-title">Heading</h4>
      <p class="card-text">Some example text some example text. First few words of the post.</p>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary">Read More</a>
    </div>
  </div>
  <br><br>
  <div class="card">
    <img class="card-img-top" src="fifth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Heading</h4>
      <p class="card-text">Some example text some example text. First few words of the post.</p>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary">Read More</a>
    </div>
  </div>
  <br><br>
    	</div>
    	<div class="col-sm-4" >
    		  <div class="card">
    <img class="card-img-top" src="fourth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Heading</h4>
      <p class="card-text">Some example text some example text. First few words of the post.</p>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary">Read More</a>
    </div>
  </div>
  <br><br>
  <div class="card">
    <img class="card-img-top" src="fifth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Heading</h4>
      <p class="card-text">Some example text some example text. First few words of the post.</p>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary">Read More</a>
    </div>
  </div>
  <br><br>
  <div class="card">
    <img class="card-img-top" src="fifth.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Heading</h4>
      <p class="card-text">Some example text some example text. First few words of the post.</p>
      <p style="color: DarkGray;">Reading time</p>
      <a href="#" class="btn btn-primary">Read More</a>
    </div>
  </div>
  <br>
  <br>
  <button style="background-color: white;border: 1px solid DarkGray; padding: 5px 10px 5px 10px; float: right;">Older Posts</button>
    	</div>
    	<div class="col-sm-1"></div>
    	<div class="col-sm-3">
    		<h3 style="font-family: 'Comic Sans MS', cursive, sans-serif;">Connect with us</h3>
    		<a href="login.php"><button style="background-color:LightGray;border:none; padding: 5px 10px 5px 10px; width:100%;"><h4>Login / Signup</h4></button></a><br><br>
    		<h3>Categories</h3><hr style="border: 0.5px solid LightGray">
    		<div class="category"><a href="">Lifestyle</a></div>
    		<div class="category"><a href="">Technology</a></div>
    		<div class="category"><a href="">Food</a></div>
    		<div class="category"><a href="">Travel</a></div>
    		<div class="category"><a href="">Sports</a></div>
    		<div class="category"><a href="">Entertainment</a></div>
    		<br>
    		<h3>Bloggers of the Day</h3>
    		<hr style="border: 0.5px solid LightGray">
    		<div style="min-width: 8%;background-color: #F0F0F0;padding:5% 5% 5% 5%;">
    			<p>First<br><br>Second<br><br>Third<br><br>Fourth<br><br>Fifth</p>
    		</div>
    	</div>
  	</div>
  	<hr style="border-color:#C7C7C7">

  	<!--footer-->
  		<div class="container-fluid" style="margin-bottom: 40px;">
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



	<!--single post description-->
	<div id="id01" class="modal">
		<div class="modal-content animate" style="text-align: center;">
			<h6>Category Name</h6>
			<h4>Username</h4>
			<h6>Date</h6>
			<br>
			<img src="first.jpg" style="max-height: 400px; max-width: 400px;">
			<br><br><br><br>
			<p>Description</p>
			<i onclick="like(this)" class="fa fa-thumbs-up" id="like"></i>
			<i onclick="dislike(this)" class="fa fa-thumbs-down" id="dislike"></i>
			<h4>Comments</h4>
		</div>
	</div>
<script>
var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function like(x) {
	if (x.style.color=="blue")
		x.style.color="black";
	else {
	if(document.getElementById("dislike").style.color=="blue")
		document.getElementById("dislike").style.color="black";
    x.style.color="blue";
}
}
function dislike(x) {
	if (x.style.color=="blue")
		x.style.color="black";
	else {
	if(document.getElementById("like").style.color=="blue")
		document.getElementById("like").style.color="black";
    x.style.color="blue";
}
}
</script>

</body>
</html>