window.onload = function () { 
    jobOrder();
    fabOrder();
    addOrder();

}

function fabOrder(){
    // job order table
    $("#fabricationTable").bootgrid({
        ajax: true,
        url: "data-servers/fab-order-server.php",
        selection: true,
        rowSelect: true
    });

    $("#editfabbtn").on("click", function() {
        var selectedIDArray = $("#fabricationTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        // if(! selectedID){
        //     alert("Please select an item.");
        //     location.reload();
        // } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                fabData = JSON.parse(data);
                // set JO variables
                var fabJobOrderID = fabData.joborderid;
                var fabClientLastname = fabData.cllastname;
                var fabClientFirstname = fabData.clfirstname;
                var fabClientMidInitial = fabData.clmidinitial;
                var fabDateOrdered = fabData.dateordered;      
                var fabDownpayment = fabData.downpayment;
                var fabFabricationID = fabData.fabricationid;
                var fabFabricationDescription = fabData.fabricationdesc;
                var fabFabricationQuantity = fabData.fabricationquantity;
                var fabFabricationPrice = fabData.fabricationprice;
                var fabFabricationStatus = fabData.fabstatus;
                var fabFabricationJOPrice = fabData.joprice;
 
  
                // $modelid = $_POST['modelid'];
                // $employeeid = $_POST['employeeid'];
                // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".fabEdit #receiptNo").val(fabJobOrderID);
                $(".fabEdit #dateStarted").val(fabDateOrdered);
                $(".fabEdit #client").val(fabClientLastname + ", " + fabClientFirstname + " " + fabClientMidInitial);
                $(".fabEdit #item").val(fabFabricationDescription);
                // $(".joEdit #defects").val(joDefects);
                // $(".joEdit #natureOfWorksToBeDone").val(joNOWTBD);
                // $(".joEdit #partsToBeProcured").val(joPTBP);
                // $(".joEdit #requestedBy").val(joRequestedBy);
                // $(".joEdit #vehicleNo").val(joVehicleNo);

                
                $('#editFabModal').modal('show');
                
            }
        });           
    });

}



function jobOrder(){
    // job order table
    $("#jobOrderTable").bootgrid({
        ajax: true,
        url: "data-servers/job-order-server.php",
        selection: true,
        rowSelect: true
    });

    // edit
    $("#editbtn").on("click", function() {
        var selectedIDArray = $("#jobOrderTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        // if(! selectedID){
        //     alert("Please select an item.");
        //     location.reload();
        // } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processJOajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                alert(data);
                // set JO variables
                var joJobOrderID = joData.joborderid;
                var joClientLastname = joData.cllastname
                var joClientFirstname = joData.clfirstname
                var joDateBrought = joData.datebrought;
                var joProblem = joData.problem;
                
                var joDownpayment = joData.downpayment;
                var joRequestedBy = joData.requestedBy;
                var joServices = joData.servicename;
  
		        // $modelid = $_POST['modelid'];
		        // $employeeid = $_POST['employeeid'];
		        // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".joEdit #receiptNo").val(joJobOrderID);
                $(".joEdit #problem").val(joProblem);
                $(".joEdit #dateBrought").val(joDateBrought);
                $(".joEdit #client").val(joClientLastname + ", " + joClientFirstname);
                $(".joEdit #servicesavailed").val(joServices);
				
                // $(".joEdit #defects").val(joDefects);
                // $(".joEdit #natureOfWorksToBeDone").val(joNOWTBD);
                // $(".joEdit #partsToBeProcured").val(joPTBP);
                // $(".joEdit #requestedBy").val(joRequestedBy);
                // $(".joEdit #vehicleNo").val(joVehicleNo);

                
                $('#editJoModal').modal('show');
                
            }
        });           
    });

}

function addOrder(){
    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });

}
    

