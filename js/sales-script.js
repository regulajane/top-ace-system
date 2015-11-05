window.onload = function () {
    $("#salesTable").bootgrid({
        ajax: true,
        url: "data-servers/sales-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Sales"
        },
    });

    $("#newsalebtn").on("click", function() {
        document.getElementById('saledate').valueAsDate = new Date();
    });
}