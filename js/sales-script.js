window.onload = function () {

    navbar();
    
    $("#salesTable").bootgrid({
        ajax: true,
        url: "data-servers/sales-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Sales"
        },
    });

    $("#newsalebtn").on("click", function() {
        document.getElementById('saledate').valueAsDate = new Date();
    });

    $('.sales #saleitem').typeahead({
        name: 'saleitem',
        remote:'includes/data-processors/searchitemsale.php?key=%QUERY',
        limit : 8
    });
    $('#salesForm').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            saleci: {
                validators: {
                    notEmpty: {
                        message: 'Cash invoice no. is required'
                    }
                }
            },
            saleitem: {
                validators: {
                    notEmpty: {
                        message: 'Item is required'
                    }
                }
            },
            saleqty: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required'
                    }
                }
            },
            saledate: {
                validators: {
                    notEmpty: {
                        message: 'Date is required'
                    }
                }
            }
        }
    });
     
    createChart();
}

function navbar(){
    var activeEl = 2;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}

function createChart(){
var chart = new CanvasJS.Chart("chartContainer",
    {
      theme: "theme1",
      title:{
        text: "Total Sales - per month"
      },
      animationEnabled: true,
      axisX: {
        valueFormatString: "MMM",
        interval:1,
        intervalType: "month"
        
      },
      axisY:{
        includeZero: false
        
      },
      data: [
      {        
        type: "line",
        //lineThickness: 3,        
        dataPoints: [
        { x: new Date(2012, 00, 1), y: 450 },
        { x: new Date(2012, 01, 1), y: 414},
        { x: new Date(2012, 02, 1), y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle"},
        { x: new Date(2012, 03, 1), y: 460 },
        { x: new Date(2012, 04, 1), y: 450 },
        { x: new Date(2012, 05, 1), y: 500 },
        { x: new Date(2012, 06, 1), y: 480 },
        { x: new Date(2012, 07, 1), y: 480 },
        { x: new Date(2012, 08, 1), y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross"},
        { x: new Date(2012, 09, 1), y: 500 },
        { x: new Date(2012, 10, 1), y: 480 },
        { x: new Date(2012, 11, 1), y: 510 }
        
        ]
      }
      
      
      ]
    });

chart.render();
}