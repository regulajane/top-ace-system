window.onload = function () {

    navbar();
    
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

    $('.sales #salemodel').typeahead({
        name: 'salemodel',
        remote:'includes/data-processors/searchmodel.php?key=%QUERY',
        limit : 8
    });

    $('.sales #salename').typeahead({
        name: 'salename',
        remote:'includes/data-processors/searchinv.php?key=%QUERY',
        limit : 8
    });

    $('#salesForm').bootstrapValidator({
        feedbackIcons: {
            message: 'This value is not valid',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            saleci: {
                validators: {
                    notEmpty: {
                        message: 'Cash invoice no. is required'
                    }
                }
            },
            salemodel: {
                validators: {
                    notEmpty: {
                        message: 'Model no. is required'
                    }
                }
            },
            salename: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            saleqty: {
                validators: {
                    notEmpty: {
                        message: 'Quantity is required'
                    }
                }
            },
            saledate: {
                validators: {
                    notEmpty: {
                        message: 'Date is required'
                    }
                }
            }
        }
    });
}

function navbar(){
    var activeEl = 2;
    var items = $('.navbar .btn-nav');
    $( items[activeEl] ).addClass('active');
}