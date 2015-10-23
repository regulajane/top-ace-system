<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- EDIT Fab Form Modal -->
<div class="modal fade" id="editFabModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Fabrication Order</h4>
            </div>
            <div class="fabEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" 
                                id="fabForm">
                                <hr>
                                <!-- Receipt number -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Receipt number:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" id="receiptNo" 
                                            name="receiptNo" readonly>
                                    </div>
                                </div>

                                <!-- Client name -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Client name:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" id="client" 
                                            name="client" readonly>
                                    </div>
                                </div>

                                <!-- Date brought -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Date Started:</label>
                                    <div class="col-xs-5">
                                        <input type="date" class="form-control" id="dateStarted" 
                                            name="dateBrought" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Job Order Price:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" id="fabjoborderprice" 
                                            name="fabjoborder" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Downpayment:</label>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" id="downpayment" 
                                            name="downpayment" readonly>
                                    </div>
                                </div>
                                <br>
                                <h4 class="modal-title" id="emptyformlabel">Fabrication Order/s</h4>
                                <hr>
                                <div class="multi-field-wrapper">
                                    <div class="multi-fields">
                                        <div class="multi-field">

                                            <div class="form-group">
                                                <div class="col-xs-6" id="fabricationorders">
                                                    
                                        




                                                </div>
                                            </div>
                                            <button type="button" class="add-field btn btn-default" 
                                                    id="addfield"><i class="fa fa-plus"></i>Add More...</button>
                                            <button type="button" class="remove-field btn btn-default" 
                                                    id="removefield"><i class="fa fa-minus"></i>Remove Field</button>
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
                <button type="submit" name="submit" class="btn btn-primary" form="fabEditForm" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- EDIT JO Form Modal