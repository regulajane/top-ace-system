<!-- EDIT JO Form Modal -->
<div class="modal fade" id="editJoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true" onload="showServiceBreakdown()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">Edit Job Order</h4>
            </div>
            <div class="joEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Receipt number:</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="receiptNo" 
                                            name="receiptNo" readonly>
                                    </div>
                                </div>

                                <!-- Client name -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Client name:</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="client" 
                                            name="client" readonly>
                                    </div>
                                </div>

                                <!-- Date brought -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Received:</label>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" id="dateBrought" 
                                            name="dateBrought">
                                    </div>
                                </div>

                                <!-- Problem -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Problems:</label>
                                    <div class="col-md-7">
                                        <!-- <input type="text" class="form-control" id="problem" 
                                            name="problem" readonly> -->
                                        <textarea rows="3" cols="100" class="form-control" id="problem" name="problem"
                                            maxlength="999" style="resize:none">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Services Availed:</label>
                                    <div class="col-md-6" id="servicesavailed">
                                        <!-- <input type="text" class="form-control" id="servicesavailed" 
                                            name="servicesavailed" readonly> -->
                                        <!-- <textarea rows="3" cols="100" class="form-control" id="servicesavailed" name="servicesavailed"
                                            maxlength="999" style="resize:none" readonly>
                                        </textarea> -->
                                        




                                    </div>
                                </div>



                               


                            </form>
                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="submit" class="btn btn-success" form="joEditForm2" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save Changes</button>
            </div>
        </div>
    </div>
</div> 
<!-- EDIT JO Form Modal