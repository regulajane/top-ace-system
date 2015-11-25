<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(isset($_SESSION["username"]) && ($_SESSION["usertype"] == "frontdesk")) {
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
            <div class="btn-group">
                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Upload Files </a>
                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="modal"  href="#importNewClients">
                        <i class="fa fa-list"></i> New Clients (.excel)</a></li>
                </ul>
            </div>
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
    </div>  
</div>
</body>
</html>