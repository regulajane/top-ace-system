
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
                    ><span class="glyphicon glyphicon-ok-sign"></span>Submit</button>
            </div>
        </div>
    </div>
</div> 