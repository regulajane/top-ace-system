window.onload = function () { 
    jobOrder();
    tables();
    realTime();
    displayDateTime();
    homeNav();
}



// Time
function realTime(){
    var refresh=1000;
    mytime=setTimeout('displayDateTime()',refresh);
}

function displayDateTime() {
    var x =document.getElementById('currentDateTime');
    
    if(! x){} else {
        var x = new Date();
        var time = x.getHours()+ ":" + x.getMinutes() + ":" + x.getSeconds();

        var monthArr = new Array(12);
        monthArr[0] = "Jan";
        monthArr[1] = "Feb";
        monthArr[2] = "Mar";
        monthArr[3] = "Apr";
        monthArr[4] = "May";
        monthArr[5] = "Jun";
        monthArr[6] = "Jul";
        monthArr[7] = "Aug";
        monthArr[8] = "Sep";
        monthArr[9] = "Oct";
        monthArr[10] = "Nov";
        monthArr[11] = "Dec";

        var month = monthArr[x.getMonth()];
        var mo = x.getMonth();
        var date = x.getDate();
        var year = x.getFullYear();
            year = year.toString().substr(2,2);
        var date = date + ' - ' + month + ' - ' + year;
        var sqlDate = mo + '/' + date + '/' + year;

        var dateTime = time + '<br><h4>' + date + '</h4>';

        document.getElementById('currentDateTime').innerHTML = dateTime;
        $(".joEmpty #dateOfPrerepairRequest").val(sqlDate); 
    }

    xx = realTime();
}

function homeNav(){
    var activeEl = 2;
    var items = $('.btn-nav');
    $( items[activeEl] ).addClass('active');
    $( ".btn-nav" ).click(function() {
        $( items[activeEl] ).removeClass('active');
        $( this ).addClass('active');
        activeEl = $( ".btn-nav" ).index( this );
    });
}

function clearForm() {
    document.getElementById('joForm').reset();
    document.getElementById('joEditForm').reset();
}

function printForm(divName) { 
    location.reload();
    var originalContents = document.body.innerHTML;
    var printContents = document.getElementById(divName).innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}










//Manuel
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
                var joJobOrderID = joData.joborderid;
                var joClientLastname = joData.lastname
                var joClientFirstname = joData.firstname
                var joDateBrought = joData.datebrought;
                var joProblem = joData.problem;
                var joSymptoms = joData.symptoms;
                var joDownpayment = joData.downpayment;
                var joRequestedBy = joData.requestedBy;
  
                // $modelid = $_POST['modelid'];
                // $employeeid = $_POST['employeeid'];
                // $serviceid = $_POST['serviceid'];

                // Update Form
                $(".joEdit #receiptNo").val(joJobOrderID);
                $(".joEdit #problem").val(joProblem);
                $(".joEdit #dateBrought").val(joDateBrought);
                $(".joEdit #client").val(joClientLastname + ", " + joClientFirstname);
                $(".joEdit #symptoms").val(joSymptoms);
                // $(".joEdit #defects").val(joDefects);
                // $(".joEdit #natureOfWorksToBeDone").val(joNOWTBD);
                // $(".joEdit #partsToBeProcured").val(joPTBP);
                // $(".joEdit #requestedBy").val(joRequestedBy);
                // $(".joEdit #vehicleNo").val(joVehicleNo);

                
                $('#editJoModal').modal('show');
                
            }
        });           
    });

//Trisha
function tables(){
    //ingoing supplies
    $("#inSuppliesTable").bootgrid({
        ajax: true,
        url: "data-servers/ingoing-supplies-server.php",
    });
    //outgoing supplies
    $("#outSuppliesTable").bootgrid({
            ajax: true,
            url: "data-servers/outgoing-supplies-server.php",
    });
    //session logs
    $("#sessionsTable").bootgrid({
            ajax: true,
            url: "data-servers/session-logs-server.php",
    });
    //vehicle records
    $("#vehicleRecordTable").bootgrid({
            ajax: true,
            url: "data-servers/vehicle-records-server.php",
            templates: {
                search: ""
            }
    });
    // Employee table
    $("#employeeTable").bootgrid({
        ajax: true,
        url: "data-servers/employee-server.php",
        selection: true,
        rowSelect: true
    });

    // Update Employee Information
    $("#updateemployeebtn").on("click", function() {
        var selectedIDArray = $("#employeeTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        // if(! selectedID){
        //     alert("Please select an item.");
        //     location.reload();
        // } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processEmployeeajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                joData = JSON.parse(data);
                // set JO variables
                var empId = joData.employeeid;
                var empLastname = joData.lastname;
                var empFirstname = joData.firstname;
                var empCelno = joData.celno;
                var empGender = joData.gender;
                var empNumofjob = joData.numofjob;
                var empAddress = joData.address;
                var empStatus = joData.status;
                var empEmail = joData.emailad;
                // Update Form
                $(".empUpdate #employeeid").val(empId); 
                $(".empUpdate #lastname").val(empLastname); 
                $(".empUpdate #firstname").val(empFirstname);
                $(".empUpdate #celno").val(empCelno);
                $(".empUpdate #gender").val(empGender);
                $(".empUpdate #numofjob").val(empNumofjob);
                $(".empUpdate #address").val(empAddress);
                $(".empUpdate #status").val(empStatus);
                $(".empUpdate #emailad").val(empEmail);
                    
                $('#updateEmployeeModal').modal('show');
            }
        });           
    });
}

}