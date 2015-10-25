window.onload = function () { supplies(); }
function supplies(){
	// INVENTORY TABLE
	$("#inItemsTable").bootgrid({
	    ajax: true,
	    url: "data-servers/ingoingitems-server.php",
	    selection: true,
	    rowSelect: true,
	});
}