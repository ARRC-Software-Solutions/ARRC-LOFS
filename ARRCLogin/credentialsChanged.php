<?php
session_start();
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "1234";
$dbname = "db_lafts";

$newPassword = md5($_POST['newPassword']);
$username = $_POST["username"];



if(!isset($_POST['username'])){
    $_SESSION['message'] = "Change Credentials";
}
else{


// Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "UPDATE tb_security SET password = '$newPassword' WHERE Username =  '$username'";

    if ($conn->query($sql) == true) {
        $_SESSION['message'] = "Success";
    } else {
        $_SESSION['message'] = "Failed updating record. Error:" .$conn->error;
    }
    $conn->close();
}


?>

<?php
// session_start();
// $_SESSION['message'] = 'Welcome!';
// // Change this to your connection info.
// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '1234';
// $DATABASE_NAME = 'db_lafts';
// // Try and connect using the info above.
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//     if (mysqli_connect_errno()) {
//         // If there is an error with the connection, stop the script and display the error.
//         // die ('Failed to connect to MySQL: ' . mysqli_connect_error());
//         $_SESSION['message'] =('Failed to connect to MySQL: ' . mysqli_connect_error());
//     }
//     // Now we check if the data from the login form was submitted, isset() will check if the data exists.

//     // if ( !isset($_POST['username'], $_POST['password']) ) {
//     // 	// Could not get the data that should have been sent.
//     // 	// die ('Please fill both the username and password field!');
//     // 	$_SESSION['message'] = "Please fill both the username and password field!";
//     // }

//     // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
//     if ($stmt = $con->prepare('SELECT security_ID, password FROM tb_security WHERE Username = ?')) {
//         // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
//         $stmt->bind_param('s', $_POST['username']);
//         $stmt->execute();
//         // Store the result so we can check if the account exists in the database.
//         $stmt->store_result();
    
//         if ($stmt->num_rows > 0) {
//             $stmt->bind_result($id, $password);
//             $stmt->fetch();
//             // Account exists, now we verify the password.
//             // Note: remember to use password_hash in your registration file to store the hashed passwords.
//             if (md5($_POST['password'])== $password) {
//                 exit;
//                 // Verification success! User has loggedin!
//                 // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
//                 // session_regenerate_id();
//                 // $_SESSION['loggedin'] = true;
//                 // $_SESSION['name'] = $_POST['username'];
//                 // $_SESSION['id'] = $id;
//                 //header('Location: \MyProjects\ARCprojects\ARRC_LAFS\admin_page.php');
//                 $newPassword = md5($_POST['newPassword']);
//                 $username = $_POST["username"];

//                 $sql = "UPDATE tb_security SET password ='$newPassword' WHERE username='$username'";

//                 if ($conn->query($sql) === TRUE) {
//                     $_SESSION['message'] = "asdasd";
//                   //  echo "Record updated successfully";
//                 } else {
//                     $_SESSION['message'] = "error";
//                     //echo "Error updating record: " . $conn->error;
//                 }
                
//                 $conn->close();
//             } else {
//                 // echo 'Incorrect password!';
//                 $_SESSION['message'] = "Incorrect Password";
//             }
//         } else {
//             // echo 'Incorrect username!';
//             $_SESSION['message'] = "Incorrect Username";
//         }

//         $stmt->close();
//     }
// }
?>


<?php
// session_start();
// $id = $_SESSION["id"];/* userid of the user */
// $con = mysqli_connect('localhost','root','1234','db_lafts') or die('Unable To connect');
// if(count($_POST)>0) {
// $result = mysqli_query($con,"SELECT * from tb_security WHERE name='" . $id . "'");
// $row=mysqli_fetch_array($result);
// if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
// mysqli_query($con,"UPDATE student set password='" . $_POST["newPassword"] . "' WHERE name='" . $id . "'");
// $message = "Password Changed Sucessfully";
// } else{
//  $message = "Password is not correct";
// }
// }
?>



<!DOCTYPE html>
<html>
	<head>
        <link rel="icon" href="assets/ARRC-A.png" type="image/ico">
		<meta charset="utf-8">
		<title>Change Credentials</title>
	
				<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
				<link href="style.css" rel="stylesheet" type="text/css">
				</head>
				<body>

				<script src="bootstrap/js/bootstrap.min.js"></script>
				<div class="login">

				<form action="changeCredentials.php" method="post">

				<div class="alert alert"> <?= $_SESSION['message']?> </div>
				<label for="username">
				<i class="fas fa-user"></i>
				</label  >
				<input type="text" name="username" placeholder="Old Username" id="username" >
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Old Password" id="password" >
				<input type="text" name="newUsername" placeholder="New Username" id="nUsername" >
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="newPassword" placeholder="New Password" id="nPassword" >
				<input type="submit" value="Submit">
				<button class = "btn" type="Submit" formaction= "\Myprojects\ARCprojects\ARRC_LAFS\admin_page.php">Back</button>
			</form>
		
		</div>
	</body>
</html>