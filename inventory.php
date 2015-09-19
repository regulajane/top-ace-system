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
        <!-- Job Order Buttons -->
		<div id="inventory">
                <h2>Inventory</h2>
                <p>Information Coming Soon....</p>
                <p>
                    Example.. <br>
                    1. Top 5 items used on job orders<br>
                    2. View Inventory Button
                </p>
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