<?php require_once('config.php');

	try {

		session_start();
	//check if they are logging in
		if(isset($_POST['submitLogin'])) {
			$username = $_POST['usernameLogin'];
			$password = $_POST['passwordLogin'];

			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// See if user exists in user database
			$sql = "SELECT username, password FROM users WHERE username='$username'";;
			$result = $pdo->query($sql);
			$resultArray = $result->fetch();

			// See if the query returned a result. If it did, log them in. If not, asking if they would like to signup
			if($result->rowCount() > 0) {

				if (password_verify($password, $resultArray['password'])) {
					// Store variables in session
				
					$_SESSION['user'] = $username;
					$_SESSION['failedlogin'] = null;
				}  else {
					$_SESSION['failedlogin'] = TRUE;
				}
				
			} else {
				$_SESSION['failedlogin'] = TRUE;
				
			}

			$pdo = null;

		} else if(isset($_POST['submitSignup'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$optin;

			// Hash password
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);

			if(isset($_POST['optin'])) {
					$optin = 'Y';
			} else {
					$optin = 'N';
			}

			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// See if user exists in user database, if so, tell them username already esists
			$sql = "SELECT username FROM users WHERE username='$username'";;
			$result = $pdo->query($sql);
			$resultArray = $result->fetch();

			// Username already taken
			if($result->rowCount() > 0) {

				$_SESSION['userexists'] = TRUE;
				
			} else {
				// Signup user after making sure their username doesnt already exsists
				$sql = "INSERT INTO users (username, password, email, address, city, state, zip, optin) VALUES ('$username', '$passwordHash', '$email', '$address', '$city', '$state', '$zip', '$optin')";
				$result = $pdo->query($sql);

				// Store variables in session
				$_SESSION['user'] = $username;

				$_SESSION['userexists'] = FALSE;

			}

			$pdo = null;

		} else if(isset($_POST['logout'])) {
			$_SESSION['user'] = null;
			$_SESSION['password'] = null;
		}

		} catch (PDOException $e) {
			die($e->getMessage());
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']);

?>