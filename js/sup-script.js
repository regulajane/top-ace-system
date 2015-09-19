window.onload = function () { supplies(); }
function supplies(){
	// supplies table
	$("#suppliesTable").bootgrid({
	    ajax: true,
	    url: "data-servers/supplies-server.php",
	    selection: true,
	    rowSelect: true
	});
	// add
	$("#addsupplybtn").on("click", function() {
        var selectedItemArray = $("#suppliesTable").bootgrid("getSelectedRows");
        var selectedItem = parseInt(selectedItemArray) + 0;
        if(! selectedItem){
            alert("Please select an item.");
            location.reload();
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processSupplyajax.php",
            data: {selectedItem: selectedItem},
            success: function(data) {
                
                supData = JSON.parse(data);
                // set supply variables
                var supNo = supData.supplyNo;
                var supItem = supData.item;
                var supDesc = supData.description;
                var supQty = supData.quantity;
                var supID = supData.supplyID;
                // Add/Procure Form
                $(".addProcSup #supplyName").val(supItem); 
                $(".addProcSup #supdescription").val(supDesc);
                $(".addProcSup #supID").val(supID);
            }
        });           
    });
	// procure
    $("#procuresupplybtn").on("click", function() {
        var selectedItemArray = $("#suppliesTable").bootgrid("getSelectedRows");
        var selectedItem = parseInt(selectedItemArray) + 0;
        if(! selectedItem){
            alert("Please select an item.");
            location.reload();
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processSupplyajax.php",
            data: {selectedItem: selectedItem},
            success: function(data) {
                
                supData = JSON.parse(data);
                // set supply variables
                var supNo = supData.supplyNo;
                var supItem = supData.item;
                var supDesc = supData.description;
                var supQty = supData.quantity;
                var supID = supData.supplyID;
                // Add/Procure Form
                $(".addProcSup #supplyName").val(supItem); 
                $(".addProcSup #supdescription").val(supDesc);
                $(".addProcSup #supID").val(supID);
                if(supQty > 0) {
                    $('#procSuppliesModal').modal('show');
                } else
                    alert("Supply not available.");
            }
        });           
    });
}