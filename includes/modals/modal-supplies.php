<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- Modal New Supply -->
<div class="modal fade" id="newSuppliesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Supply</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/newsupply.php" id="supplyForm" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Item Name:</label>
                                        <input type="text" class="form-control" id="newSupplyName" name="newSupplyName"
                                            required data-validation-required-message="Please enter item name."/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Description:</label>
                                        <textarea rows="3" cols="100" class="form-control" name="supdescription" 
                                            id="supdescription" 
                                            required data-validation-required-message="Please enter item description." 
                                            maxlength="300" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-4">
                                        <label>Quantity:</label>
                                        <input type="number" class="form-control" name="supquantity" id="supquantity"
                                            required required data-validation-required-message="Please enter quantity."/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="newsupply" class="btn btn-primary" form="supplyForm" value="New Supply">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE </button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal -->
<!-- Modal Add Supply -->
<div class="modal fade" id="addSuppliesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add</h4>
            </div>
            <div class="addProcSup modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/addSupply.php" id="supplyForm2" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12" style="display: none">
                                        <label>Supply ID:</label>
                                        <input readonly type="text" class="form-control" id="supID" name="supID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Item Name:</label>
                                        <input readonly type="text" class="form-control" id="supplyName" name="supplyName"
                                            required data-validation-required-message="Please enter item name."/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Description:</label>
                                        <textarea readonly rows="2" cols="100" class="form-control" name="supdescription" 
                                            id="supdescription" 
                                            required data-validation-required-message="Please enter item description." 
                                            maxlength="300" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-4">
                                        <label>Quantity:</label>
                                        <input type="number" class="form-control" name="supquantity" id="supquantity"
                                            required data-validation-required-message="Please enter quantity."/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="inoutsupply" class="btn btn-primary" form="supplyForm2" value="Add Supply">
                    <span class="glyphicon glyphicon-ok-sign"></span> Add </button> 
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal
<!-- Modal Procure Supply -->
<div class="modal fade" id="procSuppliesModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Procure</h4>
            </div>
            <div class="addProcSup modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/procureSupply.php" id="supplyForm3" novalidate>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12" style="display: none">
                                        <label>Supply ID:</label>
                                        <input readonly type="text" class="form-control" id="supID" name="supID"/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Item Name:</label>
                                        <input readonly type="text" class="form-control" id="supplyName" name="supplyName"
                                            required data-validation-required-message="Please enter item name."/>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-12">
                                        <label>Description:</label>
                                        <textarea readonly rows="2" cols="100" class="form-control" name="supdescription" 
                                            id="supdescription" 
                                            required data-validation-required-message="Please enter item description." 
                                            maxlength="300" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <div class="controls col-md-4">
                                        <label>Quantity:</label>
                                        <input type="number" class="form-control" name="supquantity" id="supquantity"
                                            required data-validation-required-message="Please enter quantity."/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <button type="submit" name="outsupply" class="btn btn-primary" form="supplyForm3" value="Procure Supply">
                    <span class="glyphicon glyphicon-ok-sign"></span> Procure </button> 
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
            </div>
        </div>
    </div>
</div> <!-- /.modal