<?php
	session_start();
	if(isset($_SESSION["id"])){
	}
	else {
		echo header('location:index.php');
	}

if(isset($_POST["write"])){
extract($_POST);
$mysqli = new mysqli('localhost','root','','mosaic');
$id = $_SESSION["id"];
$date = date('Y-m-d H:i:s');
$query = "INSERT INTO posts(user_id,category,heading,description,date_time,likes,dislikes) VALUES ('$id','xyz','$heading','$description','$date',0,0)";
$insert_row = $mysqli->query($query);
if($insert_row) {
	echo header("location:user.php");
}
else {
	die('Error while inserting ');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="user.css">
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
    width: 40%;
}

.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
  </style>
  </head>
<body>
	<div class="navigation container-fluid" style="background-color:#ECECEC;display: flex;">
		<div style="width: 90%;">
				<ul class="menu" style="padding-left: 11%;">
					<li><a href="user.php">Home</a></li>
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
					<li><a href="">Bookmarks</a></li>
					<li><a href="">Your posts</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="about.html">Contact</a></li>
				</ul>
			</div>
				<div class="dropdown" style="text-decoration: none;">
 					 <button class="dropbtn"><a href="#"><img src="blank.jpg" style="width: 40px; height: 40px; border-radius: 25px;"></a></button>
  					 <div class="dropdown-content">
    				 <a href="#">Manage Account</a>
    				 <a href="#">Settings</a>
    				 <button style="border:none;"><a href="logout.php">Logout</a></button>
  					</div>
		 </div>
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

<!--Write own post-->

<div class="posting" style="margin-left: 7%;">

                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2yZ4capmwlAfnC7oh6SZTKokcTxI6YwosBgHBcrcfL5lPtt8L" style="width: 40px; height: 30px;"> 
               <h2 style="font-family: Comic Sans MS;display: inline;margin-left: 1%"> Write something...</h2><br><br><br>
               <button onclick="document.getElementById('write-post').style.display='block'" style="border:0.2px solid black;padding:4% 27% 4% 27%;background-color: white;">Write here</button>
</div>
<br>
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

	<!--Write post-->
	<div id="write-post" class="modal">
		<div class="modal-content animate" style="text-align: center;">
			<form action="user.php" method="POST">
				<br>
				<label>Select Category</label><br>
				<input list="browsers" name="category" style="padding: 2% 4% 2% 4%;">
  					<datalist>
  						<option value="lifestyle">
    					<option value="technology">
    					<option value="food">
    					<option value="travel">
    					<option value="sports">
    					<option value="entertainment">
  				</datalist><br>
  				<label>Heading</label><br>
  				<input type="text" name="heading" style="padding: 1% 4% 1% 4%;"><br>
  				<label>Description</label><br>
  				<input type="text" name="description" style="padding: 6% 4% 6% 4%;"><br><br>
  				<input type="submit" name="write"><br><br>

			</form>
		</div>
	</div>
<script>
var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('write-post');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
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