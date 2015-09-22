<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>

<!-- JO Empty Form Modal -->
<div class="modal fade" id="fabModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Fabrication Order</h4>
            </div>
            <div class="fabEmpty modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/newfaborder.php" 
                                id="fabForm">
                                <h4 class="modal-title" id="emptyformlabel">Fabrication Form</h4>
                                <hr>
                               
                                <div class="control-group form-group">
                                    <div class="control-group form-group">
                                        <label class="control-label col-xs-3">Client:</label>
                                                <div class="controls col-xs-8">
                                                    <select class="form-control" id="client" name="client" required>
                                                        <option value="" disabled selected>Choose client:</option>
                                                        <?php
                                                            $sql = "SELECT * from client";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($resultRow = $result->fetch_assoc()){
                                                                    $option = '<option value="' . $resultRow['firstname'] . '">' . 
                                                                        $resultRow['firstname'] . " " . $resultRow['lastname'] . '</option>';
                                                                    echo ($option);
                                                                }
                                                            }
                                                        ?>

                                                    </select> 
                                                </div>
                                    </div>
                                    <label class="control-label col-xs-3">Order/s</label><br><br>
                                    <div class="multi-field-wrapper">
                                        <div class="multi-fields">
                                            <div class="multi-field">
                                                <label class="control-label col-xs-3">Item/s:</label>
                                                <div class="controls col-xs-8">
                                                    <select class="form-control" id="item" name="item[]" required>
                                                        <option value="" disabled selected>Select item:</option>
                                                        <?php
                                                            $sql = "SELECT * from inventory";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($resultRow = $result->fetch_assoc()){
                                                                    $option = '<option value="' . $resultRow['inventoryname'] . '">' . 
                                                                        $resultRow['inventoryname'] . " " . $resultRow['type'] . '</option>';
                                                                    echo ($option);
                                                                }
                                                            }
                                                        ?>

                                                    </select> 
                                                </div>

                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Price</label>
                                                    <div class="controls col-xs-5">
                                                        <input type="text" class="form-control" id="price" name="price[]" 
                                                                placeholder="Price" required>
                                                    </div>
                                                </div>

                                                <div class="control-group form-group">
                                                    <label class="control-label col-xs-3">Quantity</label>
                                                    <div class="controls col-xs-2">
                                                        <input type="text" class="form-control" id="qty" name="qty[]" 
                                                            placeholder="Qty" required>
                                                    </div>
                                                </div>
                                                
                                                <button type="button" class="add-field btn btn-default" 
                                                    id="addfield"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="remove-field btn btn-default" 
                                                    id="removefield"><i class="fa fa-minus"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-xs-3">Purchase Date:</label>
                                        <div class="col-xs-5">
                                            <input type="date" class="form-control" id="purchaseDate" 
                                                name="purchaseDate" required>
                                       </div>
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
                <button type="submit" name="submit" class="btn btn-primary" form="fabForm" value="submit">
                    <span class="glyphicon glyphicon-ok-sign"></span> SAVE</button>  
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>  
            </div>
        </div>
    </div>
</div> 
<!-- JO Empty Form Modal -->
<!-- Adding more items -->
<script>
    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', 
                $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });
</script>