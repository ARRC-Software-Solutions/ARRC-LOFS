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
        width: 120%;
        font-size: 16px;
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
                                <a class="nav-link" href="\MyProjects\ARCprojects\ARRCLogin\logout.php" name=logout onclick="return confirm('Are you sure to logout?');"><img src="logoutbtn.png" alt="icon" width=24 height=24 style="margin-right:"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- <div class="container"> -->
                <div class="goleft">
                <input type="search" class="form-control pull-right" style="width:200%; margin-bottom: 20%;" id="search" placeholder="Type to search table...">
                </div>
                <!-- Number of rows -->
                <form method='post' action='search.php' id="form">
                    <div class="goright" >
                    
                        <span class="paginationtextfield">Number of rows:</span>&nbsp;
                        <select id="num_rows" name="num_rows">
                            <?php
                            $numrows_arr = array("5","10","25","50","100","250");
                            foreach($numrows_arr as $nrow){
                                if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow){
                                    echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                                }else{
                                    echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </form>
            <!-- </div> -->
                    
            <section>
                <div>
                    <?php
                    
                        
                    $conn = mysqli_connect("localhost", "root", "1234", "db_lafts");
                
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    
                        $row = 0;
                        $rowperpage = 3;
                        if(isset($_POST['num_rows'])){
                            $rowperpage = intval($_POST['num_rows']);

                        }
                        // Previous Button
                        if(isset($_POST['but_prev'])){
                            $row = intval($_POST['row']);
                            
                            $row -= $rowperpage;
                            
                            if( $row < 0 ){
                                $row = 0;
                            }
                            //echo $row;
                        }

                        // Next Button
                        if(isset($_POST['but_next'])){
                            $row = intval($_POST['row']);
                            $allcount = $_POST['allcount'];
                            $val = $row + $rowperpage;
                            if( $val < $allcount ){
                                $row = $val;
                            }
                        }
                    $columns = array('item_ID','item_Type','item_place', 'item_desc', 'item_dateFound', 'item_timeFound', 'item_security', 'item_semester', 'item_status');
                    
                    // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
                    $column = isset($_POST['column']) && in_array($_POST['column'], $columns) ? $_POST['column'] : $columns[0];
                    
                    // Get the sort order for the column, ascending or descending, default is ascending.
                    $sort_order = isset($_POST['order']) && strtolower($_POST['order']) == 'desc' ? 'DESC' : 'ASC';
                    $sql = "SELECT COUNT(*) AS cntrows FROM tb_item";
                    $output = mysqli_query($conn,$sql);
                    $fetchresult = $output->fetch_assoc();
                    $allcount = $fetchresult['cntrows'];
                    
                    if ($result = $conn->query("SELECT * FROM tb_item ORDER BY " .  $column . ' ' . $sort_order . " LIMIT $row, " . $rowperpage)) {
                        // Some variables we need for the table.
                        
                        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                        $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                        $add_class = ' class="highlight"';
                       
                        $res = true;
                        
                    ?>
                    
                    <table class="table-responsive-sm" id="myTable">
                        <thead>
                        <tr>
                            <th><a href="search.php?column=item_ID&order=<?php echo $asc_or_desc; ?>">Item ID <i class="fas fa-sort<?php echo $column == 'item_ID' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_Type&order=<?php echo $asc_or_desc; ?>">Type <i class="fas fa-sort<?php echo $column == 'item_Type' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_place&order=<?php echo $asc_or_desc; ?>">Place <i class="fas fa-sort<?php echo $column == 'item_place' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_desc&order=<?php echo $asc_or_desc; ?>">Item description <i class="fas fa-sort<?php echo $column == 'item_desc' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th style="padding-right:20px"><a href="search.php?column=item_dateFound&order=<?php echo $asc_or_desc; ?>">Date Found <i class="fas fa-sort<?php echo $column == 'item_dateFound' ? '=-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_timeFound&order=<?php echo $asc_or_desc; ?>">Time Found <i class="fas fa-sort<?php echo $column == 'item_timeFound' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_security&order=<?php echo $asc_or_desc; ?>">Security Guard <i class="fas fa-sort<?php echo $column == 'item_security' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_semester&order=<?php echo $asc_or_desc; ?>">Semester <i class="fas fa-sort<?php echo $column == 'item_semester' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="search.php?column=item_status&order=<?php echo $asc_or_desc; ?>">Status <i class="fas fa-sort<?php echo $column == 'item_status' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        </tr>
                        </thead>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tbody>
                        <tr>
                            <td<?php echo $column == 'item_ID' ? $add_class : ''; ?>><?php echo $row['item_ID']; ?></td>
                            <td<?php echo $column == 'item_Type' ? $add_class : ''; ?>><?php echo $row['item_Type']; ?></td>
                            <td<?php echo $column == 'item_place' ? $add_class : ''; ?>><?php echo $row['item_place']; ?></td>
                            <td<?php echo $column == 'item_desc' ? $add_class : ''; ?>><?php echo $row['item_desc']; ?></td>
                            <td<?php echo $column == 'item_dateFound' ? $add_class : ''; ?>><?php echo $row['item_dateFound']; ?></td>
                            <td<?php echo $column == 'item_timeFound' ? $add_class : ''; ?>><?php echo $row['item_timeFound']; ?></td>
                            <td<?php echo $column == 'item_security' ? $add_class : ''; ?>><?php echo $row['item_security']; ?></td>
                            <td<?php echo $column == 'item_semester' ? $add_class : ''; ?>><?php echo $row['item_semester']; ?></td>
                            <td<?php echo $column == 'item_status' ? $add_class : ''; ?>><?php if ($row['item_status'] == 0){$res = false; echo '<p style="color:red">';}else{$res=true; echo '<p style="color:blue">';}echo $converted_res = $res ? 'Claimed' : 'Unclaimed'; ?></td>
                        </tr>
                        </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
                <form method="post" action="search.php" id="form">
                    <div id="div_pagination">
                        <input type="hidden" name="row" value="<?php echo $row; ?>">
                        <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                        <input type="submit" class="button" name="but_prev" value="Previous">
                        <input type="submit" class="button" name="but_next" value="Next">
                        
                    </div>
                </form>
            </section>  
        </div>
    </div>
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/liveSearch.js"></script>
</body>

</html>
<?php
	$result->free();
}
?>