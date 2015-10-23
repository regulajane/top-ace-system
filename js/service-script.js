window.onload = function () {
    $("#serviceTable").bootgrid({
        ajax: true,
        url: "data-servers/service-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Services"
        },
    });

    $("#editservicebtn").on("click", function() {
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
                // fill form
                $(".servUpdate #servicename").val(srvcname);
                $(".servUpdate #serviceprice").val(srvcprice); 

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
                // fill form
                $(".servUpdate #servicename").val(srvcname);
                $(".servUpdate #serviceprice").val(srvcprice); 

                $('#deleteServiceModal').modal('show');

            }  
        });         
    });
    
}