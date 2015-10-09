<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- Add New Supply Form] -->
<div class="modal fade" id="addNewSupply" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Supply</h4>
            </div>
            <div class="joEmpty modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/addnewsupply.php" 
                              id="newSupplyForm">
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Model No:</label>
                                        <div class="controls col-xs-3">
                                             <textarea rows="1" cols="100" class="form-control" id="type" name="type"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                        </div>
                                </div>                                
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Inventory Name:</label>
                                    <div class="controls col-xs-5">                                     
                                         <textarea rows="1" cols="100" class="form-control" id="inventoryname" name="inventoryName"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                    </div>
                                </div>
   
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Size:</label>
                                        <div class="controls col-xs-3">
                                            <textarea rows="1" cols="100" class="form-control" id="inventorysize" name="size"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                        </div>
                                </div>  
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Quantity:</label>
                                     <div class="controls col-xs-2">
                                    <textarea rows="1" cols="100" class="form-control" id="inventoryquantity" name="quantity"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                     </div>
                                </div>   
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Price per piece:</label>
                                     <div class="controls col-xs-3">
                                     <textarea rows="1" cols="100" class="form-control" id="inventoryprice" name="price"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                     </div>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" onclick="clearForm()">Clear All</button>
                <button type="submit" name="submit" class="btn btn-primary" form="newSupplyForm" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Empty Form Modal -->