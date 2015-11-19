<?php
    // Navigation
    if(isset($_SESSION["username"]) && ($_SESSION["usertype"] = "admin")){
        $adminnav = 
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
                        <a class="navbar-brand btn-nav" href="home.php">Top Ace Job Order System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                       
                            <li><a href="job-order.php" class="btn-nav">Job Orders</a></li>
                            <li><a href="sales.php" class="btn-nav">Sales</a></li>
                            <li><a href="inventory.php" class="btn-nav">Inventory</a></li>
                            <li><a href="clients.php" class="btn-nav">Clients</a></li>
                            <li><a href="services.php" class="btn-nav">Services</a></li>
                            <li><a href="employees.php" class="btn-nav">Employees</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="user" >
                                    <i class="fa fa-user"></i> <span>' . $_SESSION["username"] . '</span>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="includes/logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <li id="notification_li">
                                <span id="notification_count"></span>
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
                    if(localStorage["notif"] == null){
                        //localStorage["notif"] = "0";
                    }else if (parseInt(localStorage["notif"]) != 0){
                    /*document.getElementById("notification_count").innerHTML = localStorage["notif"];

                    var text = localStorage["nDetails"];
                     
                    var newNotif = document.createElement("p");
                    var node = document.createTextNode(text);
                    newNotif.appendChild(node);

                    var element = document.getElementById("notificationsBody");
                    element.appendChild(newNotif);*/
                    }
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
                <style>
                    #notificationsBody p {
                        text-align: center;
                        padding: 20px 0;
                        background-color: #CAA0A0;
                    }
                </style>
            </nav>';
            $testNotif = $conn->query("SELECT count(*) from notification");
                    while ($row=mysqli_fetch_row($testNotif))
                         {
                           $notifCount = $row[0];
                         }

                    if($notifCount > 0){
                            echo "<script>alert('asa');</script>";

                    }
                //do the math
        echo $adminnav;

    } else { 
    }
?>