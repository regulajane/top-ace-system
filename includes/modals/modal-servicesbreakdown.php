<!-- Access validation -->


<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}

    
?>


<div id="brkdownModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                   
                <h4 class="modal-title" id="myModalLabel"> Receipt no. 
                                    <?php 
                                        // $selectedjoid = $_SESSION['selectedjoid'];
                                        $sqlmaxjoid = "SELECT joborderid from joborders order by joborderid desc limit 1";
                                        $r = $conn->query($sqlmaxjoid);
                                        $rr = $r->fetch_assoc(); 
                                        $maxjoid = $rr['joborderid'];
                                        echo $maxjoid;                                       
                                    ?>
                    
                </h4>

            </div>
            <div class="brkdown modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="../data-processors/servicesbreakdown.php" id="sbForm">
                                
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Services Availed:</label>
                                    <div class="col-md-8">
                                        <?php      
                                            $sqlservices = "SELECT * FROM servicelogs join services using (serviceid) where joborderid = $maxjoid";
                                            $ss = $conn->query($sqlservices);
                                            while($sss = $ss->fetch_assoc()){
                                                $servicesavailed = $sss['servicename']. " - PHP ". $sss['serviceprice'];
                                                // echo $servicesavailed 
                                                echo '<input type="text" class="form-control" id="receiptNo" name="receiptNo" readonly value="'.  $servicesavailed .'">' . "<br>";

                                            }   
                                        ?>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Item List:</label>
                                    <div class="col-md-8">
                                        <?php      
                                            $sqlitem = "SELECT * FROM itemlogs join inventory using (inventoryid) where joborderid = $maxjoid; ";
                                            $is = $conn->query($sqlitem);
                                            while($iss = $is->fetch_assoc()){
                                                $invty = $iss['inventoryname']. " " . $iss['inventorysize'] . " - PHP ". $iss['inventoryprice'];
                                                echo '<input type="text" class="form-control" id="receiptNo" name="receiptNo" readonly value="'.  $invty .'">' . "<br>";

                                            }   
                                        ?>
                                    </div>
                                </div>


                                <hr>


                                
                                

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Services/Items Cost</label>
                                    <div class="col-xs-4">
                                        <?php      
                                            $sqlservices = "SELECT SUM(services.serviceprice) AS servicestotal FROM servicelogs join services using (serviceid) where joborderid = $maxjoid";
                                            $aa = $conn->query($sqlservices);
                                            $aaa = $aa->fetch_assoc();
                                            $servicestotal = $aaa['servicestotal']; 

                                            $sqltotalitemprice = "SELECT SUM(itemprice*itemquantity) AS totalitemprice from itemlogs where joborderid = '$maxjoid' ";
                                            $iprice = $conn->query($sqltotalitemprice);
                                            $iiprice = $iprice->fetch_assoc(); 
                                            $totalitemprice = $iiprice['totalitemprice'];

                                            $tempgrandtotal = $servicestotal + $totalitemprice;    
                                        ?>
                                        <input type="text" class="form-control" id="gt" name="gt" 
                                            value="<?php echo $tempgrandtotal; ?>" readonly>
                                        
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Markup:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" id="markup" name="markup" 
                                            placeholder="0.00" autocomplete="off">
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Discount:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" id="discount" name="discount" 
                                            placeholder="0.00" autocomplete="off">
                                    </div>
                                </div>
                                

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Downpayment:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" id="downpayment" name="downpayment" 
                                            placeholder="500.00" autocomplete="off">
                                    </div>
                                </div>
                                

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal" href="../data-processors/canceljoborder.php">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                <button type="submit" name="submit" class="btn btn-success" form="sbForm" value="submit">
                    <span class="glyphicon glyphicon-ok-sign"></span> Ok</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Empty Form Modal -->
