window.onload = function () { supplies(); }
function supplies(){
	// INVENTORY TABLE
	$("#outItemsTable").bootgrid({
	    ajax: true,
	    url: "data-servers/outgoingitems-server.php",
	    selection: true,
	    rowSelect: true,
	});
}