window.onload = function () { notification();}
function notification(){

	// Notification TABLE
	$("#notificationTable").bootgrid({
	    ajax: true,
	    selection: true,
	    url: "data-servers/notification-server.php",
	    rowSelect: true,
        labels: {
            infos: "Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} Items"
        },

	});
}