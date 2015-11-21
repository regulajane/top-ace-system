<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script>
    function addOrder(){
    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });

}
</script>
    <title>Clients</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container" id="clients">          
        <div class="actionBtns">
            <button type="button" id="newclientbtn" class="btn btn-info" data-toggle="modal" 
                href="#clientModal"><i class="fa fa-plus fa-fw"></i> New Client </button>
            <button style= "Display: none;" type="button" id="addfaborderbtn" class="btn btn-info" data-toggle="modal" href="#clientfabModal">
                                            <i class="fa fa-plus fa-fw"></i> ADD JOB ORDER </button>
        </div>
        <!-- ClientsTable -->
        <div>
            <table  id="clientsTable" class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="clientid" data-visible="false" data-identifier="true">
                            Client ID</th>
                        <th data-column-id="cllastname">
                            Lastname</th>
                        <th data-column-id="clfirstname">
                            Firstname</th>
                        <th data-column-id="clmidinitial">
                            M.I.</th>
                        <th data-column-id="clgender">
                            Gender</th>
                        <th data-column-id="clcelno">
                            Contact No.</th>
                        <th data-column-id="claddress" data-width="30%">
                            Address</th>
                        <th data-column-id="clsince">
                            Client Since</th>
                    </tr>
                </thead>  
            </table>
        </div>
        <?php include 'includes/modals/modal-client.php'; ?>
        <?php include 'includes/footer.php'; ?>
        <?php 
    include 'includes/modals/modal-client-fabform-empty.php';
        ?>
    </div>  
</div>
</body>
    <script>
        window.onload = function(){
            document.getElementById("addfaborderbtn").click();
            addOrder();
        }
    </script>
</html>