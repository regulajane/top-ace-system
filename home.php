<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <link href="css/bootstrap-home.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="images/ta.ico">
    
    <title>Home</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <div class="logo wow fadeInDown"> <a href=""><img src="images/logo-home.png" alt="logo"></a></div>
                    <small>Auto Supply and Motor Works</small><br>
                </h1>
                <h1 id="currentDateTime"></h1>
            </div>
        </div>
        <div class="container" id="homenav">
			<div class="row">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="job.php" type="button" class="btn btn-nav">
                            <i class="fa fa-list-alt fa-5x"></i>
                            <p>Job</p>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="inventory.php" type="button" class="btn btn-nav">
                            <i class="fa fa-bus fa-5x"></i> 
                            <p>Inventory</p>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="job-order.php" type="button" class="btn btn-nav">
                            <i class="fa fa-folder-open fa-5x"></i>
                            <p>Job Orders</p>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="clients.php" type="button" class="btn btn-nav">
                            <i class="fa fa-book fa-5x"></i>
                            <p>Clients</p>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="employees.php" type="button" class="btn btn-nav">
                            <i class="fa fa-book fa-5x"></i>
                            <p>Employees</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>