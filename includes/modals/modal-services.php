<!-- ADD Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Service</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/addservice.php" id="addserviceform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Service Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="servicename" name="servicename" 
                                                required placeholder="Service Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Price:</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="serviceprice" name="serviceprice" 
                                                required placeholder="Price">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="submit" class="btn btn-success" form="addserviceform" value="submit" 
                    id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>  
            </div>
        </div>
    </div>
</div> 
<!-- ADD Service Modal -->


<!-- UPDATE Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit/Update Service</h4>
            </div>
            <div class="servUpdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/updateservice.php" id="updateserviceform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Service Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="servicename" name="servicename" 
                                                required placeholder="Service Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Price:</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="serviceprice" name="serviceprice" 
                                                required placeholder="Price">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="submit" class="btn btn-success" form="updateserviceform" value="submit" 
                    id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>  
            </div>
        </div>
    </div>
</div> 
<!-- UPDATE Service Modal

<!-- DELETE Service Modal -->
<div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to DELETE this service?</h4>
            </div>
            <div class="servUpdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/deleteservice.php" id="deleteserviceform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Service Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="servicename" name="servicename" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Price:</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="serviceprice" name="serviceprice" readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> No</button>
                <button type="submit" name="submit" class="btn btn-success" form="deleteserviceform" value="submit" 
                    id="deletebtn"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>  
            </div>
        </div>
    </div>
</div> 
<!-- DELETE Service Modal