window.onload = function () { jobOrder(); }
function jobOrder(){
    // job order table
    $("#jobOrderTable").bootgrid({
        ajax: true,
        url: "data-servers/job-order-server.php",
        selection: true,
        rowSelect: true
    });
}