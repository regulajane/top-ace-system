<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- UPDATE JO Form Modal -->
<div class="modal fade" id="updateFabModal"  role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Job Order</h4>
            </div>
            <div class="fabUpdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            
                            <form class="form-horizontal" method="post" action="includes/data-processors/updatefaborder.php" 
                                id="fabUpdateForm">
                                <div class="control-group col-md-12">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Receipt number:</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="receiptNo" 
                                            name="receiptNo" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Client name:</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="client" 
                                            name="client" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">Fabrications Ordered:</label>
                                    <div class="col-md-3" id="faborderstatus">
                                        <!-- fabrication order status -->
                                    </div>

                                    <div class="col-md-5" id="fabricationsordered">
                                        <!-- fabrications ordered -->
                                    </div>
                                </div>

                                    
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" name="submit" class="btn btn-primary" form="fabUpdateForm" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save Changes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2" onclick="reload() ">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- Remarks -->

<!-- UPDATE Fab Form Modal