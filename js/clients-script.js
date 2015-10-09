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
                // fill form
                $(".client #clientid").val(clientid);
                $(".client #clientln").val(lastname); 
                $(".client #clientfn").val(firstname); 
                $(".client #clientmi").val(middleinitial); 
                $(".client #clientgender").val(gender); 
                $(".client #clientcp").val(celno); 
                $(".client #clientadd").val(address); 
            }  
        });  
        if (selectedID > 0) {
            $('#updateClientModal').modal('show');
        } else {
            alert("Please select an item.");
        }         
    });
}