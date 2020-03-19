<?php
## Database configuration
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
$res = true;
## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (item_ID like '%".$searchValue."%' or 
        item_Type like '%".$searchValue."%' or 
        item_desc like'%".$searchValue."%' or
        item_place like'%".$searchValue."%' or
        item_dateFound like'%".$searchValue."%' or
        item_timeFound like'%".$searchValue."%' or
        item_security like'%".$searchValue."%' or
        item_semester like'%".$searchValue."%' or
        item_status like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tb_item");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel2 = mysqli_query($conn,"SELECT COUNT(*) as allcount2 FROM tb_item WHERE 1 ".$searchQuery."");
$records2 = mysqli_fetch_assoc($sel2);
$totalRecordwithFilter = $records2['allcount2'];


## Fetch records
$empQuery = "select * from tb_item WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();


while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "item_ID"=>$row['item_ID'],
      "item_Type"=>$row['item_Type'],
      "item_place"=>$row['item_place'],
      "item_desc"=>$row['item_desc'],
      "item_dateFound"=>$row['item_dateFound'],
      "item_timeFound"=>$row['item_timeFound'],
      "item_security"=>$row['item_security'],
      "item_semester"=>$row['item_semester'],
      "item_status"=> $row['item_status'] 
   );
   

}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);