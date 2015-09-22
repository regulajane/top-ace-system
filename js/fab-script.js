window.onload = function () { fabOrder(); }
function fabOrder(){
    // job order table
    $("#fabricationTable").bootgrid({
        ajax: true,
        url: "data-servers/fab-order-server.php",
        selection: true,
        rowSelect: true
    });
   
}