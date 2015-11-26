<div class="modal fade" id="salesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Sale</h4>
            </div>
            <div class="sales modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/sales.php" id="salesForm">
                                <div class="control-group col-md-20">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Cash Invoice No.:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  placeholder="Cash Invoice No."
                                                id="saleci" name="saleci" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Item:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="typeahead form-control"  placeholder="Model No. - Name - Size"
                                                id="saleitem" name="saleitem" autocomplete="off" size="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Quantity:</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" placeholder="Quantity"
                                                id="saleqty" name="saleqty"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Date:</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" placeholder="Date"
                                                id="saledate" name="saledate" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="savedata" class="btn btn-success" form="salesForm" value="Save">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Save </button>  
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
</div> <!-- /.addSale -->


