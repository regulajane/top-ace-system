window.onload = function () { user(); }
function user(){
    //system users
    $("#usersTable").bootgrid({
        ajax: true,
        url: "data-servers/system-users-server.php",
        selection: true,
        rowSelect: true
    });
	// edit
	$("#editbtn").on("click", function() {
        var selectedItemArray = $("#usersTable").bootgrid("getSelectedRows");
        var selectedItem = parseInt(selectedItemArray) + 0;
        if(! selectedItem){
            alert("Please select an item.");
            location.reload();
        } else
        $.ajax({
            type: "POST",
            url: "includes/data-processors/processUserajax.php",
            data: {selectedItem: selectedItem},
            success: function(data) {
                userData = JSON.parse(data);
                // set variables
                var userNo = userData.adminNo;
                var name = userData.name;
                var username = userData.username;
                var password = userData.password;
                var authlevel = userData.authlevel;
                // Fill Form
                $(".userData #userID").val(userNo); 
                $(".userData #name").val(name);
                $(".userData #username").val(username);
                $(".userData #userpassword").val(password);
                $(".userData #userlevel").val(authlevel);
            }
        });           
    });
}