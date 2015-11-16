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
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Job Orders"
        },
    });

    $("#editfabbtn").on("click", function() {
        var selectedIDArray = $("#fabricationTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        

        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                fabData = JSON.parse(data);
                // set JO variables
                var fabJobOrderID = fabData[0].joborderid;
                var fabClientLastname = fabData[0].cllastname;
                var fabClientFirstname = fabData[0].clfirstname;
                var fabClientMidInitial = fabData[0].clmidinitial;
                var fabDateOrdered = fabData[0].dateordered;      
                var fabDownpayment = fabData[0].downpayment;
                var fabFabricationID = fabData[0].fabricationid;
                var fabFabricationJOPrice = fabData[0].joprice;
                // Update Form
                $(".fabEdit #receiptNo").val(fabJobOrderID);
                $(".fabEdit #dateStarted").val(fabDateOrdered);
                $(".fabEdit #client").val(fabClientLastname + ", " + fabClientFirstname + " " + fabClientMidInitial);
                $(".fabEdit #fabjoborderprice").val(fabFabricationJOPrice);
                $(".fabEdit #downpayment").val(fabDownpayment);
                var div1 = document.createElement("div");
                div1.className = "multi-field-wrapper";
                for (var i = 0; i < fabData.length; i++) {
                            var fabor = document.getElementById("fabricationorders");
                            var fabdesc = document.createElement("input");
                            var fabqty = document.createElement("input");
                            var fabprice = document.createElement("input");
                            var div2 = document.createElement("div");
                            div2.className = "multi-fields";
                            var div3 = document.createElement("div");
                            fabqty.type = "number";
                            fabqty.id = "length";
                            fabqty.name = "length[]";
                            fabqty.min = "1";
                            fabqty.max = "1000";
                            fabqty.value = fabData[i].fabricationquantity;
                            fabprice.type = "text";
                            fabprice.className = "form-control";
                            fabprice.id = "price";
                            fabprice.name = "price[]";
                            fabprice.value = fabData[i].fabricationprice;
                            div3.className = "multi-field";
                            div2.appendChild(div3);
                            div1.appendChild(div2);
                            fabdesc.type = "text";
                            fabdesc.className = "form-control";
                            fabdesc.id = "item";
                            fabdesc.name = "item[]";
                            fabdesc.value = fabData[i].fabricationdesc;
                            var addbtn = document.createElement("button");
                            var removebtn = document.createElement("button");
                            addbtn.type = "button";
                            addbtn.className = "add-field btn btn-default";
                            addbtn.id = "addfield";
                            removebtn.type = "button";
                            removebtn.className = "remove-field btn btn-default";
                            removebtn.id = "removefield";
                            var addbtnsymbol = document.createElement("i");
                            addbtnsymbol.className = "fa fa-plus";
                            addbtn.appendChild(addbtnsymbol);
                            addbtn.appendChild(document.createTextNode("Add More..."));
                            var removebtnsymbol = document.createElement("i");
                            removebtnsymbol.className = "fa fa-minus";
                            removebtn.appendChild(removebtnsymbol);
                            removebtn.appendChild(document.createTextNode("Remove")); 
                            var br = document.createElement('br');
                            fabor.appendChild(div1);    
                            div3.appendChild(fabdesc);
                            div3.appendChild(fabqty);
                            div3.appendChild(fabprice);
                            div3.appendChild(br);
                            div3.appendChild(addbtn);
                            div3.appendChild(removebtn);
                            div3.appendChild(br);      
                };
                addbtn.setAttribute("click", addOrderInEdit());
                removebtn.setAttribute("click", removeOrderInEdit());  
                $('#editFabModal').modal('show');
            }
        });

        var fabMachinistData;
        
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabMachinistajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                fabMachinistData = JSON.parse(data);   
            }
        });

        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabSelectedMachinistAjax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                
                fabMachinistData2 = JSON.parse(data);
                var div1 = document.createElement("div");
                div1.className = "multi-field-wrapper";
                for (var k = 0; k < fabMachinistData2.length; k++) {
                    var selectmachinist = document.createElement("select");
                    for (var i = 0; i < fabMachinistData.length; i++) {
                        var machinistoption = document.createElement("option");
                        machinistoption.value = fabMachinistData[i].employeeid;
                        machinistoption.innerHTML = fabMachinistData[i].empfirstname + " " + fabMachinistData[i].emplastname;
                        selectmachinist.appendChild(machinistoption);
                        selectmachinist.value = fabMachinistData2[k].employeeid;
                    }
                    var addbtn = document.createElement("button");
                    var removebtn = document.createElement("button");
                    addbtn.type = "button";
                    addbtn.className = "add-field btn btn-default";
                    addbtn.id = "addfield";
                    removebtn.type = "button";
                    removebtn.className = "remove-field btn btn-default";
                    removebtn.id = "removefield";
                    var addbtnsymbol = document.createElement("i");
                    addbtnsymbol.className = "fa fa-plus";
                    addbtn.appendChild(addbtnsymbol);
                    addbtn.appendChild(document.createTextNode("Add More..."));
                    var removebtnsymbol = document.createElement("i");
                    removebtnsymbol.className = "fa fa-minus";
                    removebtn.appendChild(removebtnsymbol);
                    removebtn.appendChild(document.createTextNode("Remove")); 
                    var fabor = document.getElementById("fabricationorders");
                    // fabor.appendChild(selectmachinist);
                    var div2 = document.createElement("div");
                    div2.className = "multi-fields";
                    var div3 = document.createElement("div");
                    div3.className = "multi-field";
                    div2.appendChild(div3);
                    div1.appendChild(div2);
                    fabor.appendChild(div1);
                    div3.appendChild(selectmachinist);
                    div3.appendChild(document.createElement('br'));
                    div3.appendChild(addbtn);
                    div3.appendChild(removebtn);
                    
                }
                addbtn.setAttribute("click", addOrderInEdit());
                removebtn.setAttribute("click", removeOrderInEdit()); 
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
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Job Orders"
        },
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

function addOrderInEdit(){
     $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
       
    });

}

function removeOrderInEdit(){
     $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });
}