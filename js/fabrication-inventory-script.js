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
}

function navbar(){
    var activeEl = 3;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}