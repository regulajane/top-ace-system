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
                                             <textarea rows="1" cols="100" class="form-control" id="modelNo" name="modelNo"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                        </div>
                                </div>                                
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Inventory Name:</label>
                                    <div class="controls col-xs-5"> 
                                     <select class="form-control" id="inventoryName" name="inventoryName">
                                                <option value="" disabled selected>Select Name</option>
                                                <option value="engineValve">Engine Valve</option>
                                                <option value="valveSeal">Valve Seal</option>
                                                <option value="valveGuide">Valve Guide</option>
                                                <option value="valveTappet">Valve Tappet</option>
                                                <option value="valveInsertRing">Valve Insert Ring</option>
                                                <option value="gasket">Gasket</option>
                                                <option value="pistonRing">Piston Ring</option>
                                                <option value="mainBearing">Main Bearing</option>
                                                <option value="connectingRodBearing">Connecting Rod Bearing</option>
                                                <option value="thrustWasher">Thrust Washer</option>
                                                <option value="valveSeal">Valve Seal</option>
                                            </select>                                    
                                        
                                    </div>
                                </div>
   
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Size:</label>
                                        <div class="controls col-xs-4">
                                            <select class="form-control" id="inventorySize" name="inventorySize">
                                                <option value="" disabled selected>Select Size</option>
                                                <option value="std">std</option>
                                                <option value=".25">0.25</option>
                                                <option value=".50">0.50</option>
                                                <option value=".75">0.75</option>
                                            </select>         
                                        </div>
                                </div>  
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Quantity:</label>
                                     <div class="controls col-xs-2">
                                    <textarea rows="1" cols="100" class="form-control" id="inventoryquantity" name="inventoryquantity"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                     </div>
                                </div>   
                                <div class="control-group form-group">
                                    <label class="control-label col-xs-3">Price per piece:</label>
                                     <div class="controls col-xs-3">
                                     <textarea rows="1" cols="100" class="form-control" id="inventoryprice" name="inventoryprice"  maxlength="999" style="resize:none" 
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