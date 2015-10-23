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
                // Update Form
                $(".empUpdate #employeeid").val(empId); 
                $(".empUpdate #emplastname").val(empLastname); 
                $(".empUpdate #empfirstname").val(empFirstname);
                $(".empUpdate #empmiddlename").val(empMiddlename);
                $(".empUpdate #empcelno").val(empCelno);
                $(".empUpdate #empgender").val(empGender);
                $(".empUpdate #noofjobs").val(empNoofjobs);
                $(".empUpdate #empaddress").val(empAddress);
                $(".empUpdate #empstatus").val(empStatus);
                $(".empUpdate #empemailad").val(empEmail);
                    
                $('#updateEmployeeModal').modal('show');
            }
        });           
    });
    
}