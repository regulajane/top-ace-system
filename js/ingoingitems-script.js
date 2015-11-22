window.onload = function () { 
	supplies(); 
	var activeEl = 3;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');}
    
function supplies(){
	// INVENTORY TABLE
	$("#inItemsTable").bootgrid({
	    ajax: true,
	    url: "data-servers/ingoingitems-server.php",
	    selection: true,
	    rowSelect: true,
	});
}