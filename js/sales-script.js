var totalJan = 0;
var totalFeb = 0;
var totalMar = 0;
var totalApr = 0;
var totalMay = 0;
var totalJun = 0;
var totalJul = 0;
var totalAug = 0;
var totalSep = 0;
var totalOct = 0;
var totalNov = 0;
var totalDec = 0;
var Year = 0;

window.onload = function () {

    navbar();
    populateGraph(Year);

    $(document).on('change', 'select', function() {
        
        var opt = $(this).find('option:selected')[0];
        // use switch or if/else etc.*/
        Year = parseInt(opt.innerHTML);
        //window.location.href = "sales.php";
        totalJan = 0;
        totalFeb = 0;
        totalMar = 0;
        totalApr = 0;
        totalMay = 0;
        totalJun = 0;
        totalJul = 0;
        totalAug = 0;
        totalSep = 0;
        totalOct = 0;
        totalNov = 0;
        totalDec = 0;
        //Year = 0;
        populateGraph(Year);

    });

    

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
     
    //createChart();
}

function navbar(){
    var activeEl = 2;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}


function createChart(year){
    //var totalSales1 = parseInt(totalSales1);
    var headText;
    if(year == 0){
        headText = "Total Sales - per month ( Please Select A Year )";
    }else{
        headText = "Total Sales - per month ( Year "+year+")";
    }
    var chart = new CanvasJS.Chart("chartContainer",
    {
      theme: "theme1",
      title:{
        text: headText
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
        { x: new Date(year, 00, 1), y: totalJan },
        { x: new Date(year, 01, 1), y: totalFeb },
        { x: new Date(year, 02, 1), y: totalMar }, //indexLabel: "highest",markerColor: "red", markerType: "triangle"},
        { x: new Date(year, 03, 1), y: totalApr },
        { x: new Date(year, 04, 1), y: totalMay },
        { x: new Date(year, 05, 1), y: totalJun },
        { x: new Date(year, 06, 1), y: totalJul },
        { x: new Date(year, 07, 1), y: totalAug },
        { x: new Date(year, 08, 1), y: totalSep }, //indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross"},
        { x: new Date(year, 09, 1), y: totalOct },
        { x: new Date(year, 10, 1), y: totalNov },
        { x: new Date(year, 11, 1), y: totalDec }
        
        ]
      }
      
      
      ]
    });

chart.render();
}

function populateGraph(year){
    $.ajax({
            type: "POST",
            url: "includes/data-processors/processSalesGraph.php",
            success: function(data) {

                year = Year;

                salesData = JSON.parse(data);
                for(var i = 0; i < salesData.length; i++){
                    //alert(salesData[i].saledate);
                    var temp = salesData[i].saledate.split("-");
                    
                    if(temp[1] == 1 && temp[0] == year){
                        totalJan = totalJan + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 2 && temp[0] == year){
                        totalFeb = totalFeb + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 3 && temp[0] == year){
                        totalMar = totalMar + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 4 && temp[0] == year){
                        totalApr = totalApr + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 5 && temp[0] == year){
                        totalMay = totalMay + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 6 && temp[0] == year){
                        totalJun = totalJun + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 7 && temp[0] == year){
                        totalJul = totalJul + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 8 && temp[0] == year){
                        totalAug = totalAug + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 9 && temp[0] == year){
                        totalSep = totalSep + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 10 && temp[0] == year){
                        totalOct = totalOct + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 11 && temp[0] == year){
                        totalNov = totalNov + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    }
                    if(temp[1] == 12 && temp[0] == year){
                        totalDec = totalDec + parseInt(salesData[i].total);
                        //alert( salesData[i].total);
                    } 


                }
                createChart(year);
            }
        }); 
}