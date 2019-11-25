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

    <link rel="stylesheet" type="text/css" href="css/catalog.css"> 

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> <!-- Google font -->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
    
</head>


<body>

	<!-- Continue session from home page -->
		<?php 
			session_start();

			if(isset($_GET['logout'])) {
				$_SESSION['user'] = null;
				$_SESSION['password'] = null;
			}
		?>


	<div class = "mainbg">
	<div class = "container-fluid" id="header">

		<!-- If user has unsuccessful login -->
		<?php 
			if($_SESSION['failedlogin'] == TRUE) {
				echo '<div class="container-fluid" style="padding-top: 2vw">';
				echo '<div class="alert alert-danger">
  						<strong>Login failed!</strong> User not found or incorrect password.
					</div>';
				echo '</div>';
				$_SESSION['failedlogin'] = FALSE;
			}

		?>

		<!-- Nav links -->
		<img src="images/logomain.png" class="img-fluid mx-auto d-block" id="toplogo">

		<div class = "container" id = "navbar">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" href="catalog.php">Shop</a>
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

		<br/>
		<!-- Login bar, shown after clicking login button or 'login instead' -->
		<div class = "row justify-content-center" id='loginBar'>
			
		<form action="login_signup.php" method="post" id="login">
		  <div class="form-row">
		    <div class="form-group col-5">
		      <label for="inputUser">Username</label>
		      <input type="text" name="usernameLogin" class="form-control" id="inputUser" placeholder="Username">
		    </div>
		    <div class="form-group col-5">
		      <label for="inputPassword">Password</label>
		      <input type="password" name="passwordLogin" class="form-control" id="inputPassword" placeholder="Password">
		    </div>
		    <div class="form-group col-2 align-self-end">
		    <button type="submit" name="submitLogin" class="btn btn-dark signup" id="signupOrLogin">Log in</button>
			</div>
		  </div>
			</form>
		</div>

		<!-- Logout and profile div -->
		<div class = "justify-content-center" id='logoutDiv'>
			<div class="row justify-content-center">
				<?php echo '<h4 style="color: white; border-bottom: 1px solid white">'.$_SESSION['user'].'</h4>'; ?>
				<br/>
			</div>
			<div class="row justify-content-center" id="profilelogout">
				<form action="login_signup.php" method="post" id="profileLogout">
				
		    		<button type="submit" name="profile" class="btn btn-light" id="profileButton">Profile</button>
		    	
					<button type="submit" name="logout" class="btn btn-danger signup" id="logoutButton">Logout</button>
				
				</form>
			</div>

		</div>

	</div> <!-- End class = container -->
	</div> <!-- End class = container-fluid -->

	<br/><br/>

	<?php 

	$paymentform = '<form action="login_signup.php" method="post">
 			<div class="form-row">
    			<div class="col-7">
     				<input type="text" class="form-control" placeholder="Credit Card # (xxxx-xxxx-xxxx-xxxx)">
   				</div>
    			<div class="col">
      				<input type="text" class="form-control" placeholder="Exp Data">
    			</div>
    			<div class="col">
      				<input type="text" class="form-control" placeholder="CVV">
    			</div>
  			</div>
			</form>';

	?>

	<!-- Body/main content -->
	<div class="container-fluid" id="allcontrollers">
		<div class="row" id="ps4bg">
			<div class="row">
			<div class="col">
				<img src="images/ps4.png" class="img-fluid mx-auto d-block" id="ps4controller">
			</div>
		</div>
		
		<div class="container mx-auto d-block text-center">
		<div class="row">
			<div class="col">
				<h4 align="center" id="choose">Choose your controller</h4>
			</div>
		</div>
		<div class="row">
	
			<div class="col">
				<img src="images/ps4/ps4-1.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$159.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-primary buyps4" align="center">Buy</button>
				</div>
				</div>
			</div>
			<div class="col">
				<img src="images/ps4/ps4-2.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$159.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-primary buyps4" align="center">Buy</button>
				</div>
				</div>
			</div>
		</div> <!-- End first row of controllers -->
		<div class="row">

			<div class="col">
				<img src="images/ps4/ps4-3.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$179.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-primary buyps4" align="center">Buy</button>
				</div>
				</div>
			</div>	
			<div class="col">
				<img src="images/ps4/ps4-4.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$179.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-primary buyps4" align="center">Buy</button>
				</div>
				</div>
			
				
			</div>
		</div> <!-- End second row of controllers -->

		<div class="paymentps4">
			<!-- When buy is clicked, animate a payment form in -->
			<br/><br/>
			<?php echo $paymentform; ?>
			<br/>
			<a class="btn btn-success" href="purchase.php" role="button">Buy</a>
		</div>

		</div> <!-- End container mx-auto d-block text-center -->
		</div> <!-- End ps4 content -->

		<!-- Begin xbox one content -->
		<div class="row" id="xboxonebg">
			<div class="row">
			<div class="col">
				<img src="images/xo.png" class="img-fluid mx-auto d-block" id="xboxonecontroller">
			</div>
		</div>
		
		<div class="container mx-auto d-block text-center">
		<div class="row">
			<div class="col">
				<h4 align="center" id="choose">Choose your controller</h4>
			</div>
		</div>
		<div class="row">
	
			<div class="col">
				<img src="images/xbox1/xbox1-1.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$159.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-light buyxbox" align="center">Buy</button>
				</div>
				</div>
			</div>
			<div class="col">
				<img src="images/xbox1/xbox1-2.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$159.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-light buyxbox" align="center">Buy</button>
				</div>
				</div>
			</div>
		</div> <!-- End first row of controllers -->
		<div class="row">

			<div class="col">
				<img src="images/xbox1/xbox1-3.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$179.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-light buyxbox" align="center">Buy</button>
				</div>
				</div>
			</div>
			<div class="col">
				<img src="images/xbox1/xbox1-4.png" class="img-fluid mx-auto d-block">
				<div class="row">
				<div class="col-6">
					<p align="right">$179.99</p>
				</div>
				<div class="col-6" align="left">
					<button type="button" class="btn btn-light buyxbox" align="center">Buy</button>
				</div>
				</div>

				
			</div>
		</div> <!-- End second row of controllers -->

		<div class="paymentxbox">
			<!-- When buy is clicked, animate a payment form in -->
			<br/><br/>
			<?php echo $paymentform; ?>
			<br/>
			<a class="btn btn-success" href="purchase.php" role="button">Buy</a>
		</div>

		</div> <!-- End container mx-auto d-block text-center -->
		</div> <!-- End xbox1 content -->

		<div class="row" id="customizebg">
			<div class="col text-center">
			
				<h3>Customize feature coming soon!</h3>
					
			</div>	
		</div> <!-- End class = customize row -->
		
	
	</div> <!-- End class = container-fluid -->


</body>



<script type="text/javascript" language="javascript" src="js/catalog.js"></script>    

</html>

