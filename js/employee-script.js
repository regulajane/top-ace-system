window.onload = function () {
// Employee table
    $("#employeeTable").bootgrid({
        ajax: true,
        url: "data-servers/employee-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Employees"
        },
    });

    $('#addemployeeform, #updateemployeeform').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            emplastname: {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    }
                }
            },
            empfirstname: {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    }
                }
            },
            empmiddlename: {
                validators: {
                    notEmpty: {
                        message: 'Middle name is required'
                    }
                }
            },
            empgender: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    }
                }
            },
            empcelno: {
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
            empaddress: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            empemailad: {
                validators: {
                    notEmpty: {
                        message: 'Email address is required'
                    }
                }
            },
            emptype: {
                validators: {
                    notEmpty: {
                        message: 'Job description is required'
                    }
                }
            }
        }
    });

    // Update Employee Information
    $("#updateemployeebtn").on("click", function() {
        var selectedIDArray = $("#employeeTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        if(! selectedID){
            alert("Please select an employee.");
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processEmployeeajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                // set emp variables
                var empId = joData.employeeid;
                var empLastname = joData.emplastname;
                var empFirstname = joData.empfirstname;
                var empMiddlename = joData.empmiddlename;
                var empCelno = joData.empcelno;
                var empGender = joData.empgender;
                var empNoofjobs = joData.noofjobs;
                var empAddress = joData.empaddress;
                var empStatus = joData.empstatus;
                var empEmail = joData.empemailad;
                var empType = joData.emptype;
                // Update Form
                $(".empUpdate #employeeid").val(empId); 
                $(".empUpdate #emplastname").val(empLastname); 
                $(".empUpdate #empfirstname").val(empFirstname);
                $(".empUpdate #empmiddlename").val(empMiddlename);
                $(".empUpdate #empcelno").val(empCelno);
                $(".empUpdate #empgender").val(empGender);
                $("input[name=empgender][value="+empGender+"]").attr('checked', true);
                $(".empUpdate #noofjobs").val(empNoofjobs);
                $(".empUpdate #empaddress").val(empAddress);
                $(".empUpdate #empstatus").val(empStatus);
                $(".empUpdate #empemailad").val(empEmail);
                $(".empUpdate #emptype").val(empType);
                    
                $('#updateEmployeeModal').modal('show');
            }
        });           
    });
    
}