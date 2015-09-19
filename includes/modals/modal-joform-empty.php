<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="joModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
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
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Date:</label>
                                    <div class="col-xs-3">
                                        <input type="date" class="form-control" id="dateOfPrerepairRequest" 
                                            name="dateOfPrerepairRequest" required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Vehicle:</label>
                                    <div class="controls col-xs-5">
                                        <select class="form-control" id="description" name="description" required>
                                            <option value="" disabled selected>Select vehicle</option>
                                            <?php
                                                $sql = "SELECT * from vehicle"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['vehicleNo'] . '">' . 
                                                            $resultRow['brand'] . " " . $resultRow['name'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Defects/Complain:</label>
                                    <div class="controls col-xs-8">
                                        <textarea rows="3" cols="100" class="form-control" id="defects" name="defects"
                                            maxlength="999" style="resize:none" placeholder="Defects of the vehicle" 
                                                required></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Nature and Scope of Works to be Done:</label>
                                    <div class="controls col-xs-8">
                                        <textarea rows="3" cols="100" class="form-control" id="natureOfWorksToBeDone" 
                                            name="natureOfWorksToBeDone"  maxlength="999" style="resize:none" 
                                            placeholder="Nature and scope of works to be done" required></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Parts to be Procured:</label>
                                    <div class="controls col-xs-8">
                                        <textarea rows="3" cols="100" class="form-control" id="partsToBeProcured" 
                                            name="partsToBeProcured"  maxlength="999" style="resize:none" 
                                            placeholder="Parts to be procured for the repair" required></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Requested By:</label>
                                    <div class="controls col-xs-4">
                                        <input type="text" class="form-control" id="requestedBy" name="requestedBy" 
                                            placeholder="Name of requestor" required>
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
                <button type="submit" name="submit" class="btn btn-primary" form="joForm" value="submit">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Empty Form Modal -->