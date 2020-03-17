// Write on keyup event of keyword input element
$(document).ready(function(){
    $("#search").keyup(function(){
    _this = this;
    
    // Show only matching TR, hide rest of them
    $.each($("#myTable tbody tr"), function() {
    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
    {  
        $(this).hide();
    }
    else
    {
        $(this).show();
    }
    });
});
});

$(document).ready(function(){

    // Number of rows selection
    $("#num_rows").change(function(){

        // Submitting form
        $("#form").submit();

    });
});

