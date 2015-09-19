<?php
    // Access validation
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
    // Navigation
    if(isset($_SESSION["username"])){
        $level1nav = 
            '<!-- Admin Navigation -->
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
                        <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Top Ace Job Order System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="job-order.php">Job Orders</a>
                            </li>
                            <li>
                                <a href="inventory.php">Inventory</a>
                            </li>
                            <li>
                                <a href="employees.php">Employees</a>
                            </li>
                            <li>
                                <a href="clients.php">Clients</a>
                            </li>
                            <li>
                                <a href="job.php">Job</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="user" >
                                    <i class="fa fa-user"></i> <span>' . $_SESSION["username"] . '</span>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="systemusers.php"  class="btn btn-default btn-sm" 
                                            style="text-align:left;  margin: 0px 5px 5px 5px;">View Users</a>
                                        <a href="sessionlogs.php"  class="btn btn-default btn-sm" 
                                            style="text-align:left;  margin: 0px 5px 5px 5px;">Session Logs</a>
                                        <a href="includes/logout.php"  class="btn btn-default btn-sm" 
                                            style="text-align:left;  margin: 5px 5px 0px 5px;">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>';
        echo $level1nav;
    } else { 
        $level2nav = 
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
                        <a class="navbar-brand" href="home.php"><i class="fa fa-home"></i>Vehicle Tracking System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="job-order.php">Job Orders</a>
                            </li>
                            <li>
                                <a href="vehicle-records.php">Vehicle Records</a>
                            </li>
                            <li>
                                <a href="supplies.php">Supplies</a>
                            </li>
                            <li>
                                <a href="help.php">Help</a>
                            </li>
                            <li>
                                <a href="includes/logout.php">Logout</a>
                            </li>
                            <li>
                                <a><i class="fa fa-user"></i>' ." ". $_SESSION["username"] . '</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>';
        echo $level2nav;
    }
?>