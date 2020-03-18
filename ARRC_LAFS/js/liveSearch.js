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

$("#read").click(function() {

    if($("#read").val()==0)
    {
     $("#read").val(1);
    }
    else
    {
     $("#read").val(0);
    }
    console.log($("#read").val());
    
});

