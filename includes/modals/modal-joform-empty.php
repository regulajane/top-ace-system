<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="joModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">New Job Order</h4>
            </div>
            <div class="joEmpty modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/newjoborder.php" 
                                id="joForm">
                                <h4 class="modal-title" id="emptyformlabel">Pre-Inspection</h4>
                                <hr>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Client Name:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="clientid" name="clientid" required>
                                            <option value="" disabled selected>Select client</option>
                                            <?php
                                                $sql = "SELECT * from clients ORDER BY cllastname ASC"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['clientid'] . '">' . 
                                                            $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Date Received:</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" id="dateBrought" 
                                            name="dateBrought" required>
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Engine Model:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="modelid" name="modelid">
                                            <option value="" disabled selected>Select model</option>
                                            <?php
                                                $sql = "SELECT * from models"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['modelid'] . '">' . 
                                                            $resultRow['modelno'] . " " . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Engine number:</label>
                                    <div class="controls col-md-4">
                                        <input type="text" class="form-control" id="engnumber" name="engnumber" 
                                            placeholder="" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Problems:</label>
                                    <div class="controls col-md-8">
                                        <textarea rows="3" cols="100" class="form-control" id="problem" name="problem"
                                            maxlength="999" style="resize:none" placeholder="" 
                                                required></textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <h4 class="modal-title text-center" id="emptyformlabel">Services</h4>
                                        <hr>
                                        <div class="control-group form-group">
                                            <div class="multi-field-wrapper">
                                                <div class="multi-fields">
                                                    <div class="multi-field">
                                                         <div class="col-md-9 pull-left">
                                                            <div class="control-group form-group pull-left col-md-12">
                                                                <select class="form-control" id="serviceid" 
                                                                    name="serviceid[]" required>
                                                                    <option value="" disabled selected>
                                                                        Select service</option>
                                                                    <?php
                                                                        $sql = "SELECT * from services"; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $t = '<option value="' . 
                                                                                        $resultRow['serviceid'] . '">' . 
                                                                                        $resultRow['servicename'] .' - ' .
                                                                                        $resultRow['serviceprice'] . 
                                                                                    '</option>';

                                                                                echo ($t);
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>                 
                                                            </div>
                                                        </div>
                                                        <button type="button" class="pull-left add-field btn btn-default" 
                                                            id="addfield"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="pull-left remove-field btn btn-default" 
                                                            id="removefield"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="modal-title text-center" id="emptyformlabel">Machinist/s</h4>
                                        <hr>
                                        <div class="control-group form-group">
                                            <div class="multi-field-wrapper">
                                                <div class="multi-fields">
                                                    <div class="multi-field">
                                                         <div class="col-md-9 pull-left">
                                                            <div class="control-group form-group pull-left col-md-12">
                                                                <select class="form-control" id="employeeid" 
                                                                    name="employeeid[]" required>
                                                                    <option value="" disabled selected>
                                                                        Select Machinist</option>
                                                                    <?php
                                                                        $sql = "SELECT * from employees where emptype = 'Machinist' "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                                    $resultRow['emplastname'] . ", " . $resultRow['empfirstname'] .  " " . $resultRow['empmiddlename'] . '</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>                 
                                                            </div>
                                                        </div>
                                                        <button type="button" class="pull-left add-field btn btn-default" 
                                                            id="addfield"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="pull-left remove-field btn btn-default" 
                                                            id="removefield"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <!-- <div class="control-group form-group">
                                    <label class="control-label col-md-3">Downpayment:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" id="downpayment" name="downpayment" 
                                            placeholder="0.00" required autocomplete="off">
                                    </div>
                                </div>-->
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Received by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="salesperson" 
                                            name="salesperson" required>
                                            <option value="" disabled selected>
                                                Select Sales Person</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS frontdesk from employees where emptype = 'Front Desk Personnel' "; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['frontdesk'] . '">' . 
                                                            $resultRow['frontdesk'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Confirmed by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="supervisor" 
                                            name="supervisor" required>
                                            <option value="" disabled selected>
                                                Select Supervisor</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS manager from employees where emptype = 'Manager' "; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['manager'] . '">' . 
                                                            $resultRow['manager']. '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>  
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" 
                    onclick="clearForm()">Clear All</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="submit" class="btn btn-success" form="joForm" value="submit" >
                    <span class="glyphicon glyphicon-ok-sign"></span> Next</button>
            </div>
        </div>
    </div>
</div> <!-- JO Empty Form Modal -->

