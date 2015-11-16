window.onload = function () {
    navbar();

    $("#serviceTable").bootgrid({
        ajax: true,
        url: "data-servers/service-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Services"
        },
    });

    $('#addserviceform, #updateserviceform').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            servicename: {
                validators: {
                    notEmpty: {
                        message: 'Service name is required'
                    }
                }
            },
            serviceprice: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    },
                    regexp: {
                        regexp: /^[0-9.0]+$/,
                        message: 'Invalid price'
                    }

                }
            },
            servicedesc: {
                validators: {
                    notEmpty: {
                        message: 'Description is required'
                    }
                }
            },
            servicedatemod: {
                validators: {
                    notEmpty: {
                        message: 'Date modified is required'
                    }
                }
            }
        }
    });

    $("#newservicebtn").on("click", function() {
        document.getElementById('srvdatemod').valueAsDate = new Date();
    });

    $("#editservicebtn").on("click", function() {
        document.getElementById('servicedatemod').valueAsDate = new Date();
        
        var selectedIDArray = $("#serviceTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        if(! selectedID){
            alert("Please select a service.");
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processServiceajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                service = JSON.parse(data);
                // set variables
                var srvcname = service.servicename;
                var srvcprice = service.serviceprice;
                var srvcdesc = service.servicedesc;
                // fill form
                $(".servUpdate #servicename").val(srvcname);
                $(".servUpdate #serviceprice").val(srvcprice); 
                $(".servUpdate #servicedesc").val(srvcdesc); 

                $('#editServiceModal').modal('show');

            }  
        });         
    });

        $("#deleteservicebtn").on("click", function() {
        var selectedIDArray = $("#serviceTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        if(! selectedID){
            alert("Please select a service.");
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processServiceajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                service = JSON.parse(data);
                // set variables
                var srvcname = service.servicename;
                var srvcprice = service.serviceprice;
                var srvcdesc = service.servicedesc;
                // fill form
                $(".servUpdate #servicename").val(srvcname);
                $(".servUpdate #serviceprice").val(srvcprice); 
                $(".servUpdate #servicedesc").val(srvcdesc); 

                $('#deleteServiceModal').modal('show');

            }  
        });         
    });
    
}

function navbar(){
    var activeEl = 5;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}