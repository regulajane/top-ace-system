<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<script>
                                            $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')
                                                // Add button click handler
                                                .on('click', '.addButton', function() {
                                                    var $template = $('#optionTemplate'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="serviceid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButton', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="serviceid[]"]');

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

                                                    if (data.field === 'serviceid[]') {
                                                        if ($('#joForm').find(':visible[name="serviceid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButton').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'serviceid[]') {
                                                        if ($('#joForm').find(':visible[name="serviceid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButton').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });

                                                // ---------------------------------------------------------------------------------------
                                            $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')

                                                .on('click', '.addButtonMach', function() {
                                                    var $template = $('#optionTemplateMachinist'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="employeeid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonMach', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="employeeid[]"]');

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

                                                    if (data.field === 'employeeid[]') {
                                                        if ($('#joForm').find(':visible[name="employeeid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonMach').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'employeeid[]') {
                                                        if ($('#joForm').find(':visible[name="employeeid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonMach').removeAttr('disabled');
                                                        }
                                                    }
                                                });
                                        // ------------------------------------------------------------------------------------------------------

                                        $(document).ready(function() {
                                                // The maximum number of options
                                                var MAX_OPTIONS = 5;

                                                $('#joForm')
                                                // Add button click handler
                                                .on('click', '.addButtonItem', function() {
                                                    var $template = $('#optionTemplateItem'),
                                                        $clone    = $template
                                                                        .clone()
                                                                        .removeClass('hide')
                                                                        .removeAttr('id')
                                                                        .insertBefore($template),
                                                        $option   = $clone.find('[name="itemid[]"]');

                                                    // Add new field
                                                    // $('#joForm').formValidation('addField', $option);
                                                })
                                                // Remove button click handler
                                                .on('click', '.removeButtonItem', function() {
                                                    var $row    = $(this).parents('.form-group'),
                                                        $option = $row.find('[name="itemid[]"]');

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

                                                    if (data.field === 'itemid[]') {
                                                        if ($('#joForm').find(':visible[name="itemid[]"]').length >= MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonItem').attr('disabled', 'disabled');
                                                        }
                                                    }
                                                })

                                                // Called after removing the field
                                                .on('removed.field.fv', function(e, data) {
                                                   if (data.field === 'itemid[]') {
                                                        if ($('#joForm').find(':visible[name="itemid[]"]').length < MAX_OPTIONS) {
                                                            $('#joForm').find('.addButtonItem').removeAttr('disabled');
                                                        }
                                                    }
                                                });

                                            });

                                            });
                                        function myFunction(){
                                            document.getElementById("hidebtn").click();
                                        }
                                        </script>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="clientjoModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel">New Job Order</h4>
            </div>
            <div class="joEmpty modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/newjoborder.php" id="joForm" novalidate>
                                <h4 class="modal-title" id="emptyformlabel" style="text-align:center">Pre-Inspection</h4>
                                <hr>



                               

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Client Name:</label>
                                    <div class="controls col-md-4">
                                        <select style= "Display: none;" class="form-control" id="clientid" name="clientid" required>
                                                <?php
                                                    $sql = "SELECT * from clients where clientid = (SELECT MAX(clientid) as latest from clients)"; 
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($resultRow = $result->fetch_assoc()){
                                                            $option = '<option value="' . $resultRow['clientid'] . '">' . 
                                                                $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '</option>';
                                                            echo ($option);
                                                             $option = '<input type="text" class="form-control" id="dateBrought" 
                                                                name="dateBrought" readonly value="' . $resultRow['cllastname'] . ", " . $resultRow['clfirstname'] . " " .  $resultRow['clmidinitial'] . '">' 
                                                            . '</input>';
                                                        echo ($option);
                                                        }
                                                    }
                                                ?>
                                      
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Date Received:</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" id="dateBrought" 
                                            name="dateBrought" required>
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Engine Model:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="modelid" name="modelid">
                                            <option value="" disabled selected>Select model</option>
                                            <?php
                                                $sql = "SELECT * FROM inventory join models using (modelid) where inventoryname = 'Engine Valve';"; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['modelno'] . '">' . 
                                                            $resultRow['modelno'] . " " . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Engine number:</label>
                                    <div class="controls col-md-4">
                                        <input type="text" class="form-control" id="engnumber" name="engnumber" 
                                            placeholder="" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Problems:</label>
                                    <div class="controls col-md-8">
                                        <textarea rows="5" cols="100" class="form-control" id="problem" name="problem"
                                            maxlength="999" style="resize:none" placeholder="" 
                                                required></textarea>
                                    </div>
                                </div>

                                <hr>
                                
 
                                
                                
                                  
                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Services:</label>
                                    <div class="controls col-md-6">
                                        <select class="form-control" id="serviceid" name="serviceid[]" required>
                                            <option value="" disabled selected>Select service</option>
                                                <?php
                                                    $sql = "SELECT * from services"; 
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
                                   

                                   
                                <div class="control-group form-group hide" id="optionTemplate">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-6">
                                        <select class="form-control" id="serviceid" name="serviceid[]" required>
                                            <option value="" disabled selected>Select service</option>
                                                <?php
                                                                        $sql = "SELECT * from services"; 
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

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Machinist/s:</label>
                                    <div class="controls col-md-6">
                                        <select class="form-control" id="employeeid" name="employeeid[]" required>
                                            <option value="" disabled selected>Select Machinist</option>
                                                                    <?php
                                                                        $sql = "SELECT * from employees where emptype = 'Machinist' "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                                    $resultRow['emplastname'] . ", " . $resultRow['empfirstname'] .  " " . $resultRow['empmiddlename'] . '</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>
                                        </select>                 
                                    </div>
                                        <button type="button" class="pull-left add-field btn btn-default addButtonMach" >
                                            <i class="fa fa-plus"></i>
                                        </button> 
                                </div>
                               
                                <div class="control-group form-group hide" id="optionTemplateMachinist">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-6">        
                                        <select class="form-control" id="employeeid" name="employeeid[]" required>
                                            <option value="" disabled selected>Select Machinist</option>
                                                                    <?php
                                                                        $sql = "SELECT * from employees where emptype = 'Machinist' "; 
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            // output data of each row
                                                                            while($resultRow = $result->fetch_assoc()){
                                                                                $option = '<option value="' . $resultRow['employeeid'] . '">' . 
                                                                                    $resultRow['emplastname'] . ", " . $resultRow['empfirstname'] .  " " . $resultRow['empmiddlename'] . '</option>';
                                                                                echo ($option);
                                                                            }
                                                                        }
                                                                    ?>
                                        </select>                 
                                    </div>
                                        <button type="button" class="pull-left remove-field btn btn-default removeButtonMach">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                </div>
                                
                                 <hr>
                                 <div class="text-center" style="color:red">Note: Piston Ring, Main Bearing and Connecting Rod Bearing are the only items with sizes.</div>
                                 <hr>
                                 <div class="control-group form-group">
                                    <label class="control-label col-md-3">Item List:</label>

                                    <div class="controls col-md-4">

                                        <select class="form-control" id="itemid" name="itemid[]" required>
                                            <option value="" disabled selected>Select Item</option>
                                                                    <?php
                                                                        $sql = "SELECT distinct(inventoryname) from inventory"; 
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
                                        <input type="number" min="0" name="qty[]" id="qty" class="form-control" placeholder="Quantity" required>
                                    </div>
                                    <div class="controls col-md-2">
                                        <select class="form-control" id="itemsize" name="itemsize[]">
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

                               
                                <div class="control-group form-group hide" id="optionTemplateItem">
                                    <label class="control-label col-md-3"></label>
                                    <div class="controls col-md-4">        
                                        <select class="form-control" id="itemid" name="itemid[]" required>
                                            <option value="" disabled selected>Select Item</option>
                                                                    <?php
                                                                        $sql = "SELECT distinct(inventoryname) from inventory"; 
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
                                        <input type="number" min="0" name="qty[]" id="qty" class="form-control" placeholder="Quantity" required>
                                    </div>
                                    <div class="controls col-md-2">
                                        <select class="form-control" id="itemsize" name="itemsize[]">
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
                               

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Received by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="salesperson" 
                                            name="salesperson" required>
                                            <option value="" disabled selected>Select personnel</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS frontdesk from employees where emptype = 'Front Desk Personnel' "; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['frontdesk'] . '">' . 
                                                            $resultRow['frontdesk'] . '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group form-group">
                                    <label class="control-label col-md-3">Confirmed by:</label>
                                    <div class="controls col-md-4">
                                        <select class="form-control" id="supervisor" 
                                            name="supervisor" required>
                                            <option value="" disabled selected>Select supervisor</option>
                                            <?php
                                                $sql = "SELECT employeeid,concat(emplastname,', ',empfirstname) AS manager from employees where emptype = 'Manager' "; 
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($resultRow = $result->fetch_assoc()){
                                                        $option = '<option value="' . $resultRow['manager'] . '">' . 
                                                            $resultRow['manager']. '</option>';
                                                        echo ($option);
                                                    }
                                                }
                                            ?>
                                        </select>  
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" 
                    onclick="clearForm()">Clear All</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="submit" class="btn btn-success" form="joForm" value="submit" >
                    <span class="glyphicon glyphicon-ok-sign"></span> Next</button>
            </div>
        </div>
    </div>
</div> <!-- JO Empty Form Modal -->
