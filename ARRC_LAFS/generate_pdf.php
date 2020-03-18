
<?php
//include connection file 
include_once("connection.php");
include_once('lib/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Item Details',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('item_ID'=>'ID', 'item_Type'=> 'Item Type', 'item_place'=> 'Place','item_desc'=> 'Description', 'item_dateFound'=> 'Date Found',
'item_timeFound'=> 'Time Found', 'item_dateClaimed'=> 'Date Claimed', 'item_security'=> 'Found by', 'item_semester'=> 'Semester', 'claimant_ID'=> 'Claimant ID', 
'item_status'=> 'Status');

$result = mysqli_query($connString, "SELECT id, item_ID, item_Type, item_place, item_desc, item_dateFound, item_timeFound, 
item_dateClaimed, item_security, item_semester, claimant_ID FROM tb_item") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tb_item");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>

<?php
//include connection file 
include_once("connection.php");
include_once('lib/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Item Details',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('item_ID'=>'ID', 'item_Type'=> 'Item Type', 'item_place'=> 'Place','item_desc'=> 'Description', 'item_dateFound'=> 'Date Found',
'item_timeFound'=> 'Time Found', 'item_dateClaimed'=> 'Date Claimed', 'item_security'=> 'Found by', 'item_semester'=> 'Semester', 'claimant_ID'=> 'Claimant ID', 
'item_status'=> 'Status');

$result = mysqli_query($connString, "SELECT id, item_ID, item_Type, item_place, item_desc, item_dateFound, item_timeFound, 
item_dateClaimed, item_security, item_semester, claimant_ID FROM tb_item") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tb_item");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>