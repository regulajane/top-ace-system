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

     $('#newSupplyForm').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            modelno: {
                validators: {
                    notEmpty: {
                        message: 'Model no. is required'
                    }
                }
            },
            inventoryname: {
                validators: {
                    notEmpty: {
                        message: 'Item name is required'
                    }
                }
            },
            inventoryquantity: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required'
                    }
                }
            },
            inventoryprice: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    },
                    regexp: {
                        regexp: /^[0-9, .]+$/,
                        message: 'Please enter a valid price.'
                    }
                }
            },
            reorderlevel: {
                validators: {
                    notEmpty: {
                        message: 'Reorder level is required'
                    }
                }
            }
        }
    });

    $('#supplyForm2').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            inventQtyAdded: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required'
                    }
                }
            }
        }
    });

    $('#supplyForm3').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            inventQtyProcured: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required'
                    }
                }
            },
            choice: {
                validators: {
                    notEmpty: {
                        message: 'Reason is required'
                    }
                }
            }
        }
    });

    $('#editsupplyform').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            modelno: {
                validators: {
                    notEmpty: {
                        message: 'Model no. is required'
                    }
                }
            },
            inventName: {
                validators: {
                    notEmpty: {
                        message: 'Item name is required'
                    }
                }
            },
            inventPrice: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+./,
                        message: 'Please enter a valid value'
                    }
                }
            },
            inventRL: {
                validators: {
                    notEmpty: {
                        message: 'Reorder level is required'
                    }
                }
            }
        }
    });
    
    $('.newSupply #modelno').typeahead({
        name: 'modelno',
        remote:'includes/data-processors/searchmodel.php?key=%QUERY',
        limit : 10
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
                var rl = inventoryData.reorderlevel;
                // Add Quantity Form
                $(".addProcSup #inventID").val(inventID);
                $(".addProcSup #modelNum").val(modelNum);
                $(".addProcSup #inventName").val(inventName); 
                $(".addProcSup #inventSize").val(inventSize);
                $(".addProcSup #inventPrice").val(inventPrice);
                $(".addProcSup #inventQty").val(inventQty);
                $(".addProcSup #rl").val(rl);

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