window.onload = function () { supplies(); }
function supplies(){
     document.getElementById("test1").style.visibility = 'hidden';
	// INVENTORY TABLE
	$("#inventoryTable").bootgrid({
	    ajax: true,
	    url: "data-servers/inventory-server.php",
	    selection: true,
	    rowSelect: true
	});

	$("#addsupplybtn").on("click", function() {
        var selectedItemArray = $("#inventoryTable").bootgrid("getSelectedRows");
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
                
                inventoryData = JSON.parse(data);
                // set Inventory Variables
                var inventID 	= inventoryData.inventoryid;
                var modelNum    = inventoryData.modelid;
                var inventName 	= inventoryData.inventoryname;
                var inventSize 	= inventoryData.inventorysize;
                var inventPrice = inventoryData.inventoryprice;
                var inventQty	= inventoryData.inventoryquantity;
                // Add Quantity Form
                $(".addProcSup #inventID").val(inventID);
                $(".addProcSup #modelNum").val(modelNum);
                $(".addProcSup #inventName").val(inventName); 
                $(".addProcSup #inventSize").val(inventSize);
                $(".addProcSup #inventPrice").val(inventPrice);
                $(".addProcSup #inventQty").val(inventQty);
            }
        });           
    });
	// procure
    $("#procuresupplybtn").on("click", function() {
        var selectedItemArray = $("#inventoryTable").bootgrid("getSelectedRows");
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
                
                inventoryData = JSON.parse(data);
                // set Inventory Variables
                var inventID   = inventoryData.inventoryid;
                var modelNum    = inventoryData.modelid;
                var inventName  = inventoryData.inventoryname;
                var inventSize  = inventoryData.inventorysize;
                var inventPrice = inventoryData.inventoryprice;
                var inventQty   = inventoryData.inventoryquantity;

                // Add/Procure Form
                $(".addProcSup #inventID").val(inventID);
                $(".addProcSup #modelNum").val(modelNum);
                $(".addProcSup #inventName").val(inventName); 
                $(".addProcSup #inventSize").val(inventSize);
                $(".addProcSup #inventPrice").val(inventPrice);
                $(".addProcSup #inventQty").val(inventQty);

                if(supQty > 0) {
                    $('#procSuppliesModal').modal('show');
                } else
                    alert("Supply not available.");
            }
        });           
    });
    // delete
    $("#deletesupplyBtn").on("click", function() {
        var selectedItemArray = $("#inventoryTable").bootgrid("getSelectedRows");
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
                
                inventoryData = JSON.parse(data);
                // set Inventory Variables
                var inventID    = inventoryData.inventoryid;
                var inventName  = inventoryData.inventoryname;
                var inventType  = inventoryData.type;
                var inventSize  = inventoryData.size;
                var inventPrice = inventoryData.price;
                var inventQty   = inventoryData.quantity;
                // Add/Procure Form
                $(".addProcSup #inventID").val(inventID);
                $(".addProcSup #inventName").val(inventName); 
                $(".addProcSup #inventType").val(inventType);
                $(".addProcSup #inventSize").val(inventSize);
                $(".addProcSup #inventPrice").val(inventPrice);
            
                if(supQty > 0) {
                    $('#deleteSuppliesModal').modal('show');
                } else
                    alert("Supply not available.");
            }
        });           
    });


}