<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: \MyProjects\ARCprojects\ARRCLogin\index.php');
    exit();
}
include 'config.php';


?>
<!DOCTYPE html>
<html>

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>LOFS</title>
   
    <link rel= "stylesheet" type="text/css" href="DataTables/datatables.min.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel= "stylesheet" type="text/css" href="DataTables/datatables.min.js" >

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    
    <style>
    
    #myTable {
        border-collapse: collapse;
        width: 100%;
        font-size: 13px;
        border:3px solid lavender;
        
    }

    #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
        
    }
    #myTable tr {
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;

    
    }
    #div_pagination{
        width:100%;
        margin-top:5px;
        text-align:center;
    }
    .button{
        border-radius:3px;
        border:0px;
        background-color:mediumpurple;
        color:white;
        padding:10px 20px;
        letter-spacing: 1px;
    }
    
    </style>
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
                        <a href="generate_pds.php">Produce Reports</a>
                        </li>
                        <li>
                            <a href="overview.php">Overview</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#">Search</a>
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
            
            <!-- <form action='search.php' method='post'>
            <div>  
                <input style='margin-top: 20px; margin-right:10px' type="checkbox" autocomplete="off" id="read" name="checks" value="0" onchange="this.form.submit()" <?php if (isset($_POST['checks'])){echo "checked='checked'";} ?>/>Show Claimed Only
            </div>
                        
           

             </form> -->
            <table id="myTable" class="display dataTable">
            <thead>
                <tr>
                <th>Item ID</th>
                <th>Type</th>
                <th>Place</th>
                <th>Item Description</th>
                <th>Date Found</th>
                <th>Time Found</th>
                <th>Security</th>
                <th>Semester</th>
                <th>Status</th>
                </tr>
            </thead>
            <script>
                        $(document).ready(function(){
                        var table =$('#myTable').DataTable({
                            'processing': true,
                            'serverSide': true,
                            'serverMethod': 'POST',
                            'idSrc' : "id",
                            'info' : true,
                            'ordering': true,
                            'scrollY': "400px",
                            'ajax': {
                                'url':'ajaxfile.php',
                                'dataSRC': ""
                            },
                            
                           

                            'columns': [
                                
                                { sTitle: "ID", data: 'item_ID' },
                                { data: 'item_Type' },
                                { data: 'item_place' },
                                { data: 'item_desc' },
                                { data: 'item_dateFound' },
                                { data: 'item_timeFound' },
                    
                                { data: 'item_security' },
                                { data: 'item_semester' },
                                
                                { data: 'item_status', mRender: function(data, type, row){
                                    return (data == 1) ? "Claimed" : "Unclaimed";
                                }},
                                
                                
                            
                                ],
                                
                               
                                "order": [[1, 'asc']]
                               
                        });
                        
                   
                        $(document).ready(function($) {
                            
                            $('a.toggle-vis').on( 'click', function (e) {
                                e.preventDefault();
                        
                                // Get the column API object
                                var column = table.column( $(this).attr('data-column') );
                        
                                // Toggle the visibility
                                column.visible( ! column.visible() );
                            });

                            $('#myTable').on('click', 'tr', function ()
                            {
                                var rows = table.rows(this).indexes();
                                var selectedData = table.cell(rows, 0).data();
                                document.location.href = "claim_record.php?item_ID=" + selectedData;
                                
                            });
                           
                        });
                        });
                    </script>
                </table>
           
                        
	
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <script src="js/sidebar.js"></script>
    <!-- <script src="js/liveSearch.js"></script>
    <script src="js/searchLink.js"></script>
    <script src="js/numRows.js"></script>
    <script src="js/dataSearch.js"></script> -->
</body>

</html>
<?php
// 	$result->free();
// }
?>