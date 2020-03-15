<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: \MyProjects\ARCprojects\ARRCLogin\index.php');
    exit();


}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="ARRC_LAFS/assets/ARRC-A.png" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LOFS</title>
    

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="\Myprojects\ARCprojects\ARRC_LAFS\bootstrap-4.4.1-dist\css\bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">

    <script src="\Myprojects\ARCprojects\ARRC_LAFS\bootstrap-4.4.1-dist\js\bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a href="admin_page.php"><img src="ARRC.png" alt="logo" width=200 height=75></a></h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="tables.php">Tables</a>
                        </li>
                        <li>
                            <a href="overview.php">Overview</a>
                        </li>
                        <li>
                            <a href="#">Details</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="search.php">Search</a>
                    
                </li>   
                <!-- <li>
                    <a href="transactions.php">Transactions</a>
                </li> -->
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
                            <a href="\Myprojects\ARCprojects\guard_registration\index.php">Create Account</a>
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
                        <span><img src="ARRC-A.png" alt="logo" width=24 height=24></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <form method="post">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="\MyProjects\ARCprojects\ARRCLogin\logout.php" name=logout onclick="return confirm('Are you sure to logout?');"><img src="logoutbtn.png" alt="icon" width=24 height=24 style="margin-right:20"></a>
                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
            </nav>

            
        </div>
    </div>

    
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
    
    
</body>

</html>