<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>
    <script src="js/clients-script.js"></script>
    <title>Clients</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
    <div class="container" id="clients">          
        <h2>Clients</h2>
        <hr>
        <div class="actionBtns">
            <button type="button" id="newclientbtn" class="btn btn-primary" data-toggle="modal" 
                href="#clientModal"><i class="fa fa-plus fa-fw"></i> New Client </button>
            <button type="button" id="editupdatebtn" class="btn btn-primary" data-toggle="modal">
                <i class="fa fa-pencil-square-o fa-fw"></i> Edit/Update </button>
        </div>
        <!-- ClientsTable -->
        <div>
            <table  id="clientsTable" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th data-column-id="clientid" data-visible="false" data-identifier="true">
                            Client ID</th>
                        <th data-column-id="lastname">
                            Lastname</th>
                        <th data-column-id="firstname">
                            Firstname</th>
                        <th data-column-id="middleinitial">
                            M.I.</th>
                        <th data-column-id="celno">
                            CP No.</th>
                        <th data-column-id="address">
                            Address</th>
                    </tr>
                </thead>  
            </table>
        </div>
        <hr>
        <?php include 'includes/modals/modal-client.php'; ?>
        <?php include 'includes/footer.php'; ?>
    </div>  
</body>
</html>