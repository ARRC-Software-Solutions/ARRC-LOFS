<?php
session_start();
$_SESSION['message'] = 'Welcome!';
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '1234';
$DATABASE_NAME = 'db_lafts';
// Try and connect using the info above.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        // die ('Failed to connect to MySQL: ' . mysqli_connect_error());
        $_SESSION['message'] =('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    // Now we check if the data from the login form was submitted, isset() will check if the data exists.

    // if ( !isset($_POST['username'], $_POST['password']) ) {
    // 	// Could not get the data that should have been sent.
    // 	// die ('Please fill both the username and password field!');
    // 	$_SESSION['message'] = "Please fill both the username and password field!";
    // }

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT security_ID, password FROM tb_security WHERE Username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (md5($_POST['password'])== $password) {
                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: \MyProjects\ARCprojects\ARRC_LAFS\admin_page.php');
            } else {
                // echo 'Incorrect password!';
                $_SESSION['message'] = "Incorrect Password";
            }
        } else {
            // echo 'Incorrect username!';
            $_SESSION['message'] = "Incorrect Username";
        }

        $stmt->close();
    }
}
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="assets/ARRC-A.png" type="image/ico">
	</head>
	<body>

		<script src="bootstrap/js/bootstrap.min.js"></script>
		<div class="login">
        <center>
		<img class="mcmLogo" src="assets/mcmLogo.png" alt="MCM Logo" height = "150px">
		<img class="mcmLogo" src="assets/ARRC-A.png" alt="MCM Logo" height = "150px">
        </center>

			<form action="index.php" method="post">

			<div class="alert alert"> <?= $_SESSION['message']?> </div>
				<label for="username">
					<i class="fas fa-user"></i>
				</label  >
				<input type="text" name="username" placeholder="Username" id="username" >
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" >
				<input type="submit" value="Login">
			</form>
		
		</div>
	</body>
</html>