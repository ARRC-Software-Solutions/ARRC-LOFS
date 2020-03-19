<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "1234", "db_lafts");  
      $result = mysqli_query($connect,  "SELECT * FROM tb_item WHERE item_status=0 ORDER BY item_dateFound DESC");  

      while($row = $result->fetch_assoc())  
      {       
      $output .= '<tr>  
                          <td>'.$row["item_ID"].'</td>  
                          <td>'.$row["item_Type"].'</td>  
                          <td>'.$row["item_place"].'</td>  
                          <td>'.$row["item_desc"].'</td>  
                          <td>'.$row["item_dateFound"].'</td>  
                          <td>'.$row["item_timeFound"].'</td>  
                          <td>'.$row["item_security"].'</td>  
                          <td>'.$row["item_semester"].'</td>  
                          <td>'.$row["item_status"].'</td>  

                    </tr>  
                          ';  
      }  
      return $output;  
    
    $connect->close();
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf_min/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 9);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">MCM Security Office Lost and Found Report</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="10%">ID</th>  
           <th>Type</th>  
           <th>Place Found</th>  
           <th>Item Description</th>  
           <th width="13%">Date Found</th>  
           <th>Time Found</th>  
           <th width="13%">Security Guard in Duty</th>  
           <th>Semester</th>  
           <th>Status</th>  
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>MCM Security Office Lost and Found Report</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:750px;">  
                <h3 style= "align: center">REPORT</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th>Type</th>  
                               <th>Place Found</th>  
                               <th>Item Description</th>  
                               <th width="15%">Date Found</th>  
                               <th>Time Found</th>  
                               <th>Security Guard in Duty</th>  
                               <th>Semester</th>  
                               <th>Status</th>  
                                

                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  