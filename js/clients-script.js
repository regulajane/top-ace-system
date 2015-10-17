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
                var since = client.clsince;
                // fill form
                $(".clienteditupdate #clientid").val(clientid);
                $(".clienteditupdate #clientln").val(lastname); 
                $(".clienteditupdate #clientfn").val(firstname); 
                $(".clienteditupdate #clientmi").val(middleinitial); 
                $(".clienteditupdate #clientgender").val(gender); 
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