<?php
    $connection = mysqli_connect('', 'root', '', 'users');
    if ( mysqli_connect_errno() )
    {
        die( mysqli_connect_error() );
    }
    if (!empty($_POST['name']) && !empty($_POST['comment']))
    {
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Reviews</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>  
        <script src="https://www.w3schools.com/lib/w3.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script> <!-- Scroll reveal package -->  
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/reviews.css">

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
                            <a class="nav-link" href="catalog.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="demo.php">Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="reviews.php">Reviews</a>
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
                <div class="row justify-content-center" id="addReview">
                    <h1>Add a review...</h1>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="addreview.php" method="post">
                            <label class="text-white">Name</label>
                            <input type="text" name="name" class="form-control"><br/>
                            <label class="text-white">Comment</label>
                            <textarea type="text" name="comment" class="form-control" rows="3"></textarea>
                            <br>
                            <input type="submit" name="submitReview" class="btn btn-dark" value="Submit ">
                        </form>
                    </div>
                </div>
                <div class="row" id="showReviews">

                    <div class="col-md-1"></div>
                    <div class="col-md-10" word-wrap>
                        <h1>Past reviews</h1>
                        <br/>
                        <?php require_once('config.php');
                        try {
                            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = 'SELECT * FROM review';   
                            $result = $pdo->query($sql);
                            //$resultArray = $result->fetch();

                            foreach($result as $row) {
                                echo '<div class="row justify-content-start" style="border-bottom: 1px solid white">';
                                    echo '<div class="col-4">';
                                        echo '<div class="row">';
                                            echo '<h2>'.$row['Name'].'</h2>';
                                        echo '</div>';
                                        echo '<div class="row">';
                                            echo '<p>'.$row['Date'].'</p>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                        echo '<div class="row">';
                                            echo '<p>'.$row['Comment'].'</p>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';

                                echo '<br/><br/>';      
                                }  

                                $pdo = null;

                            } catch (PDOException $e) {
                                die($e->getMessage());
                            }                          

                        ?>

                    </div>
                </div>
            </div>
        </body>
        
        <script type="text/javascript" language="javascript" src="js/reviews.js"></script>    
        
    </html>                            