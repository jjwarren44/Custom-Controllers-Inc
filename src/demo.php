<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>  
        <script src="https://www.w3schools.com/lib/w3.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script> <!-- Scroll reveal package -->  
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/demo.css">

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

                ?>
                
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
                            <a class="nav-link active" href="demo.php">Demo</a>
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
            <div class = "container-fluid">
                <div class = "row" id="firsttext">
                    <br/>
                    <h3 align="center">If you would like to try out the large variety of controllers that we offer before making a purchase you can stop by one of our locations marked on the map below.</h3>
                    <br/>
                </div>                
                <div class="row">
                    <div class="col-md" id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11807.17834224442!2d-85.62055985472998!3d42.282908042186264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x881777dad902ac83%3A0xd5457ea7c4d6b8cc!2sWestern+Michigan+University%2FKRPH%2C+Kalamazoo%2C+MI!5e0!3m2!1sen!2sus!4v1552254107356" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script type="text/javascript" language="javascript" src="js/demo.js"></script>    
    
</html>

