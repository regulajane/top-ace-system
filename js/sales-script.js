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

    $('.sales #salemodel').typeahead({
        name: 'salemodel',
        remote:'includes/data-processors/searchmodel.php?key=%QUERY',
        limit : 8
    });

    $('.sales #salename').typeahead({
        name: 'salename',
        remote:'includes/data-processors/searchinv.php?key=%QUERY',
        limit : 8
    });
}

function navbar(){
    var activeEl = 2;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}