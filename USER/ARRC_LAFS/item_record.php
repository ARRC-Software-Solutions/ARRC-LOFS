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
	
	/*$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect-error){
		die("Connection Failed: " . $conn->connect_error);
	}*/
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
                <p>USER</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        
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

            <form action='item_record.php' method='post'>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputType">Type</label>
                <input type="type" class="form-control" name="type" id="inputType" placeholder="e.g. Electronics" required>
                </div>
                <div class="form-group col-md-6">
                <label for="inputRoomN">Room number</label>
                <input type="text" class="form-control" name="room_num" id="inputRoomN" placeholder="e.g. FOX4-R405" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc">Description</label>
                <input type="text" class="form-control" name="desc" id="inputDesc" required>
            </div>
            <div class="form-group">
                <label for="inputDate">Date Found</label>
                <input type="date" class="form-control" name="date_found" id="inputDate" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputSG">Security Guard</label>
                <input type="text" class="form-control" name="security" id="inputSG" placeholder="lastname" required>
                </div>
                <div class="form-group col-md-4 ">
                <label for="inputState">Semester</label>
                <div class="input-group mb-3">
                    <select class="custom-select" name="semester" id="inputGroupSelect02" required>
                        <option selected>Choose...</option>
                        <option value="1">1st SEM</option>
                        <option value="2">2nd SEM</option>
                        <option value="3">3rd SEM</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                    </div>

                </div>
                </div>
                
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            
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
        if (isset($_POST['submit'])){
			$random = mt_rand(1000, 9999);
			$id = 2020 . $random;
			
			//echo $id;
            $type = $_POST['type'];
            $room_no = $_POST['room_num'];
            $item_desc = $_POST['desc'];
            $date_found = $_POST['date_found'];
            date_default_timezone_set("Asia/Manila");
            $time_found = date("h:ia");
            $date_claimed = '00/00/0000';
            $time_claimed = date("h:ia");
            $security = $_POST['security'];
            $semester = $_POST['semester'];
            $claimant_id = 0000000000;
            $status = false;
			$sql = "INSERT INTO tb_item (item_ID, item_Type, item_place, item_desc, item_dateFound, item_timeFound, item_dateClaimed, item_timeClaimed, item_security, item_semester, claimant_ID, item_status) 
                VALUES ('$id', '$type', '$room_no', '$item_desc', '$date_found', '$time_found', '$date_claimed', '$time_claimed', '$security', '$semester', '$claimant_id', '$status')";
			
			echo "New record created successfully";
			if ($conn->query($sql) == TRUE) {
				output();
				
                
			} 
			else {
				echo "Error: " . $sql . "<br>";
			}

			//$conn->close();
			
			
		}
			
			function output(){
				echo "<script type='text/javascript'>
							console.log('record created');
							
					</script>";
				
			}
		
    ?>
</body>

</html>