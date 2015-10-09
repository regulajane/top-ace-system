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
                        <a class="navbar-brand" href="home.php">Top Ace Job Order System</a>
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
                                        <a href="systemusers.php">View Users</a>
                                    </li>
                                    <li>
                                        <a href="sessionlogs.php">Session Logs</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="includes/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="notification_li">

                                <span id="notification_count">5</span>
                                <a id="notificationLink"
                                        class="glyphicon glyphicon-exclamation-sign" 
                                    aria-hidden="true" style="font-size:25px;"></a>
                                <div id="notificationContainer">
                                <div id="notificationTitle">Notifications</div>
                                <div id="notificationsBody" class="notifications"></div>
                                <div id="notificationFooter"><a href="#">See All</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                 <script>

$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click hiding the popup 
$(document).click(function()
{
$("#notificationContainer").hide();
});

//Popup on click
$("#notificationContainer").click(function()
{
return false;
});

}); 
                </script>
            </nav>'
           ;
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