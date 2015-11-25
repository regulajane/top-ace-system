window.onload = function () { 

    //system users
    $("#usersTable").bootgrid({
        ajax: true,
        url: "data-servers/users-server.php",
        selection: true,
        rowSelect: true
    });

    $('#userForm, #updateUserForm').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            userln: {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    }
                }
            },
            userfn: {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    }
                }
            },
            usermi: {
                validators: {
                    notEmpty: {
                        message: 'M.I. is required'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'User type is required'
                    }
                }
            }
        }
    });

	// edit
    $("#editbtn").on("click", function() {
        var selectedIDArray = $("#usersTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        $.ajax({
            type: "POST",
            url: "includes/data-processors/userajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                user = JSON.parse(data);
                // set variables
                var userid = user.userid;
                var userlastname = user.userlastname;
                var userfirstname = user.userfirstname;
                var usermidinitial = user.usermidinitial;
                var usertype = user.usertype;
                var username = user.username;

                // fill form
                $(".userData #userid").val(userid);
                $(".userData #userln").val(userlastname); 
                $(".userData #userfn").val(userfirstname); 
                $(".userData #usermi").val(usermidinitial); 
                $(".userData #usertype").val(usertype); 
                $(".userData #username").val(username); 
            }  
        });  
        if (selectedID > 0) {
            $('#usersModal').modal('show');
        } else {
            alert("Please select a user.");
        }         
    });

    // edit
    $("#resetbtn").on("click", function() {
        var selectedIDArray = $("#usersTable").bootgrid("getSelectedRows");
        var selectedID = parseInt(selectedIDArray) + 0;
        $.ajax({
            type: "POST",
            url: "includes/data-processors/userajax.php",
            data: {selectedID: selectedID},
            success: function(data) {
                user = JSON.parse(data);
                // set variables
                var userid = user.userid;
                var username = user.username;
                var userlastname = user.userlastname;
                var userfirstname = user.userfirstname;
                // fill form
                $(".userReset #resetuserid").val(userid);
                $(".userReset #resetusername").val(username);
                $(".userReset #userCN").val(userfirstname + " " + userlastname); 
            }  
        });  
        if (selectedID > 0) {
            $('#usersResetModal').modal('show');
        } else {
            alert("Please select a user.");
        }         
    });
}