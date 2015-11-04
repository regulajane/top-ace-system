window.onload = function () {
    $("#clientsTable").bootgrid({
        ajax: true,
        url: "data-servers/clients-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Clients"
        },
    });

    $('#clientForm, #updateclientForm').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            clientln: {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    }
                }
            },
            clientfn: {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    }
                }
            },
            clientgender: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    }
                }
            },
            clientcp: {
                validators: {
                    notEmpty: {
                        message: 'Contact number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Contact number can only consist of numbers'
                    }
                }
            },
            clientadd: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            clientsince: {
                validators: {
                    notEmpty: {
                        message: 'Date is required'
                    }
                }
            }
        }
    });

    $("#newclientbtn").on("click", function() {
        document.getElementById('clientsince').valueAsDate = new Date();
    });

    $("#editupdatebtn").on("click", function() {
        var selectedIDArray = $("#clientsTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        $.ajax({
            type: "POST",
            url: "includes/data-processors/clientajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                client = JSON.parse(data);
                // set variables
                var clientid = client.clientid;
                var lastname = client.cllastname;
                var firstname = client.clfirstname;
                var middleinitial = client.clmidinitial;
                var gender = client.clgender;
                var celno = client.clcelno;
                var address = client.claddress;
                var since = client.clsince;
                // fill form
                $(".clienteditupdate #clientid").val(clientid);
                $(".clienteditupdate #clientln").val(lastname); 
                $(".clienteditupdate #clientfn").val(firstname); 
                $(".clienteditupdate #clientmi").val(middleinitial); 
                $(".clienteditupdate #clientgender").val(gender); 
                $(".clienteditupdate input[name=clientgender][value="+gender+"]").attr('checked', true);
                $(".clienteditupdate #clientcp").val(celno); 
                $(".clienteditupdate #clientadd").val(address);
                $(".clienteditupdate #clientsince").val(since); 
            }  
        });  
        if (selectedID > 0) {
            $('#updateClientModal').modal('show');
        } else {
            alert("Please select a client.");
        }         
    });
}