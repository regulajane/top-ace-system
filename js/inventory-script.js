window.onload = function () { supplies(); navbar();}
function supplies(){
     document.getElementById("test1").style.visibility = 'hidden';
	// INVENTORY TABLE
	$("#inventoryTable").bootgrid({
	    ajax: true,
	    url: "data-servers/inventory-server.php",
	    selection: true,
	    rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Items"
        },
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
                var modelNum    = inventoryData.modelno;
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

     // Edit Supply 
        $("#editsupplybtn").on("click", function() {
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


                    var invId = inventoryData.inventoryid;
                    var modelNum    = inventoryData.modelno;
                    var invname = inventoryData.inventoryname;
                    var invsize = inventoryData.inventorysize;
                    var invprice = inventoryData.inventoryprice;
                    var invreorderlevel = inventoryData.reorderlevel;

                  
                    // Update 
                    $(".invEdit  #modelno").val(modelNum); 
                    $(".invEdit  #inventID").val(invId); 
                    $(".invEdit  #inventName").val(invname); 
                    $(".invEdit  #inventSize").val(invsize);
                    $(".invEdit  #inventPrice").val(invprice);
                    $(".invEdit  #inventRL").val(invreorderlevel);
                 
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
                var modelNum    = inventoryData.modelno;
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
                var inventID   = inventoryData.inventoryid;
                var modelNum    = inventoryData.modelno;
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
            
                if(inventQty = 0) {
                    $('#deleteSuppliesModal').modal('show');
                } else
                    $('#deleteSuppliesModal').modal('hide');
                    alert("ERROR: Cannot Delete Supply still has a value");

            }
        });           
    });
}

function navbar(){
    var activeEl = 3;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}