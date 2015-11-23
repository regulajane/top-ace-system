<div class="modal fade" id="addNewFab" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">New Item</h4>
            </div>
            <div class="newFab modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="includes/data-processors/addnewfab.php" 
                              id="newFabForm">
                                <div class="control-group col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Fabrication Name:</label>
                                    <div class="col-md-6">
                                    <input type="text" class="typeahead form-control" id="itemname" placeholder="Fabrication Name"
                                           name="itemname" size="20" autocomplete="off" required>
                                     </div>
                                </div>     

                              <div class="control-group form-group">
                                    <label class="control-label col-md-4">Diameter:</label>
                                        <div class="col-md-6">
                                        <input type="number" class="typeahead form-control" id="itemsizediam" placeholder="Diameter"
                                           name="itemsizediam" size="20" autocomplete="off" required>             
                                    </div>
                                </div>
                                 <div class="control-group form-group">
                                    <label class="control-label col-md-4">Length:</label>
                                        <div class="col-md-6">
                                        <input type="number" class="typeahead form-control" id="itemsizelength" placeholder="Inventory Name"
                                           name="itemsizelength" size="20" autocomplete="off" required>             
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                                        <button type="submit" name="save" class="btn btn-success" form="newFabForm" value="save" id="savebtn">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Save</button> 
                                    </div> 
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
            </div>
        </div>
    </div>
</div> 