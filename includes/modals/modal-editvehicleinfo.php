<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>

<?php
    $_SESSION["vehicle"] = $vn;
    $sql = "SELECT * FROM vehicle where vehicleNo = " .$vn;
    $rs = $conn->query($sql);
    $resultRow = $rs->fetch_assoc();
?>

<!-- EDIT Vehicle Information Modal -->
<div class="modal fade" id="editVehicleInfoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Vehicle Information</h4>
            </div>
            <div class="joEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/editvehicleinfo.php" 
                                id="editvehicleinfoform" novalidate>
                                <div class="control-group col-md-12">
                                    <h4 class="modal-title" id="emptyformlabel">
                                        <?php echo ($resultRow['brand'] . ' ' . $resultRow['name'])?></h4>
                                    <hr>
                                </div>
                                <div class="control-group col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Name:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="name" name="name" 
                                                required data-validation-required-message="" placeholder="Vehicle name" value="' . $resultRow['name'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Engine No.:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="engineNo" name="engineNo" 
                                                required data-validation-required-message="" placeholder="Engine no." value="' . $resultRow['engineNo'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Chassis No.:</label>
                                        <div class="col-xs-6">    
                                            <?php
                                                $t = '<input type="text" class="form-control" id="chassisNo" name="chassisNo" 
                                                required data-validation-required-message="" placeholder="Chassis no." value="' . $resultRow['chassisNo'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Status:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<select class="form-control" id="status" name="status">
                                                <option value="" selected disabled>' . $resultRow['status'] . '</option>
                                                <option value="Operational">Operational</option>
                                                <option value="Non-operational">Non-operational</option>
                                                </select>';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Driver:</label>
                                        <div class="col-xs-6">    
                                            <?php
                                                $t = '<input type="text" class="form-control" id="driver" name="driver" 
                                                required data-validation-required-message="" placeholder="Name of designated driver" value="' . $resultRow['driver'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Acquisition Date:</label>
                                        <div class="col-xs-4">
                                            <?php
                                                $t = '<input type="date" class="form-control" id="acquisitionDate" name="acquisitionDate" 
                                                required data-validation-required-message="" value="' . $resultRow['acquisitionDate'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Brand:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="brand" name="brand" 
                                                required data-validation-required-message="" placeholder="Brand" value="' . $resultRow['brand'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Model:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="model" name="model" 
                                                required data-validation-required-message="" placeholder="Model" value="' . $resultRow['model'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Mtd. Body:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="mtdbody" name="mtdbody" 
                                                required data-validation-required-message="" placeholder="Mtd. body" value="' . $resultRow['mtdbody'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Description:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="description" name="description" 
                                                required data-validation-required-message="" placeholder="Description" value="' . $resultRow['description'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Plate No.:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="plateNo" name="plateNo" 
                                                required data-validation-required-message="" placeholder="Plate no." value="' . $resultRow['plateNo'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Article Nomenclature:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="articleNomenclature" name="articleNomenclature" 
                                                required data-validation-required-message="" placeholder="Article nomenclature" value="' . $resultRow['articleNomenclature'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">End Item:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="endItem" name="endItem" 
                                                required data-validation-required-message="" placeholder="End item" value="' . $resultRow['endItem'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Acquisition Cost:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="acquisitionCost" name="acquisitionCost" 
                                                required data-validation-required-message="" placeholder="Acquisition cost" value="' . $resultRow['acquisitionCost'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Location:</label>
                                        <div class="col-xs-6">
                                            <?php
                                                $t = '<input type="text" class="form-control" id="location" name="location" 
                                                required data-validation-required-message="" placeholder="Location" value="' . $resultRow['location'] . '">';
                                                echo ($t);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary" form="editvehicleinfoform" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- EDIT Vehicle Information Modal -->