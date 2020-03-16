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
    <link rel="icon" href="ARRC_LAFS/ARRC-A.png" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>LOFS</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
                <h3><a href="admin_page.php"><img src="ARRC.png" alt="logo" width=200 height=75 ></a></h3>
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
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="\MyProjects\ARCprojects\ARRCLogin\logout.php" name=logout onclick="return confirm('Are you sure to logout?');"><img src="logoutbtn.png" alt="icon" width=24 height=24 style="margin-right:"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <form class="form-inline my-2 my-lg-0">
            <input size="110" class="form-control mr-sm-2" type="search" id="myInput" onkeyup="myFunction()" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <script>
                function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[i];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
                }
            </script>
            </form>
            <section>
                <div>
                    <!-- <table class="table-responsive table table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px;"><a href="search.php?sort=item_id">Item ID</a></th>
                                <th style="width:20px;"><a href="search.php?sort=item_Type">Item Type</a></th>
                                <th style="width:20px;">Place</th>
                                <th style="width:20px;">Item Description</th>
                                <th style="width:20px;">Date Found</th>
                                <th style="width:20px;">Time Found</th>
                                <th style="width:20px;">Security Guard</th>
                                <th style="width:20px;">Semester</th>
                                <th style="width:20px;">Claimant ID</th>
                                <th style="width:20px;">Item Status</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                           
                                
                            $conn = mysqli_connect("localhost", "root", "1234", "db_lafts");
                        
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }else{
                                echo "connected";
                            }
                            
                            
                            $columns = array('item_ID','item_Type','item_room_no');
                            
                            // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
                            $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                            
                            // Get the sort order for the column, ascending or descending, default is ascending.
                            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                            
                            if ($result = $conn->query('SELECT * FROM tb_item ORDER BY ' .  $column . ' ' . $sort_order)) {
                                // Some variables we need for the table.
                                $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                                $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                                $add_class = ' class="highlight"';
                            ?>
                        </tbody>
                    </table> -->
                    <table class="table-responsive table table-hover" id="myTable">
                        <tr>
                            <th><a href="search.php?column=item_ID&order=<?php echo $asc_or_desc; ?>">Item ID<i class="fas fa-sort<?php echo $column == 'item_ID' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_Type&order=<?php echo $asc_or_desc; ?>">Type<i class="fas fa-sort<?php echo $column == 'item_Type' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_room_no&order=<?php echo $asc_or_desc; ?>">Place<i class="fas fa-sort<?php echo $column == 'item_room_no' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td<?php echo $column == 'item_ID' ? $add_class : ''; ?>><?php echo $row['item_ID']; ?></td>
                            <td<?php echo $column == 'item_Type' ? $add_class : ''; ?>><?php echo $row['item_Type']; ?></td>
                            <td<?php echo $column == 'item_room_no' ? $add_class : ''; ?>><?php echo $row['item_room_no']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>

            </section>  
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
<?php
	$result->free();
}
?>