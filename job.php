<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include 'includes/header.php';
            include 'includes/head-elements.php'; ?>
    <script src="js/jo-script.js"></script>
    <title>Job Order</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <br />
    <div class="container">   
        <div class="jumbotron" style="height: 100px;">
            <h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Job</h2>
        </div>       
        <!-- Job Order Buttons -->
		  
            <div id="job">
                <h2>Job</h2>
                <p>Information Coming Soon....</p>
                <p>Example.. <br>
                    1. Top Job Orders availed <br>
                    2. View Jobs Button</p>
            </div>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
    <!-- Job Order Modals -->
    <?php 
        include 'includes/modals/modal-joform-empty.php';
        include 'includes/modals/modal-editjoform.php';
        include 'includes/modals/modal-updatejoform.php';
        include 'includes/modals/modal-jopreform.php';
        include 'includes/modals/modal-jopostform.php';
    ?>   
</body>
</html>