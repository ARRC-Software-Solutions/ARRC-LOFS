$(document).ready(function(){
$.ajax({
    url : "veri.php",
    type : "POST",
    datatype: 'json',

    success : function(data){
        console.log(data);

        var item_ID = [];
        var item_Type = [];
        var item_status = [];
        var item_dateFound = [];
    
        for(var i in data) {
            item_ID.push("ID " + data[i].item_ID);
            item_Type.push(data[i].item_Type);
            item_status.push(data[i].item_status);
            item_dateFound.push(data[i].item_dateFound);

        }

        var chartdata = {
            labels: item_status,
            datasets: [
                {
                    label: "1 = Claimed, 0 = Unclaimed",
                    
                    // backgroundColor: "rgba(59, 89, 152, 0.75)",
                    // borderColor: "rgba(59, 89, 152, 1)",
                    // pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                    // pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                    // data: item_Type
                },
                {
                    label: "Lost Items",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(29, 202, 255, 0.75)",
                    borderColor: "rgba(29, 202, 255, 1)",
                    pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
                    pointHoverBorderColor: "rgba(29, 202, 255, 1)",
                    data: item_status
                },
                
            ]
        };

        var ctx = $("#mycanvas");

        var LineGraph = new Chart(ctx, {
            type: 'pie',
            data: chartdata
        });
    },
    error : function(data) {

    }
});
});