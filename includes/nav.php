<?php
    // Navigation
    if(isset($_SESSION["username"]) && $_SESSION["usertype"]=="admin"){
        $adminnav = 
            '<!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" 
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="home.php">Top Ace Job Order System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li> <a href="job-order.php">Job Orders</a> </li>
                            <li> <a href="inventory.php">Inventory</a> </li>
                            <li> <a href="employees.php">Employees</a> </li>
                            <li> <a href="clients.php">Clients</a> </li>
                            <li> <a href="job.php">Job</a> </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="user" >
                                    <i class="fa fa-user"></i> <span>' . $_SESSION["username"] . '</span>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="#">...</a> </li>
                                    <li class="divider"></li>
                                    <li> <a href="includes/logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div> 
                </div>              
            </nav>';
        echo $adminnav;
    } 
?>