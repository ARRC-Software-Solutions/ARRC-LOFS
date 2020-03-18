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
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LOFS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="\Myprojects\ARCprojects\ARRC_LAFS\bootstrap-4.4.1-dist\css\bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">

    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>
            .chart-container {
                width: 1000px;
                height: auto;
            }
    </style>
</head>

<body>
    
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><a href="admin_page.php"><img src="assets/ARRC.png" alt="logo" width=200 height=75></a></h3>
            </div>

            <ul class="list-unstyled components">
                <p>User</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="tables.php">Produce Report</a>
                        </li>
                        <li>
                            <a href="overview.php">Overview</a>
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
                        <a href="\Myprojects\ARCprojects\changeCredentials\index.php">Change password</a>
                        </li>
                    </ul>
                </li>

          
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
                    <form method="post">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="\MyProjects\ARCprojects\ARRCLogin\logout.php" name=logout onclick="return confirm('Are you sure to logout?');"><img src="assets/logoutbtn.png" alt="icon" width=24 height=24 style="margin-right:20"></a>
                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
            </nav>

            
    <div class="row1">
    <div class="row">

        <div class="col-lg-4 col-sm-6 lg-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Items Found</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      
                      $conn = mysqli_connect("localhost", "root", "1234", "db_lafts");
                      $result = mysqli_query($conn, "SELECT count(*) as total from tb_item");
                      $data = mysqli_fetch_assoc($result);
                      echo $data['total'];
                       ?></div>
                    </div>
                  </div>
                </div>    
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-4 col-sm-6 lg-4">
              <div class="card border-left-info shadow h-100 py-3">
              <div class="callout">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Claimed Items</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                          $total = mysqli_query($conn, "SELECT count(*) as total from tb_item");
                          $result = mysqli_query($conn, "SELECT count(*) as total2 from tb_item WHERE item_status = 1");
                          $data = mysqli_fetch_assoc($result);
                          $data2 = mysqli_fetch_assoc($total);
                          $percentage = $data['total2']/100;
                          echo $final = round(($data['total2'] / $data2['total'])* 100, 2);
                           ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $final; ?>%">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-4 col-sm-6 lg-4">
              <div class="card border-left-info shadow h-100 py-3">
              <div class="callout1">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Unclaimed Item</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php 
                          $total = mysqli_query($conn, "SELECT count(*) as total from tb_item");
                          $result = mysqli_query($conn, "SELECT count(*) as total2 from tb_item WHERE item_status=0");
                          $data = mysqli_fetch_assoc($result);
                          $data2 = mysqli_fetch_assoc($total);
                          echo $final = round(($data['total2'] / $data2['total'])* 100, 2);
                       ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar"aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $final; ?>%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-lg-7" id="stats">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Items Overview</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <div class="chart-container">
                    <canvas id="mycanvas" width="711" height="260" class="chartjs-render-monitor" style="display: block; width: 711px; height: 260px;"></canvas>
                  </div>
                  </div>
                </div>
              </div>
            </div>

      </div>
        </div>
    </div>  

    
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/linegraph.js"></script>
    
    
</body>

</html>