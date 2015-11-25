
<div class="modal fade" id="importNewItemsFabrication" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Items</h4>
            </div>
            <div class="invImportNewItems modal-body">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/importNewItemsFabrication.php" 
                                id="importNewItemsForm"
                                enctype="multipart/form-data">
                                <input required type="file" name="excelfileNewItems" 
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"/>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">  
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="ini" class="btn btn-success" form="importNewItemsForm" value="ini" 
                    ><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
            </div>
        </div>
    </div>
</div>

 <!-- Edit Fabrication -->
 <div class="modal fade" id="editFab" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">EDIT ITEM</h4>
            </div>
            <div class="editFabClass modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="includes/data-processors/editFab.php" 
                              id="editFabForm" novalidate>
                                <div class="control-group col-md-12">
                                <div class="form-group hide">
                                    <label class="control-label col-md-4">Fabrication Name:</label>
                                    <div class="col-md-6">
                                    <input type="text" class="typeahead form-control" id="itemid" placeholder="Fabrication Name"
                                           name="itemid" size="20" autocomplete="off" >
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Fabrication Name:</label>
                                    <div class="col-md-6">
                                    <input type="text" class="typeahead form-control" id="itemname" placeholder="Fabrication Name"
                                           name="itemname" size="20" autocomplete="off" >
                                     </div>
                                </div>     

                              <div class="control-group form-group">
                                    <label class="control-label col-md-4">Diameter:</label>
                                        <div class="col-md-6">
                                        <input type="number" min="0" class="typeahead form-control" id="itemsizediam" placeholder="Diameter"
                                           name="itemsizediam" size="20" autocomplete="off" >             
                                    </div>
                                </div>
                                 <div class="control-group form-group">
                                    <label class="control-label col-md-4">Length:</label>
                                        <div class="col-md-6">
                                        <input type="number" min="0" class="typeahead form-control" id="itemsizelength" placeholder="Inventory Name"
                                           name="itemsizelength" size="20" autocomplete="off">             
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                                        <button type="submit" name="editfab" class="btn btn-success" form="editFabForm" value="Edit Fab">
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