<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>  
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <script src="https://unpkg.com/scrollreveal"></script> <!-- Scroll reveal package -->  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/purchase.css"> 

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> <!-- Google font -->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
    
</head>


<body>

	<?php session_start(); ?>

	<div class = "mainbg">

	<div class="container-fluid thankYou text-center"><h1>Thank you for your purchase!</h1></div>

	<div class = "container-fluid" id="header">

		<!-- Nav links -->
		<img src="images/logomain.png" class="img-fluid mx-auto d-block" id="toplogo">

		<div class = "container" id = "navbar">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="catalog.php">Shop</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="demo.php">Demo</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="reviews.php">Reviews</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="about.php" style="margin-right: 2vw">About</a>
		  </li>

		  <li class="nav-item">

		  	<!-- Show username button if logged in -->
		  <?php 

		  	// If logged in, show username instead of login button
		  	if(isset($_SESSION['user'])) {
		  		echo '<button type="button" class="btn btn-outline-dark" id="loggedinLogout">'.$_SESSION['user'].'</button>';
		  	} else {
		  		echo '<button type="button" class="btn btn-dark" id="loginbutton">Login &#8964;</button>';
		  	}

		  ?>
		</li>
		</ul>
	</div> <!-- End class = container -->
	</div> <!-- End class = container-fluid -->

	<img src = "images/scufps4.png">

</body>



<script type="text/javascript" language="javascript" src="js/purchase.js"></script>    

</html>