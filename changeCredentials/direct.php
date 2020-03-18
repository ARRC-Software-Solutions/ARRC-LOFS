<link rel="stylesheet" href="form.css" type="text/css">
<title>ChangeCredentials</title>
<center>
<?php
session_start();
$_SESSION["message"] = "";


$password = md5($_POST['password']);

$newPassword = md5($_POST['newPassword']);

$username = $_POST['username'];


if ( !empty($newPassword) ||  !empty($password)) {

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "1234";
    $dbname = "db_lafts";
    
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
    
        if ($stmt = $conn->prepare('SELECT security_ID, password FROM tb_security WHERE Username = ?')) {
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
                    //session_regenerate_id();
                   // exit;
        
                    $sql = "UPDATE tb_security SET password='$newPassword' WHERE username= '$username' AND password = '$password'";

                    if ($conn->query($sql) === TRUE) {
                        $_SESSION["message"] = "Record updated successfully!";
                      //  echo "Record updated successfully";
                    } else {
                        $_SESSION["message"] =  "Error updating record! Error: " . $conn->error;
                       // echo "Error updating record: " . $conn->error;
                    }

                    //header('Location: \MyProjects\ARCprojects\ARRC_LAFS\admin_page.php');
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


        
        $conn->close();


    }

} else {
 echo "All field are required";
 die();
}
?>


<br><br><br><br><br>
<link rel="stylesheet" href="form.css" type="text/css">
<h1><b> Change credentials </b></h1>

<div class="alert alert-success1"> <?= $_SESSION['message']?> </div>

<button class="btn btn-block1 btn-primary"  onclick="window.location.href = '/Myprojects/ARCprojects/ARRC_LAFS/admin_page.php'">Back</button>
    </center>

    