    window.onload = function () { 
    jobOrder();
    fabOrder();
    addOrder();
    jobOrderForm();
    navbar();

	$('body').on('click', '.remove-field', function(){
		$(this).closest('div').remove();
			
	});

    // $('#joForm').bootstrapValidator({
    //     feedbackIcons: {
    //         message: 'This value is not valid',
    //         valid: 'glyphicon glyphicon-ok',
    //         invalid: 'glyphicon glyphicon-remove',
    //         validating: 'glyphicon glyphicon-refresh'
    //     },
    //     fields: {
    //         clientid: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Client name is required'
    //                 }
    //             }
    //         },
    //         datebrought: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Date received is required'
    //                 }
    //             }
    //         },
    //         modelid: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Engine model is required'
    //                 }
    //             }
    //         },
    //         engnumber: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Engine number is required'
    //                 }
    //             }
    //         },
    //         problem: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Please enter problem/s'
    //                 }
    //             }
    //         },
            // serviceid: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Service/s is required'
            //         }
            //     }
            // },
            // employeeid: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Machinist/s is required'
            //         }
            //     }
            // },
            // itemid: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Item name is required'
            //         }
            //     }
            // },
            // qtyAI: {
            //     validators: {
            //         notEmpty: {
            //             message: 'Quantity is required'
            //         }
            //     }
            // },
    //         salesperson: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Personnel is required'
    //                 }
    //             }
    //         },
    //         supervisor: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'Supervisor is required'
    //                 }
    //             }
    //         }
    //     }
    // });
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
                div1.className = "multi-field-wrapper-fabrication";
                var div2 = document.createElement("div");
                div2.className = "multi-fields";
                for (var i = 0; i < fabData.length; i++) {
                            var fabor = document.getElementById("fabricationorders");
                            var fabdesc = document.createElement("input");
                            var fabqty = document.createElement("input");
                            var fabprice = document.createElement("input");
                            var fabdesclabel = document.createElement("label");
                            var fabqtylabel = document.createElement("label");
                            var fabpricelabel = document.createElement("label");

                            var div3 = document.createElement("div");
                            fabpricelabel.appendChild(document.createTextNode("Price"));
                            fabdesclabel.appendChild(document.createTextNode("Item Description"));
                            fabqtylabel.appendChild(document.createTextNode("Quantity"));
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
                            
                            var removebtn = document.createElement("button");
                           
                            removebtn.type = "button";
                            removebtn.className = "remove-field btn btn-default";
                            removebtn.id = "removefield";
                            
                            var removebtnsymbol = document.createElement("i");
                            removebtnsymbol.className = "fa fa-minus";
                            removebtn.appendChild(removebtnsymbol);
                            removebtn.appendChild(document.createTextNode("Remove")); 
                            var br = document.createElement('br');
                            fabor.appendChild(div1);    
                           

                            if(i === 0){
                                var addbtn = document.createElement("button");
                                addbtn.type = "button";
                                addbtn.className = "add-field btn btn-info";
                                addbtn.id = "addfield";
                                var addbtnsymbol = document.createElement("i");
                                addbtnsymbol.className = "fa fa-plus";
                                addbtn.appendChild(addbtnsymbol);
                                addbtn.appendChild(document.createTextNode("Add More..."));
                                div3.appendChild(addbtn);
                                
                            }
                            div3.appendChild(document.createElement('br'));
							div3.appendChild(fabdesclabel);
                            div3.appendChild(document.createElement('br'));
							div3.appendChild(fabdesc);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(fabqtylabel);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(fabqty);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(fabpricelabel);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(fabprice);
                            div3.appendChild(removebtn);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(document.createElement('br'));

                           
                };
                addbtn.setAttribute("click", addOrderInEdit('fabrication'));
                $('#editFabModal').modal('show');
            }
        });

        // var fabMachinistData;
        
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabSelectedMachinistAjax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                
                fabMachinistData2 = JSON.parse(data);
                $.ajax({
                    type: "POST",
                    url: "includes/data-processors/processFabMachinistajax.php",
                    data: {selectedID: selectedID},
                    success: function(data2) {
                        fabMachinistData = JSON.parse(data2);
                        var div1 = document.createElement("div");
                        div1.className = "multi-field-wrapper-machinist";
                        var div2 = document.createElement("div");
                        div2.className = "multi-fields";
                        for (var k = 0; k < fabMachinistData2.length; k++) {
                            var selectmachinist = document.createElement("select");
                            var selectmachinistlabel = document.createElement("label");
                            selectmachinistlabel.appendChild(document.createTextNode("Machinist"));
                            selectmachinist.className = "form-control";
                            selectmachinist.id = "machinist";
                            selectmachinist.name = "machinist[]";
                            for (var i = 0; i < fabMachinistData.length; i++) {
                                var machinistoption = document.createElement("option");
                                machinistoption.value = fabMachinistData[i].employeeid;
                                machinistoption.innerHTML = fabMachinistData[i].empfirstname + " " + fabMachinistData[i].emplastname;
                                selectmachinist.appendChild(machinistoption);
                                selectmachinist.value = fabMachinistData2[k].employeeid;
                            }
                           
                            var removebtn = document.createElement("button");
                           
                            removebtn.type = "button";
                            removebtn.className = "remove-field btn btn-default";
                            removebtn.id = "removefield";
                           
                            var removebtnsymbol = document.createElement("i");
                            removebtnsymbol.className = "fa fa-minus";
                            removebtn.appendChild(removebtnsymbol);
                            removebtn.appendChild(document.createTextNode("Remove")); 
                            var fabor = document.getElementById("fabricationorders");
                            // fabor.appendChild(selectmachinist);
                            var div3 = document.createElement("div");
                            div3.className = "multi-field";

                            if(k === 0){
                                var addbtn = document.createElement("button");
                                addbtn.type = "button";
                                addbtn.className = "add-field btn btn-info";
                                addbtn.id = "addfield";
                                var addbtnsymbol = document.createElement("i");
                                addbtnsymbol.className = "fa fa-plus";
                                addbtn.appendChild(addbtnsymbol);
                                addbtn.appendChild(document.createTextNode("Add More..."));
                                div3.appendChild(addbtn);
                                div3.appendChild(document.createElement('br'));
                            }
                           
                            
                            div2.appendChild(div3);
                            div1.appendChild(div2);
                            fabor.appendChild(div1);
							div3.appendChild(document.createElement('br'));
							div3.appendChild(selectmachinistlabel);
                            div3.appendChild(document.createElement('br'));
                            div3.appendChild(selectmachinist);
							div3.appendChild(removebtn);
							div3.appendChild(document.createElement('br'));
                           
                            
                        }
                        addbtn.setAttribute("click", addOrderInEdit('machinist'));
                    }
                    
                });
                
                
            }
        });

                   
    });

    $("#updatefabbtn").on("click", function() {
        var selectedIDArray = $("#fabricationTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;

        $.ajax({
            type: "POST",
            url: "includes/data-processors/processFabajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                fabData = JSON.parse(data);

                var fabJobOrderID = fabData[0].joborderid;
                var fabClientLastname = fabData[0].cllastname;
                var fabClientFirstname = fabData[0].clfirstname;
                var fabClientMidInitial = fabData[0].clmidinitial;
                var fabordered = fabData[0].fabricationdesc;
                var fabjoPrice = fabData[0].joprice;
                var fabjoDpay = fabData[0].downpayment;
                var fabjoDateStarted = fabData[0].datestarted;
                var fabjoDateFinished = fabData[0].datefinished;
                var fabjoBal = fabData[0].balance;

                $(".fabUpdate #receiptNo").val(fabJobOrderID);
                $(".fabUpdate #client").val(fabClientLastname + ", " + fabClientFirstname);
                $(".fabUpdate #gtfab").val(fabjoPrice);
                $(".fabUpdate #balancefab").val(fabjoBal);
                $(".fabUpdate #datefinishfab").val(fabjoDateFinished);
                $(".fabUpdate #datestartfab").val(fabjoDateStarted);
                // var div1 = document.createElement("div");
                // div1.className = "multi-field-wrapper";

                    for (var i = 0; i < fabData.length; i++) {
                            var br = document.createElement('br');

                            // var div2 = document.createElement("div");
                            // var div3 = document.createElement("div");
                            // div2.className = "multi-fields";
                            // div3.className = "multi-field";
                            // div2.appendChild(div3);
                            // div1.appendChild(div2);
                            // services availed
                            var fo = document.getElementById("fabricationsordered");
                            var faborders = document.createElement("input");
                            
                            
                            faborders.id = "fabricationsordered";
                            faborders.readOnly = "true";
                            faborders.className = "form-control";
                            faborders.type = "text";
                            faborders.name = "fabricationsordered[]";
                            faborders.value = fabData[i].fabricationdesc;
                            faborders.innerHTML = fabData[i].fabricationdesc;


                            fo.appendChild(faborders);
                            fo.appendChild(br);


                            // service status
                            var fabstatus = document.getElementById("faborderstatus");
                            var selectstatus = document.createElement("select");
                            
                            selectstatus.id = "faborderstatus";
                            selectstatus.className = "form-control";
                            selectstatus.name = "faborderstatus[]";

                            var selectedoption = document.createElement("option");
                            selectedoption.value = fabData[i].fabricationstatus;  
                            selectedoption.innerHTML = fabData[i].fabricationstatus;
                            selectedoption.selected;
                            
                            var optionpending = document.createElement("option");
                            optionpending.value = "Pending";
                            optionpending.innerHTML =  "Pending";

                            var optionstarted = document.createElement("option");
                            optionstarted.value = "Started";
                            optionstarted.innerHTML =  "Started";
                            var optiondone = document.createElement("option");
                            optiondone.value = "Done";
                            optiondone.innerHTML = "Done";

                            if(selectedoption.value == "Pending"){
                                selectstatus.appendChild(selectedoption);
                                selectstatus.appendChild(optionstarted);
                                selectstatus.appendChild(optiondone);
                            }else 
                                
                              
                            if(selectedoption.value == "Started"){  
                      
                                selectstatus.appendChild(selectedoption);
                                selectstatus.appendChild(optiondone);
                            }else 

                            if(selectedoption.value == "Done"){ 
                                
                                selectstatus.appendChild(selectedoption);

                            }
                            
                            

                            
                            


                            selectstatus.appendChild(br);
                            fabstatus.appendChild(selectstatus);

                    };

                    
                                            
                

                
                
                
                // $(".joEdit #defects").val(joDefects);
                // $(".joEdit #natureOfWorksToBeDone").val(joNOWTBD);
                // $(".joEdit #partsToBeProcured").val(joPTBP);
                // $(".joEdit #requestedBy").val(joRequestedBy);
                // $(".joEdit #vehicleNo").val(joVehicleNo);

                
                $('#updateFabModal').modal('show');
                
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

    $('.joEmpty #additionalitems').typeahead({
        name: 'additionalitems',
        remote:'includes/data-processors/searchjo.php?key=%QUERY',
        limit : 10
                                                        
    });

    $("#newjoborderbtn").on("click", function() {
        document.getElementById('dateBrought').valueAsDate = new Date();
    });

    // edit
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

                 $.ajax({
                    type: "POST",
                    url: "includes/data-processors/processJOeditserviceajax.php",
                    data: {selectedID: selectedID},
                    success: function(data2) {
                        joDataSrv = JSON.parse(data2);
                // set JO variables
                var joJobOrderID = joData[0].joborderid;
                var joClientLastname = joData[0].cllastname
                var joClientFirstname = joData[0].clfirstname
                var joDateBrought = joData[0].datebrought;
                var joProblem = joData[0].problem;
                
                var joDownpayment = joData[0].downpayment;
                var joRequestedBy = joData[0].requestedBy;
                var joServices = joData[0].servicename;
                var joItems = joData[0].itemname;

                // $modelid = $_POST['modelid'];
                // $employeeid = $_POST['employeeid'];
                // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".joEdit #receiptNo").val(joJobOrderID);
                $(".joEdit #problem").val(joProblem);
                $(".joEdit #dateBrought").val(joDateBrought);
                $(".joEdit #client").val(joClientLastname + ", " + joClientFirstname);
                

                var div1 = document.createElement("div");
                div1.className = "multi-field-wrapper-joborder";
                var div2 = document.createElement("div");
                div2.className = "multi-fields";

                    for (var i = 0; i < joData.length; i++) {
                            var service = document.getElementById("servicesavailed");
                            var allservices = "";
                            allservices += joData[i].servicename;
                            var servicename = document.createElement("select");
                            var srvoption = document.createElement("option");

                            // servicename.appendChild(srvoption);

                            var servicenamelabel = document.createElement("label");
                            var div3 = document.createElement("div");
                            
                           
                            div3.className = "multi-field";
                            div2.appendChild(div3);
                            div1.appendChild(div2);
                            // servicename.type = "text";
                            servicename.className = "form-control";
                            servicename.id = "serviceid";
                            servicename.name = "serviceid[]";

                            var selectedoptionsrv = document.createElement("option");
                            selectedoptionsrv.value = joData[i].servicename;  
                            selectedoptionsrv.innerHTML = joData[i].servicename;
                            
                            // for (var i = 0; i < joDataSrv.length; i++) {
                            //     var option = document.createElement("option");

                            //     // var optsrv = joDataSrv[i].servicename;

                            //     option.value = joDataSrv[i].servicename;
                            //     option.innerHTML = joDataSrv[i].servicename;

                            
                            // }

                            servicename.appendChild(selectedoptionsrv);
                            // servicename.appendChild(option);
                            

                            div3.appendChild(document.createElement('br'));
                            var removebtn = document.createElement("button");
                            removebtn.type = "button";
                            removebtn.className = "remove-field btn btn-default";
                            removebtn.id = "removefield";
                            
                            var removebtnsymbol = document.createElement("i");
                            removebtnsymbol.className = "fa fa-minus";
                            removebtn.appendChild(removebtnsymbol);
                            
                            var br = document.createElement('br');
                            service.appendChild(div1);    
                           

                            if(i === 0){
                                var addbtn = document.createElement("button");
                                addbtn.type = "button";
                                addbtn.className = "add-field btn btn-info";
                                addbtn.id = "addfield";
                                var addbtnsymbol = document.createElement("i");
                                addbtnsymbol.className = "fa fa-plus";
                                addbtn.appendChild(addbtnsymbol);
                                div3.appendChild(addbtn);
                                
                            }

                            div3.appendChild(servicename);
                            service.appendChild(div1);
                            div3.appendChild(removebtn);

                        }
                        addbtn.setAttribute("click", addServiceinEdit('joborder')); 
                        $('#editJoModal').modal('show');
                    }
                    
                });
                
                
            }
        });

                   
    });

    $("#updatebtn").on("click", function() {
        var selectedIDArray = $("#jobOrderTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;

        $.ajax({
            type: "POST",
            url: "includes/data-processors/processJOajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);

                var joJobOrderID = joData[0].joborderid;
                var joClientLastname = joData[0].cllastname
                var joClientFirstname = joData[0].clfirstname
                var joServices = joData[0].servicename;
                var joPrice = joData[0].joprice;
                var joDpay = joData[0].downpayment;
                var joDateStarted = joData[0].datestarted;
                var joDateFinished = joData[0].datefinished;

                var joBal = joData[0].balance;


                $(".joUpdate #receiptNo").val(joJobOrderID);
                $(".joUpdate #client").val(joClientLastname + ", " + joClientFirstname);
                $(".joUpdate #gt").val(joPrice);
                $(".joUpdate #balance").val(joBal);
                $(".joUpdate #datefinish").val(joDateFinished);
                $(".joUpdate #datestart").val(joDateStarted);

                    for (var i = 0; i < joData.length; i++) {
                            var br = document.createElement('br');


                            var sa = document.getElementById("srvavailed");
                            var srv = document.createElement("input");
                            
                            
                            srv.id = "servicesavailed";
                            srv.readOnly = "true";
                            srv.className = "form-control";
                            srv.type = "text";
                            srv.name = "servicesavailed[]";
                            srv.value = joData[i].servicename;
                            srv.innerHTML = joData[i].servicename;


                            sa.appendChild(srv);
                            sa.appendChild(br);


                            // service status
                            var srvstatus = document.getElementById("srvstatus");
                            var selectstatus = document.createElement("select");
                            
                            selectstatus.id = "servicesstatus";
                            selectstatus.className = "form-control";
                            selectstatus.name = "servicesstatus[]";

                            var selectedoption = document.createElement("option");
                            selectedoption.value = joData[i].servicesstatus;  
                            selectedoption.innerHTML = joData[i].servicesstatus;
                            selectedoption.selected;
                            
                            var optionpending = document.createElement("option");
                            optionpending.value = "Pending";
                            optionpending.innerHTML =  "Pending";

                            var optionstarted = document.createElement("option");
                            optionstarted.value = "Started";
                            optionstarted.innerHTML =  "Started";
                            var optiondone = document.createElement("option");
                            optiondone.value = "Done";
                            optiondone.innerHTML = "Done";

                            if(selectedoption.value == "Pending"){
                                selectstatus.appendChild(selectedoption);
                                selectstatus.appendChild(optionstarted);
                                selectstatus.appendChild(optiondone);
                            }else 
                                
                              
                            if(selectedoption.value == "Started"){  
                      
                                selectstatus.appendChild(selectedoption);
                                selectstatus.appendChild(optiondone);
                            }else 

                            if(selectedoption.value == "Done"){ 
                                
                                selectstatus.appendChild(selectedoption);

                            }
                            
                            

                            
                            


                            selectstatus.appendChild(br);
                            srvstatus.appendChild(selectstatus);

                    };

                    

                
                $('#updateJoModal').modal('show');
                
            }
        });           
    });

}


function jobOrderForm(){

    // Job Order Form Printing
    $("#preEvalbtn").on("click", function() {
        var selectedIDArray = $("#jobOrderTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;

        // employees, receipt number, machinist, supervisor, prepared by, customer name, date brought, address
        var joPrice = 0;
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
                var joCelno = joData[0].clcelno;
                var joBalance = joData[0].balance;
                joPrice = parseFloat(joData[0].joprice).toFixed(2);
                var joDownpayment = joData[0].downpayment;



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
                document.getElementById('clcontactinfo').innerHTML =  "Contact number:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +joCelno+ "</span>";
                document.getElementById('machinistform').innerHTML = empnames;
                document.getElementById('confirmedbyform').innerHTML = joSupervisor;
                document.getElementById('receivedbyform').innerHTML = joPreparedBy;
                document.getElementById('grandtotal').innerHTML =  "Grand Total:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +joPrice+ "</span>";
                document.getElementById('dpayment').innerHTML =  "Downpayment:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +joDownpayment+ "</span>";
                document.getElementById('jobalance').innerHTML =  "Balance:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +joBalance+ "</span>";
                $('#joPreFormModal').modal('show');
                
            }
        });
        var totalservicecost = 0;
        // services 
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processJOSERVICEajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                // var joServicesAvailed = joData[0].joborderid;
                

                var josrvAvailedname = [];
                var josrvAvailedprice = [];
                var srvn;
                var srvp;
                var srvAvailedn = "";
                var srvAvailedp = "";
                
                

                for (var i = 0; i < joData.length; i++){
                    srvn = joData[i].servicename;
                    srvp = joData[i].serviceprice;
                    document.getElementById('srvname').innerHTML += srvn + "<br>";
                    document.getElementById('srvprice').innerHTML +=  srvp +  "<br>";
                    totalservicecost = totalservicecost + parseInt(srvp);

                    
                }
                document.getElementById('tsc').innerHTML =  "Total Service/s Cost:&nbsp;&nbsp;&nbsp;<span>" +parseFloat(totalservicecost).toFixed(2)+ "</span>";
                
                
                $('#joPreFormModal').modal('show');
                
            }
        });

        // item list
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processJOajaxItems.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                // var joServicesAvailed = joData[0].joborderid;
                

                var joItemname = [];
                var joItemprice = [];
                var joItemqty = [];
                var itemn;
                var itemp;
                var itemq;
                var totalitemcost = 0;
                var tempprice = 0;
              
                
                for (var i = 0; i < joData.length; i++){
                    itemn = joData[i].inventoryname;
                    itemp = joData[i].itemprice;
                    itemq = joData[i].itemquantity;
                    document.getElementById('itemname').innerHTML +=itemn + "<br>";
                    document.getElementById('itemprice').innerHTML +=  itemp +  "<br>";
                    document.getElementById('itemqty').innerHTML +=  itemq +  "<br>";

                    tempprice = parseInt(itemp) * parseInt(itemq);
                    totalitemcost = totalitemcost + tempprice;
                    
                }
                document.getElementById('tic').innerHTML =  "Total Item/s Cost:&nbsp;&nbsp;&nbsp;<span>" +parseFloat(totalitemcost).toFixed(2)+ "</span>";
                var tempsrvanditemcost = totalitemcost+totalservicecost;
                document.getElementById('srcanditemcost').innerHTML =  "Services and Items cost:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +parseFloat(tempsrvanditemcost).toFixed(2)+ "</span>";
                var tempadjustments = (joPrice-(totalitemcost+totalservicecost));
                document.getElementById('adjustments').innerHTML =  "Adjustments:&nbsp;&nbsp;&nbsp;<span id='notBold'>" +parseFloat(tempadjustments).toFixed(2)+ "</span>";

                
                 
                
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

function addOrderInEdit(div_type){
	$('.multi-field-wrapper-'+div_type).each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
			var clone = $('.multi-field:first-child', $wrapper).clone();
			$(clone).find('.add-field').remove().end().appendTo($wrapper).find('input').val('').focus();
        });
       
    });
}

function navbar(){
    var activeEl = 1;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}