<link rel="stylesheet" href="form.css" type="text/css">
<title>Registration Complete</title>
<center>
<?php
$_SESSION["message"] = "";

$username = $_POST['username'];
$password = md5($_POST['password']);
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$securityID = $_POST['secID'];
$adminStatus = $_POST['admin'];


if (!empty($username) || !empty($email) ||  !empty($password)) {

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "1234";
    $dbname = "db_lafts";
    
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
    
        $rs=mysqli_query($conn,"select * from tb_security where security_ID='$securityID'");
        if (mysqli_num_rows($rs)>0)
        {
         
            header("Location: //localhost/Myprojects/ARCprojects/guard_registration/error.php");
         //   echo "<div class=alert alert-success1> </div>";
            exit;
        }

        // if (isset($adminStatus)){
        //     $adminStatus = 0;
        // }
        

    $INSERT = "INSERT Into tb_security (security_ID, Username, first_name, last_name, password, admin_status) values(?,?, ?, ?, ?, ?)";
     //Prepare statement
     
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $securityID, $username,$fName,$lName, $password, $adminStatus);
      $stmt->execute();
     $stmt->close();
     $conn->close();
     $_SESSION["message"] = "success";


    }
} else {
 echo "All field are required";
 die();
}
?>


<br><br><br><br><br>
<link rel="stylesheet" href="form.css" type="text/css">
<h1><b> User Registration </b></h1>

<div class="alert alert-success1"><?=$_SESSION["message"] ?> </div>

<button class="btn btn-block1 btn-primary"  onclick="window.location.href = '/Myprojects/ARCprojects/ARRC_LAFS/admin_page.php'">Back</button>
    </center>

    