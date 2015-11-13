<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/clients-script.js"></script>
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
            <button type="button" id="editupdatebtn" class="btn btn-info" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
        </div>
        <!-- ClientsTable -->
        <div>
            <table  id="clientsTable" class="table table-condensed table-hover">
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
    </div>  
</div>
</body>
</html>