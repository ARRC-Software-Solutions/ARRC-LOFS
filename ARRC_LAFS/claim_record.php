<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: \MyProjects\ARCprojects\ARRCLogin\index.php');
    exit();
}


$servername = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'db_lafts';
$port=3306;
$native_pass ='mysql_native_password';


try {
$conn = new PDO("mysql:host={$servername}; port={$port}; auth_plugin={$native_pass}; dbname={$dbname}", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOFS</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a href="admin_page.php"><img src="assets/ARRC.png" alt="logo" width=200 height=75 ></a></h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="generate_pds.php">Produce Report</a>
                        </li>
                        <li>
                            <a href="overview.php">Overview</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="search.php">Search</a>
                </li>   
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transactions</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="item_record.php">Record Lost Item</a>
                        </li>
                        <li>
                            <a href="claim_record.php">Record Claim</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="\Myprojects\ARCprojects\guard_registration\index.php">Register User</a>
                        </li>
                        <li>
                        <a href="\Myprojects\ARCprojects\ARRCLogin\changeCredentials.php">Change username/password</a>
                        </li>
                    </ul>
                </li>
                
                <!-- <li>
                    <a href="#">Contact</a>
                </li> -->
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                       
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="\MyProjects\ARCprojects\ARRCLogin\logout.php" name=logout onclick="return confirm('Are you sure to logout?');"><img src="assets/logoutbtn.png" alt="icon" width=24 height=24 style="margin-right:"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <form action='claim_record.php' method='post'>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputID">Claimant ID Number</label>
                <input type="type" name="claimant_id" class="form-control" id="inputID" placeholder="e.g. 2018123456" required>
                <label for="itemID">Item ID Number</label>
                <input type="type" name="item_ID" class="form-control" id="itemID" value="<?php if(isset($_REQUEST['item_ID'])){
                    echo $_REQUEST['item_ID'];
                }else{
                    echo "";
                } ?>" placeholder="e.g. 20201111" required>
                </div>
                <div class="form-group col-md-6">
                <label for="inputFClaimant">First Name</label>
                <input type="text" name="firstN" class="form-control" id="inputClaimant" required>
                <label for="inputLClaimant">Last Name</label>
                <input type="text" name="lastN" class="form-control" id="inputClaimant" required>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>
    
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
    
    <?php
    
    
        if(isset($_POST['submit'])){
            $claimant_ID = $_POST['claimant_id'];
            $item_id = $_POST['item_ID'];
            $first_name = $_POST['firstN'];
            $last_name = $_POST['lastN'];
            date_default_timezone_set("Asia/Manila");
            $date_claimed = date("Y/m/d");
            $time_claimed = date("h:ia");
            $item_status = true;
            $conn=mysqli_connect("localhost","root","1234","db_lafts");
            $check = mysqli_query($conn, "SELECT * FROM tb_claimant");
            $status = mysqli_query($conn, "SELECT * FROM tb_item WHERE item_status = 0");
            
            if ($check->num_rows){
                
                while($row = $check->fetch_assoc()){
                    while($row2 = $status->fetch_assoc()){
                        echo $row2['item_status'];
                        if ($row2['item_status'] == 0){
                            
                            if ($row['Claimant_ID'] == $claimant_ID){
                                $update_sql = "UPDATE tb_item 
                                SET item_dateClaimed = '$date_claimed', item_timeClaimed = '$time_claimed', claimant_ID = '$claimant_ID', item_status= '$item_status' 
                                WHERE item_ID = $item_id";
                                
                                if ($conn->query($update_sql)== TRUE){
                                    "<script type='text/javascript'>
                                        alert('updated');
                                        
                                    </script>";
                                
                                }
                                if ($conn->query($update_sql)== TRUE){
                                    echo "updated";
                                }
                            break;
                                
                            }else{
                                echo "hit2";
                                $sql = "INSERT INTO tb_claimant (Claimant_ID, first_name, last_name) 
                                VALUES ('$claimant_ID', '$first_name', '$last_name')";
                                
                                $update_sql = "UPDATE tb_item 
                                SET item_dateClaimed = '$date_claimed', item_timeClaimed = '$time_claimed', claimant_ID = '$claimant_ID', item_status= '$item_status' 
                                WHERE item_ID = $item_id";

                                if ($conn->query($sql) == TRUE) {
                                    output();
                                
                                    "<script type='text/javascript'>
                                        confirm('record created');
                                        
                                    </script>";
                                    
                                } 
                                else {
                                    echo "Error: " . $sql . "<br>";
                                }
                                if ($conn->query($update_sql)== TRUE){
                                    echo "updated";
                                }
                            break;
                            }
                        }else{
                        
                            echo "<script type='text/javascript'>
                            alert('already claimed');
                            
                        </script>";
                            
                    break;
                            
                            
                           
                        }
                    }
                }
            }else{
                $sql = "INSERT INTO tb_claimant (Claimant_ID, first_name, last_name) 
                        VALUES ('$claimant_ID', '$first_name', '$last_name')";
                        
                        $update_sql = "UPDATE tb_item 
                        SET item_dateClaimed = '$date_claimed', item_timeClaimed = '$time_claimed', claimant_ID = '$claimant_ID', item_status= '$item_status' 
                        WHERE item_ID = $item_id";

                        if ($conn->query($sql) == TRUE) {
                            output();
                            echo "hit";
                        } 
                        else {
                            echo "Error: " . $sql . "<br>";
                        }
                        if ($conn->query($update_sql)== TRUE){
                            echo "updated";
                        }
                    
                echo "no rows were returned";
            
            }
			
        }
        function output(){
            echo "<script type='text/javascript'>
                        console.log('record created');
                        
                </script>";
            
        }

    ?>
</body>

</html>