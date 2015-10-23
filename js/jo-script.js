window.onload = function () { 
    jobOrder();
    fabOrder();
    addOrder();
    jobOrderForm();

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
                // alert(fabData.length);
                // set JO variables
                var fabJobOrderID = fabData[0].joborderid;
                var fabClientLastname = fabData[0].cllastname;
                var fabClientFirstname = fabData[0].clfirstname;
                var fabClientMidInitial = fabData[0].clmidinitial;
                var fabDateOrdered = fabData[0].dateordered;      
                var fabDownpayment = fabData[0].downpayment;
                var fabFabricationID = fabData[0].fabricationid;
                // var fabFabricationDescription = fabData.fabricationdesc;
                // var fabFabricationQuantity = fabData.fabricationquantity;
                // var fabFabricationPrice = fabData.fabricationprice;
                // var fabFabricationStatus = fabData.fabstatus;
                var fabFabricationJOPrice = fabData[0].joprice;
 
  
                // $modelid = $_POST['modelid'];
                // $employeeid = $_POST['employeeid'];
                // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".fabEdit #receiptNo").val(fabJobOrderID);
                $(".fabEdit #dateStarted").val(fabDateOrdered);
                $(".fabEdit #client").val(fabClientLastname + ", " + fabClientFirstname + " " + fabClientMidInitial);
                $(".fabEdit #fabjoborderprice").val(fabFabricationJOPrice);
                $(".fabEdit #downpayment").val(fabDownpayment);
                // $(".joEdit #defects").val(joDefects);
                // $(".joEdit #natureOfWorksToBeDone").val(joNOWTBD);
                // $(".joEdit #partsToBeProcured").val(joPTBP);
                // $(".joEdit #requestedBy").val(joRequestedBy);
                // $(".joEdit #vehicleNo").val(joVehicleNo);
                for (var i = 0; i < fabData.length; i++) {
                            // var allfaborders = "";
                            // allfaborders += fabData[i].fabricationdesc;
                            // alert(allservices);
                            // $(".joEdit #servicesavailed").val(allservices+=joData[i].servicename);
                            // document.getElementById("servicesavailed").innerHTML += allservices;
                            var fabor = document.getElementById("fabricationorders");
                            var fabdesc = document.createElement("input");
                            fabdesc.type = "text";
                            fabdesc.class = "form-control";
                            fabdesc.id = "item";
                            fabdesc.name = "item[]";
                            fabdesc.value = fabData[i].fabricationdesc;

                            // var addbtn = document.createElement("button");
                            // addbtn.type = "button";
                            // addbtn.class = "add-field btn btn-default"
                            // addbtn.id = "addfield";
                            // addbtn.appendChild(document.createTextNode("Add More..."));
                            // var addbtninsider = document.createElement("i");
                            // addbtninsider.class = "fa fa-plus";
                            // addbtn.appendChild(addbtninsider);

                            document.getElementById("addfield").click;

                            // <button type="button" class="add-field btn btn-default" 
                            //         id="addfield"><i class="fa fa-plus"></i>Add More...</button>
                            // <button type="button" class="remove-field btn btn-default" 
                            //         id="removefield"><i class="fa fa-minus"></i>Remove Field</button>


                            // btn2.className = "btn btn-default";
                            
                            
                            var br = document.createElement('br');

                            // var t = document.createTextNode(allfaborders);      
                            // btn2.appendChild(t);
                         
                            fabor.appendChild(fabdesc);
                            fabor.appendChild(br);
                            // fabor.appendChild(addbtn);



                        // }      
                };
                
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
                // set JO variables
                var joJobOrderID = joData[0].joborderid;
                var joClientLastname = joData[0].cllastname
                var joClientFirstname = joData[0].clfirstname
                var joDateBrought = joData[0].datebrought;
                var joProblem = joData[0].problem;
                
                var joDownpayment = joData[0].downpayment;
                var joRequestedBy = joData[0].requestedBy;
                var joServices = joData[0].servicename;

                // $modelid = $_POST['modelid'];
                // $employeeid = $_POST['employeeid'];
                // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".joEdit #receiptNo").val(joJobOrderID);
                $(".joEdit #problem").val(joProblem);
                $(".joEdit #dateBrought").val(joDateBrought);
                $(".joEdit #client").val(joClientLastname + ", " + joClientFirstname);

                

                // if (joData.length == 1) {
                //     $(".joEdit #servicesavailed").val(joServices);
                // } else {
                    for (var i = 0; i < joData.length; i++) {
                            var allservices = "";
                            allservices += joData[i].servicename;
                            // alert(allservices);
                            // $(".joEdit #servicesavailed").val(allservices+=joData[i].servicename);
                            // document.getElementById("servicesavailed").innerHTML += allservices;
                            var sa = document.getElementById("servicesavailed");
                            var btn = document.createElement("button");
                            
                            btn.className = "btn btn-default";
                            
                            var br = document.createElement('br');

                            var t = document.createTextNode(allservices);       
                            btn.appendChild(t);                              
                            sa.appendChild(btn);
                            sa.appendChild(br);



                        // }      
                };

                

                
                
                
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


function jobOrderForm(){

    // Job Order Form Printing
    $("#preEvalbtn").on("click", function() {
        var selectedIDArray = $("#jobOrderTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processJOEMPajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                var joJobOrderID = joData[0].joborderid;
                var joClientLastname = joData[0].cllastname;
                var joClientFirstname = joData[0].clfirstname;
                var joDateBrought = joData[0].datebrought;
                var joClientAddress = joData[0].claddress;
                var joPreparedBy = joData[0].preparedby;
                var joSupervisor = joData[0].supervisor;

                var emp = [];
                var empname;
                var empnames = "";
                for (var i = 0; i < joData.length; i++){
                    empname = joData[i].empfirstname + " " + joData[i].emplastname;
                    emp.push(empname);
                    if (empnames != "") {
                        empnames = empnames + ", " + emp[i];
                    } else {
                        empnames = emp[i];
                    }
                }

                // Update Form
                document.getElementById('joborderidform').innerHTML = "Receipt No.&nbsp;&nbsp;&nbsp;<span id='notBold'>" + joJobOrderID + "</span>";
                document.getElementById('clnameform').innerHTML = "To:&nbsp;&nbsp;&nbsp;<span id='notBold'>" + joClientLastname + ", " + joClientFirstname + "</span>";
                document.getElementById('datebroughtform').innerHTML = "Date:&nbsp;&nbsp;&nbsp;<span id='notBold'>" + joDateBrought + "</span>";
                document.getElementById('claddressform').innerHTML = "Address:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +joClientAddress + "</span>";
                document.getElementById('machinistform').innerHTML = empnames;
                document.getElementById('confirmedbyform').innerHTML = joSupervisor;
                document.getElementById('receivedbyform').innerHTML = joPreparedBy;
                
                $('#joPreFormModal').modal('show');
                
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
    

