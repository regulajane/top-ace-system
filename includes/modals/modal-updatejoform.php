<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- UPDATE JO Form Modal -->
<div class="modal fade" id="updateJoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Job Order</h4>
            </div>
            <div class="joEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal">
                                <div class="control-group col-md-6">
                                    <h4 class="modal-title" id="emptyformlabel">Pre-Inspection</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Date:</label>
                                        <div class="col-xs-4">
                                            <input type="date" class="form-control" id="dateOfPrerepairRequest" 
                                                name="dateOfPrerepairRequest" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Vehicle:</label>
                                        <div class="controls col-xs-5">
                                            <input type="text" class="form-control" id="vehicle" name="vehicle" readonly>                  
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Defects/Complain:</label>
                                        <div class="controls col-xs-8">
                                            <textarea rows="3" cols="100" class="form-control" id="defects" name="defects"  
                                                maxlength="999" style="resize:none" placeholder="Defects of the vehicle" 
                                                required readonly></textarea>  
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Nature and Scope of Works to be Done:</label>
                                        <div class="controls col-xs-8">
                                            <textarea rows="3" cols="100" class="form-control" id="natureOfWorksToBeDone" 
                                                name="natureOfWorksToBeDone" maxlength="999" style="resize:none" 
                                                placeholder="Nature and scope of works to be done" required readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Parts to be Procured:</label>
                                        <div class="controls col-xs-8">
                                            <textarea rows="3" cols="100" class="form-control" id="partsToBeProcured" 
                                                name="partsToBeProcured" maxlength="999" style="resize:none" 
                                                placeholder="Parts to be procured for the repair" required readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Requested By:</label>
                                        <div class="controls col-xs-6">
                                            <input type="datetime" class="form-control" id="requestedBy" name="requestedBy" 
                                                placeholder="Name of requestor" required readonly> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal" method="post" action="includes/data-processors/updatejoborder.php" 
                                id="joEditForm">
                                <div class="control-group col-md-6">
                                    <h4 class="modal-title" id="emptyformlabel">Post-Inspection</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Date:</label>
                                        <div class="col-xs-4">
                                        <input type="date" class="form-control" id="dateOfPostrepairRequest" 
                                                name="dateOfPostrepairRequest" 
                                                required data-validation-required-message="">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">JO/WO/Contract No.:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="contractNo" name="contractNo" 
                                                required placeholder="JO/WO/Contract no.">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Amount:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="amount" name="amount" 
                                                required placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Account of:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="accountOf" name="accountOf" 
                                                required placeholder="Account of">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Delivered at:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="deliveredAt" name="deliveredAt" 
                                                required placeholder="Place delivered">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Date Delivered:</label>
                                        <div class="controls col-xs-4">
                                            <input type="date" class="form-control" id="dateDelivered" name="dateDelivered" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Dealer/Contractor:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="contractor" name="contractor" 
                                                required placeholder="Name of contractor">
                                        </div>
                                    </div>
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Invoice Receipt No.:</label>
                                        <div class="controls col-xs-6">
                                            <input type="text" class="form-control" id="invoiceReceiptNo" 
                                                name="invoiceReceiptNo" required placeholder="Invoice receipt no.">
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group col-md-12">
                                    <br>
                                    <hr>
                                    <div class="col-md-5">
                                        <div class="control-group form-group" style="display: none;" >
                                            <label class="control-label col-md-3">Vehicle No:</label>
                                            <div class="controls col-xs-4">
                                                <input type="number" class="form-control" id="vehicleNo" name="vehicleNo">
                                            </div>
                                        </div>
                                        <div class="control-group form-group col-md-8">
                                            <label class="control-label">Vehicle Part/s Maintained:</label>                  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="control-group form-group col-md-8">
                                            <label class="control-label">Remarks:</label>                 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="control-group form-group col-md-12">
                                            <label class="control-label">Other Remarks:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group col-md-12">
                                    <div class="multi-field-wrapper">
                                        <div class="multi-fields">
                                            <div class="multi-field">
                                                 <div class="col-md-5 pull-left">
                                                    <div class="control-group form-group pull-left col-md-12">
                                                        <select class="form-control" id="vehiclePartNo" 
                                                            name="vehiclePartNo[]" required>
                                                            <option value="" disabled selected>
                                                                Select vehicle Part Maintained</option>
                                                            <?php
                                                                $sql = "SELECT * from vehicleparts natural join vehicleparttype"; 
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($resultRow = $result->fetch_assoc()){
                                                                        $t = '<option value="' . 
                                                                                $resultRow['vehiclePartNo'] . '">' . 
                                                                                $resultRow['type'] . " : " . 
                                                                                $resultRow['part'] . '</option>';
                                                                        echo ($t);
                                                                    }
                                                                }
                                                            ?>
                                                        </select>                 
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pull-left">
                                                    <div class="control-group form-group pull-left col-md-12">
                                                        <select class="form-control" id="notes" name="notes[]" required>
                                                            <option value="" disabled selected>Select Remark</option>
                                                            <option value="Adjust">Adjust</option>
                                                            <option value="Repair">Repair</option>
                                                            <option value="Inspect">Inspect</option>
                                                            <option value="Roadcall">Roadcall</option>
                                                            <option value="Preventive Maintenance">Preventive Maintenance</option>
                                                            <option value="Replace/Change">Replace/Change</option>
                                                            <option value="Overhaul">Overhaul</option>
                                                            <option value="Servicing">Servicing</option>
                                                            <option value="Roadside Repair">Roadside Repair</option>
                                                        </select>                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pull-left">
                                                    <div class="control-group form-group pull-left col-md-12">
                                                        <input type="text" class="form-control" id="remark" 
                                                            name="remark[]" placeholder="Other remarks">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" onclick="clearForm()">Clear All</button>
                <button type="submit" name="submit" class="btn btn-primary" form="joEditForm" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- Remarks -->
<script>
    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });
</script>
<!-- UPDATE JO Form Modal