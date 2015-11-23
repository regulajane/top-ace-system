window.onload = function () { supplies(); navbar();}
function supplies(){
	// FABRICATION TABLE
	$("#fabricationTable").bootgrid({
	    ajax: true,
	    url: "data-servers/fabrication-inventory-server.php",
	    selection: true,
	    rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Items"
        },
	});
	$('.newFab #itemname').typeahead({
        name: 'itemname',
        remote:'includes/data-processors/searchfabname.php?key=%QUERY',
        limit : 10
    });
}

function navbar(){
    var activeEl = 3;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}