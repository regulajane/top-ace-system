<!-- Add New Supply Form] -->
<div class="modal fade" id="addNewSupply" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">New Item</h4>
            </div>
            <div class="newSupply modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="includes/data-processors/addnewsupply.php" 
                              id="newSupplyForm">
                                <div class="control-group col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Model No:</label>
                                    <div class="col-md-6">
                                    <input type="text" class="typeahead form-control" id="modelno" placeholder="Model No."
                                           name="modelno" size="20" autocomplete="off" required>
                                     </div>
                                </div>     

                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Item Name:</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="inventoryname" name="inventoryname">
                                                <option value="" disabled selected>Item Name</option>
                                                <option value="Engine Valve">Engine Valve</option>
                                                <option value="Valve Seal">Valve Seal</option>
                                                <option value="Valve Guide">Valve Guide</option>
                                                <option value="Valve Tappet">Valve Tappet</option>
                                                <option value="Valve Insert Ring">Valve Insert Ring</option>
                                                <option value="Gasket">Gasket</option>
                                                <option value="Piston Ring">Piston Ring</option>
                                                <option value="Main Bearing">Main Bearing</option>
                                                <option value="Connecting Rod Bearing">Connecting Rod Bearing</option>
                                                <option value="Thrust Washer">Thrust Washer</option>
                                                <option value="Valve Seal">Valve Seal</option>
                                            </select>                                   
                                    </div>
                                </div>
   
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Size:</label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="inventorysize" name="inventorysize">
                                                <option value="" disabled selected>Size</option>
                                                <option value="0.25" >0.25</option>
                                                <option value="0.50" >0.50</option>
                                                <option value="0.75" >0.75</option>
                                                <option value="STD " >STD</option>
                                            </select>         
                                        </div>
                                </div>  
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Quantity:</label>
                                     <div class="col-md-4">
                                    <textarea rows="1" cols="100" class="form-control" id="inventoryquantity" name="inventoryquantity"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                     </div>
                                </div>   
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Price per piece:</label>
                                     <div class="col-md-4">
                                     <textarea rows="1" cols="100" class="form-control" id="inventoryprice" name="inventoryprice"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                     </div>
                                </div> 
                                <div class="control-group form-group">
                                     <label class="control-label col-md-4">Reorder Level:</label>
                                     <div class="col-md-4">
                                      <textarea rows="1" cols="100" class="form-control" id="reorderlevel" name="reorderlevel"  maxlength="999" style="resize:none" 
                                            required></textarea>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                                        <button type="submit" name="save" class="btn btn-success" form="newSupplyForm" value="save" id="savebtn">
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
<!-- end of add new supply -->

<!-- Modal Add Supply -->
<div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add</h4>
            </div>
            <div class="addProcSup modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/addSupply.php" id="supplyForm2">
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Model No. :</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="modelNum" name="modelNum"/>
                                    </div>
                                </div>
                                 <div class="control-group form-group" style="display: none">
                                    <label class="control-label col-md-4">Inventory ID:</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="inventID" name="inventID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Item Name:</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="inventName" name="inventName"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Size:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventSize" name="inventSize"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Price:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventPrice" name="inventPrice"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Reorder Level:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="rl" name="rl"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Current Quantity:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventQty" name="inventQty"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Add:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" name="inventQtyAdded" id="inventQtyAdded"
                                            required placeholder="Quantity"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                    <button type="submit" name="inoutsupply" class="btn btn-success" form="supplyForm2" value="Add Supply">
                                        <span class="glyphicon glyphicon-ok-sign"></span> Add </button>  
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
</div> <!-- /.modal


<!-- Modal Procure Supply -->
<div class="modal fade" id="procSuppliesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Procure</h4>
            </div>
            <div class="addProcSup modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/procureSupply.php" id="supplyForm3">
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Model No. :</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="modelNum" name="modelNum"/>
                                    </div>
                                </div>
                                 <div class="control-group form-group" style="display: none">
                                    <label class="control-label col-md-4">Inventory ID:</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="inventID" name="inventID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Item Name:</label>
                                    <div class="controls col-md-6">
                                        <input readonly type="text" class="form-control" id="inventName" name="inventName"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Size:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventSize" name="inventSize"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Price:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventPrice" name="inventPrice"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Reorder Level:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="rl" name="rl"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Current Quantity:</label>
                                    <div class="controls col-md-4">
                                        <input readonly type="text" class="form-control" id="inventQty" name="inventQty"/>
                                    </div>
                                </div>

                                 <div class="form-group">
                                   
                                        <label class="control-label col-md-4">Reason:</label>
                                        <div class="col-md-8">
                                            <div class="radio">
                                                <label><input type="radio" name="choice" value="sales" id="sales" onclick="deleteTextBox()" required/> Sales</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="choice" onclick="showTextBox()" id="others" /> Others (Please Specify):</label>
                                                <div class="controls col-md-12" id ="reasonOfP">
                                                <script>
                                                    function showTextBox(){
                                                        if(document.getElementById('others').checked) {
                                                            if(document.getElementById('textArea') == null) {
                                                                document.getElementById("reasonOfP").disabled = true;
                                                                var r = document.getElementById("reasonOfP");
                                                                var tb = document.createElement("textarea");
                                                                    tb.setAttribute('id',"textArea");
                                                                    tb.setAttribute('class',"form-control");
                                                                    tb.setAttribute('rows',"3");
                                                                    tb.setAttribute('maxlength',"300");
                                                                    tb.setAttribute('placeholder',"...");
                                                                r.appendChild(tb);   
                                                            }
                                                        }
                                                    }

                                                    function deleteTextBox(){
                                                        if(document.getElementById('textArea') != null) {
                                                            var r = document.getElementById("reasonOfP");
                                                            var tb = document.getElementById("textArea");
                                                            r.removeChild(tb);
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-4">Procure:</label>
                                    <div class="controls col-md-4">
                                        <input type="number" class="form-control" name="inventQtyProcured" id="inventQtyProcured"
                                            required placeholder="Quantity"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                    <button type="submit" name="outsupply" class="btn btn-success" form="supplyForm3" value="Procure Supply">
                                        <span class="glyphicon glyphicon-ok-sign"></span> Procure </button>
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
</div> <!-- /.modal

<!-- Delete Supply -->
<div class="modal fade" id="deleteSuppliesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Supply</h4>
            </div>
            <div class="addProcSup modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/deleteSupply.php" id="supplyForm4" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Model No:</label>
                                        <input readonly type="text" class="form-control" id="modelNum" name="modelNum"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12" style="display: none">
                                        <label>Inventory ID:</label>
                                        <input readonly type="text" class="form-control" id="inventID" name="inventID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Item Name:</label>
                                        <input readonly type="text" class="form-control" id="inventName" name="inventName"
                                            required data-validation-required-message="Please enter item name."/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Size:</label>
                                        <input readonly type="text" class="form-control" id="inventSize" name="inventSize"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Price:</label>
                                        <input readonly type="text" class="form-control" id="inventPrice" name="inventPrice"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-4">
                                        <label>Quantity:</label>
                                        <input readonly type="text" class="form-control" id="inventQty" name="inventQty"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="deleteSupply" class="btn btn-success" form="supplyForm4" 
                    value="Delete Supply">
                    <span class="glyphicon glyphicon-ok-sign"></span> Delete </button>
            </div>
        </div>
    </div>
</div>

<!-- EDIT SUPPLY -->
<div class="modal fade" id="editSupplyModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="invEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/editsupply.php" id="editsupplyform">

                                <div class="control-group col-md-12">
                                <div class="control-group form-group" style="display: none">
                                    <label class="control-label col-md-4">Inventory ID:</label>
                                    <div class="controls col-md-12">
                                        <input readonly type="text" class="form-control" id="inventID" name="inventID"/>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Model No:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="modelno" name="modelno" 
                                                required >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Item Name:</label>
                                        <div class="col-md-6">
                                           <input type="text" class="form-control" id="inventName" name="inventName"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Size:</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" id="inventSize" name="inventSize" >                                          
<!--                                                 <select class="form-control" id="inventSize" name="inventorysize">
                                                    <option value="std">std</option>
                                                    <option value=".25">0.25</option>
                                                    <option value=".50">0.50</option>
                                                    <option value=".75">0.75</option>
                                                </select>  -->        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Price per piece:</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="inventPrice" name="inventPrice" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Reorder Level:</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" id="inventRL" name="inventRL" 
                                                required>
                                        </div>
                                    </div>                                   
                                    <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                                        <button type="submit" name="editsupply" class="btn btn-success" form="editsupplyform" value="Edit Supply" 
                                            id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span>Save</button> 
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

<!-- Import New Items -->
<div class="modal fade" id="importNewItems" tabindex="-1" role="dialog" 
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
                                action="includes/data-processors/importNewItems.php" 
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