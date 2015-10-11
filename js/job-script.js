window.onload = function () {
    $("#jobTable").bootgrid({
        ajax: true,
        url: "data-servers/job-server.php",
        selection: true,
        rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} entries"
        },
    });

    
}