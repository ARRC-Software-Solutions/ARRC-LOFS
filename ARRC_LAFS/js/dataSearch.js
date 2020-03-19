
$( document ).ready(function() {
	$('#myTable').DataTable({
		 "bProcessing": true,
         "serverSide": true,
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  , by default would be get
            error: function(){  // error handling code
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   
});