<script>
// --------------------------------services-----------------------------------------------------------
$(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joEditForm')
                                                // Add button click handler
                                                .on('click', '.addButton', function() {
                                                    var $template = $('#eoptionTemplate'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="eserviceid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButton', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="eserviceid[]"]');

                                                    // Remove element containing the option
                                                    $row.remove();

                                                    // Remove field
                                                    // $('#joForm').formValidation('removeField', $option);
                                                })
                                                // Called after adding new field
                                                .on('added.field.fv', function(e, data) {
                                                    // data.field   --> The field name
                                                    // data.element --> The new field element
                                                    // data.options --> The new field options

                                                    if (data.field === 'eserviceid[]') {
                                                        if ($('#joEditForm').find(':visible[name="eserviceid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButton').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'eserviceid[]') {
                                                        if ($('#joEditForm').find(':visible[name="eserviceid[]"]').length < MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButton').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });
// --------------------------------additional items-----------------------------------------------------------
                                                $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;


                                                $('#joEditForm')
                                                // Add button click handler
                                                .on('click', '.addButtonAI', function() {




                                                    var $template = $('#eoptionTemplateAdditionalItems'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="eadditionalitems[]"]');

                                                    $('.joEdit #eadditionalitems').typeahead({
                                                        name: 'eadditionalitems',
                                                        remote:'includes/data-processors/searchjo.php?key=%QUERY',
                                                        limit : 10
                                                        
                                                    });

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonAI', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="eadditionalitems[]"]');

                                                    // Remove element containing the option
                                                    $row.remove();

                                                    // Remove field
                                                    // $('#joForm').formValidation('removeField', $option);
                                                })
                                                // Called after adding new field
                                                .on('added.field.fv', function(e, data) {
                                                    // data.field   --> The field name
                                                    // data.element --> The new field element
                                                    // data.options --> The new field options

                                                    if (data.field === 'eadditionalitems[]') {
                                                        if ($('#joEditForm').find(':visible[name="eadditionalitems[]"]').length >= MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButtonAI').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'eadditionalitems[]') {
                                                        if ($('#joEditForm').find(':visible[name="eadditionalitems[]"]').length < MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButtonAI').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });


//--------------------------------------item list------------------------------------------------------------------------------------
                                                $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joEditForm')
                                                // Add button click handler
                                                .on('click', '.addButtonItem', function() {
                                                    var $template = $('#eoptionTemplateItem'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="eitemid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonItem', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="eitemid[]"]');

                                                    // Remove element containing the option
                                                    $row.remove();

                                                    // Remove field
                                                    // $('#joForm').formValidation('removeField', $option);
                                                })
                                                // Called after adding new field
                                                .on('added.field.fv', function(e, data) {
                                                    // data.field   --> The field name
                                                    // data.element --> The new field element
                                                    // data.options --> The new field options

                                                    if (data.field === 'eitemid[]') {
                                                        if ($('#joEditForm').find(':visible[name="eitemid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButtonItem').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'eitemid[]') {
                                                        if ($('#joEditForm').find(':visible[name="eitemid[]"]').length < MAX_OPTIONS) {
                                                            $('#joEditForm').find('.addButtonItem').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });


</script>

<!-- EDIT JO Form Modal -->
<div class="modal fade" id="editJoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true" onload="showServiceBreakdown()" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn" onclick="reload()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Job Order</h4>
            </div>
            <div class="joEdit modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" 
                                id="joEditForm" action="includes/data-processors/editjoborder.php">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Receipt number:</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="receiptNo" 
                                            name="receiptNo" readonly>
                                    </div>
                                </div>

                                <!-- Client name -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Client name:</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="client" 
                                            name="client" readonly>
                                    </div>
                                </div>

                                <!-- Engine number -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Engine number:</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="engineno" 
                                            name="engineno" readonly>
                                    </div>
                                </div>

                                <!-- Date brought -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Received:</label>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" id="dateBrought" 
                                            name="dateBrought" readonly>
                                    </div>
                                </div>

                                <!-- Problem -->
                                <div class="form-group">
                                    <label class="control-label col-md-4">Problems:</label>
                                    <div class="col-md-7">
                                        <!-- <input type="text" class="form-control" id="problem" 
                                            name="problem" readonly> -->
                                        <textarea rows="5" cols="100" class="form-control" id="problem" name="problem"
                                            maxlength="999" style="resize:none">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Services Availed:</label>
                                    <div class="col-md-6" id="servicesavailed">
                                        <!-- <input type="text" class="form-control" id="servicesavailed" 
                                            name="servicesavailed" readonly> -->
                                        <!-- <textarea rows="3" cols="100" class="form-control" id="servicesavailed" name="servicesavailed"
                                            maxlength="999" style="resize:none" readonly>
                                        </textarea> -->
                                        




                                    </div>
                                </div>
                                <hr>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Additional Service:</label>
                                    <div class="controls col-md-6">
                                        <select class="form-control" id="eserviceid" name="eserviceid[]" >
                                            <option value="" disabled selected>Select service</option>
                                                <?php
                                                    $sql = "SELECT * from services where servicestatus = 'Offered'"; 
                                                    $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while($resultRow = $result->fetch_assoc()){
                                                                    $t = '<option value="' . 
                                                                    $resultRow['serviceid'] . '">' . 
                                                                    $resultRow['servicename'] . '</option>';
                                                                echo ($t);
                                                            }
                                                        }
                                                ?>
                                        </select>                 
                                    </div>
                                        <button type="button" class="pull-left add-field btn btn-default addButton" >
                                                <i class="fa fa-plus"></i>
                                        </button> 
                                </div>
                                   

                                   
                                <div class="control-group form-group hide" id="eoptionTemplate">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-6">
                                        <select class="form-control" id="eserviceid" name="eserviceid[]" >
                                            <option value="" disabled selected>Select service</option>
                                                <?php
                                                                        $sql = "SELECT * from services where servicestatus = 'Offered' "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $t = '<option value="' . 
                                                                                        $resultRow['serviceid'] . '">' . 
                                                                                        $resultRow['servicename'] .
                                                                                        
                                                                                    '</option>';

                                                                                echo ($t);
                                                                            }
                                                                        }
                                                                    ?>
                                        </select>                 
                                    </div>
                                        <button type="button" class="pull-left remove-field btn btn-default removeButton">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                </div>
                                <hr>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4">Item List:</label>
                                    <div class="col-md-6" id="itemlist">
                                        
                                        




                                    </div>
                                </div>

                                <hr>
                                 <div class="text-center" style="color:red">Note: Piston Ring, Main Bearing and Connecting Rod Bearing are the only items with sizes.</div>
                                 <hr>
                                 <div class="control-group form-group">
                                    <label class="control-label col-md-3">Item List:</label>

                                    <div class="controls col-md-4">

                                        <select class="form-control" id="eitemid" name="eitemid[]" >
                                            <option value="" disabled selected>Select Item</option>
                                                                    <?php
                                                                        $sql = "SELECT distinct(inventoryname) from inventory join models using (modelid) where modelid = 1 "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $optioninvty = '<option value="' . 
                                                                                        $resultRow['inventoryname'] . '">' . 
                                                                                        $resultRow['inventoryname'] .
                                                                                        
                                                                                    '</option>';

                                                                                echo ($optioninvty);
                                                                            }
                                                                        }
                                                                    ?>
                                        </select> 

                                    </div>
                                    <div class="controls col-md-2">
                                        <input type="number" min="0" name="eqty[]" id="eqty" class="form-control" placeholder="Quantity" >
                                    </div>
                                    <div class="controls col-md-2">
                                        <select class="form-control" id="eitemsize" name="eitemsize[]">
                                            <option value="" selected>Size</option>
                                            <option value="STD">STD</option>
                                            <option value="0.25">0.25</option>
                                            <option value="0.50">0.50</option>
                                            <option value="0.75">0.75</option>
                                        </select>
                                    </div>
                                        <button type="button" class="pull-left add-field btn btn-default addButtonItem" >
                                            <i class="fa fa-plus"></i>
                                        </button> 

                                </div>

                               
                                <div class="control-group form-group hide" id="eoptionTemplateItem">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-4">        
                                        <select class="form-control" id="eitemid" name="eitemid[]" >
                                            <option value="" disabled selected>Select Item</option>
                                                                    <?php
                                                                        $sql = "SELECT distinct(inventoryname) from inventory join models using (modelid) where modelid = 1 "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $optioninvty = '<option value="' . 
                                                                                        $resultRow['inventoryname'] . '">' . 
                                                                                        $resultRow['inventoryname'] .
                                                                                        
                                                                                    '</option>';

                                                                                echo ($optioninvty);
                                                                            }
                                                                        }
                                                                    ?>
                                        </select>                 
                                    </div>
                                    <div class="controls col-md-2">
                                        <input type="number" min="0" name="eqty[]" id="eqty" class="form-control" placeholder="Quantity" >
                                    </div>
                                    <div class="controls col-md-2">
                                        <select class="form-control" id="eitemsize" name="eitemsize[]">
                                            <option value="" selected>Size</option>
                                            <option value="STD">STD</option>
                                            <option value="0.25">0.25</option>
                                            <option value="0.50">0.50</option>
                                            <option value="0.75">0.75</option>
                                        </select>
                                    </div>
                                        <button type="button" class="pull-left remove-field btn btn-default removeButtonItem">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                </div>
                                <hr>
                                <div class="text-center" style="color:red">Note: For Bearing, Oil Filter and Fuel Filter only.</div>
                                <hr>
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Additional Items</label>

                                    <div class="controls col-md-6">
                                        <input type="text" class="form-control" id="eadditionalitems" name="eadditionalitems[]">                   
                                    </div>
                                    <div class="controls col-md-2">
                                        <input type="number" min="0" name="eqtyAI[]" id="eqtyAI" class="form-control" placeholder="Quantity" >
                                    </div>
                                        <button type="button" class="pull-left add-field btn btn-default addButtonAI" >
                                            <i class="fa fa-plus"></i>
                                        </button> 
                                </div>
                               
                                <div class="control-group form-group hide" id="eoptionTemplateAdditionalItems">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-6">        
                                        <input type="text" class="form-control" id="eadditionalitems" name="eadditionalitems[]">                
                                    </div>
                                    <div class="controls col-md-2">
                                        <input type="number" min="0" name="eqtyAI[]" id="eqtyAI" class="form-control" placeholder="Quantity" >
                                    </div>
                                        <button type="button" class="pull-left remove-field btn btn-default removeButtonAI">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                </div>

                                <hr>


                               


                            </form>
                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="submit" class="btn btn-success" form="joEditForm" 
                    value="submit" id="savebtn"><span class="glyphicon glyphicon-ok-sign"></span> Save Changes</button>
            </div>
        </div>
    </div>
</div> 
<!-- EDIT JO Form Modal