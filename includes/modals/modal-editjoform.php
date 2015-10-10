<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- EDIT JO Form Modal -->
<div class="modal fade" id="editJoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true" onload="showServiceBreakdown()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Job Order</h4>
            </div>
            <div class="joEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal">
                                <h4 class="modal-title" id="emptyformlabel">Service/s Breakdown</h4>
                                <hr>
                                <!-- Receipt number -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Receipt number:</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" id="receiptNo" 
                                            name="receiptNo" readonly>
                                    </div>
                                </div>

                                <!-- Client name -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Client name:</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" id="client" 
                                            name="client" readonly>
                                    </div>
                                </div>

                                <!-- Date brought -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Date Brought:</label>
                                    <div class="col-xs-3">
                                        <input type="date" class="form-control" id="dateBrought" 
                                            name="dateBrought" readonly>
                                    </div>
                                </div>

                                <!-- Problem -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Problem:</label>
                                    <div class="col-xs-6">
                                        <!-- <input type="text" class="form-control" id="problem" 
                                            name="problem" readonly> -->
                                        <textarea rows="3" cols="100" class="form-control" id="problem" name="problem"
                                            maxlength="999" style="resize:none" readonly>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Services Availed:</label>
                                    <div class="col-xs-6">
                                        <!-- <input type="text" class="form-control" id="problem" 
                                            name="problem" readonly> -->
                                        <textarea rows="3" cols="100" class="form-control" id="servicesavailed" name="servicesavailed"
                                            maxlength="999" style="resize:none" readonly>
                                        </textarea>
                                    </div>
                                </div>



                               

                                <!-- Symptoms -->
                                


                            </form>
                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" onclick="clearForm()">Clear All</button>
                <button type="submit" name="submit" class="btn btn-primary" form="joEditForm2" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- EDIT JO Form Modal