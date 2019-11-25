<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
     <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <script src="https://unpkg.com/scrollreveal"></script> <!-- Scroll reveal package -->  

    <link rel="stylesheet" type="text/css" href="css/home.css">

     <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> <!-- Google font -->

     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
   

    
</head>

<body>

	<?php  require_once('config.php');

		session_start();

	?>
	
	<div class = "mainbg">
	
	<div class = "container-fluid" id="header">

		<!-- If user has unsuccessful login -->
		<?php 
			if($_SESSION['failedlogin'] == TRUE) {
				echo '<div class="container-fluid failedlogin" style="padding-top: 2vw">';
				echo '<div class="alert alert-danger">
  						<strong>Login failed!</strong> User not found or incorrect password.
					</div>';
				echo '</div>';
				$_SESSION['failedlogin'] = FALSE;
			}

			if($_SESSION['userexists'] == TRUE) {
				echo '<div class="container-fluid failedlogin" style="padding-top: 2vw">';
				echo '<div class="alert alert-danger">
  						<strong>Signup failed!</strong> Username already exists. Try a different one.
					</div>';
				echo '</div>';
				$_SESSION['userexists'] = FALSE;
			}

		?>

		<!-- Nav links -->
		<img src="images/logomain.png" class="img-fluid mx-auto d-block" id="toplogo">

		<div class = "container" id = "navbar">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link active" href="index.php">Home</a>
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

	<!-- Body/main content -->
	<div class = "container-fluid" id = "mainbody">
		<div class = "row" id="firsttext">
			<br/>
			<h3 align="center">Welcome to Custom Controllers Inc. where we strive to provide our customers with highest quality custom controllers. </h3>
			<br/>
		</div>

		<div class = "row" id="secondtext">
			<br/>
			<h3 align="center">Interested to what we have to offer? Head over to our catalog to select from prebuilt controllers or customly make your own. </h3>
			<br/>
		</div>

		<div class = "row" id="thirdtext">
			<br/>
			<h3 align="center">Want to try out our product before you purchase? Head to our demo page to find a demo location near you.</h3>
			<br/>
		</div>

		<br/><br/>
		<?php

		// Sign up form -->

			// If user is logged in, show them 'welcome' instead of sign up
			if(isset($_SESSION['user'])) {
				echo '<div class = "row" id="welcome">';
				echo '<div class = "col-4"> <h1 style="color: white">Welcome to Custom Controllers, '.$_SESSION['user'].'!</h1></div>';
				echo '<div class = "col-8" id = "background-controller">
				<img src = "images/scufps4.png">
				</div>';
				echo '</div>';
			} else {

				echo '<div class = "row" id="signupForm">';
					
					echo '<div class = "col-md-6">';
					echo '<h2 style="color: white; margin-left: 3vw">Sign up</h2>';
					echo '<form action="login_signup.php" method="post" id = "signup">';
				  echo '<div class="form-row">';
				    echo '<div class="form-group col-md-6">';
				      echo '<label for="inputUsername">Username</label>';
				      echo '<input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">';
				    echo '</div>';
				    echo '<div class="form-group col-md-6">';
				      echo '<label for="inputPassword4">Password</label>';
				      echo '<input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">';
				    echo '</div>';
				  echo '</div>';
				  echo '<div id=signupPart>';
				  echo '<div class="form-group">';
				    echo '<label for="inputAddress">Email</label>'; 
				    echo '<input type="text" name="email" class="form-control" id="inputEmail" placeholder="user@email.com">';
				  echo '</div>';
				  echo '<div class="form-group">';
				   echo '<label for="inputAddress2">Address</label>';
				   echo '<input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">';
				  echo '</div>';
				  echo '<div class="form-row">';
				    echo '<div class="form-group col-md-6">';
				      echo '<label for="inputCity">City</label>';
				      echo '<input type="text" name="city" class="form-control" id="inputCity">';
				    echo '</div>';
				    echo '<div class="form-group col-md-4">';
				      echo '<label for="inputState">State</label>';
				      echo '<select id="inputState" name="state" class="form-control">';
				      	// Start list of states -->
						echo '<option selected>Choose...</option>
				        <option>AL</option>
				        <option>AK</option>
				        <option>AZ</option>
				        <option>AR</option>
				        <option>CA</option>
				        <option>CO</option>
				        <option>CT</option>
				        <option>DE</option>
				        <option>FL</option>
				        <option>GA</option>
				        <option>HI</option>
				        <option>ID</option>
				        <option>IL</option>
				        <option>IN</option>
				        <option>IA</option>
				        <option>KS</option>
				        <option>KY</option>
				        <option>LA</option>
				        <option>ME</option>
				        <option>MD</option>
				        <option>MA</option>
				        <option>MI</option>
				        <option>MN</option>
				        <option>MS</option>
				        <option>MO</option>
				        <option>MT</option>
				        <option>NE</option>
				        <option>NV</option>
				        <option>NH</option>
				        <option>NJ</option>
				        <option>NM</option>
				        <option>NY</option>
				        <option>NC</option>
				        <option>ND</option>
				        <option>OH</option>
				        <option>OK</option>
				        <option>OR</option>
				        <option>PA</option>
				        <option>RI</option>
				        <option>SC</option>
				        <option>SD</option>
				        <option>TN</option>
				        <option>TX</option>
				        <option>UT</option>
				        <option>VT</option>
				        <option>VA</option>
				        <option>WA</option>
				        <option>WV</option>
				        <option>WI</option>
				        <option>WY</option>';
				      echo '</select>';
				      // End list of states -->
				    echo '</div>';
				    echo '<div class="form-group col-md-2">';
				      echo '<label for="inputZip">Zip</label>';
				      echo '<input type="text" name="zip" class="form-control" id="inputZip">';
				    echo '</div>';
				  echo '</div>';
				  echo '<div class="form-group">';
				    echo '<div class="form-check">';
				      echo '<input class="form-check-input" name="optin" type="checkbox" id="gridCheck">';
				      echo '<label class="form-check-label" for="gridCheck">';
				        echo 'Sign up for promotional offers via email';
				      echo '</label>';
				    echo '</div>';
				  echo '</div>';
				  echo '</div>';
				  echo '<button type="submit" name="submitSignup" class="btn btn-dark signup" id="signupbut">Sign up</button>';
				  echo '  ';
				  echo '<a href="#toplogo"><button type="button" class="btn btn-dark" id="loginInstead">Already have an account? Log in</button></a>';
				echo '</form>';

					echo '</div>';

					// Background controller
					echo '<div class = "col-6" id = "background-controller">';
				echo '<img src = "images/scufps4.png">';

				echo '</div>';
			}

			?>
			
		
	</div> <!-- End body/main content -->


	</div> <!-- End class = mainbg -->




</body>

<script type="text/javascript" language="javascript" src="js/home.js"></script>    

</html>

