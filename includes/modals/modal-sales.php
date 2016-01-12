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
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"  placeholder="Cash Invoice No."
                                                id="saleci" name="saleci" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="control-label col-md-4" >Item: </label>
                                        <div class="col-md-8">
                                            <input type="text" class="typeahead form-control"  placeholder="Model No. - Name - Size"
                                                id="saleitem" name="saleitem" autocomplete="off" size="50" required>
                                            <input id="totalNoOfItems" name="totalNoOfItems" hidden>    
                                        </div>
                                        

                                            <script type="text/javascript">
                                            var counter = 0;
                                                function addItem(){
                                                    counter++;
                                                    var hr = document.createElement("hr");
                                                    var div = document.createElement("div");
                                                        div.setAttribute('class',"col-md-8");

                                                    //var br = document.createElement("br");
                                                    var x = document.getElementById("itemDiv");
                                                        

                                                    var label = document.createElement("label");
                                                        label.innerHTML = "Item:";
                                                        label.setAttribute('class',"control-label col-md-4");

                                                    var  input = document.createElement("input");
                                                            input.setAttribute('type',"text");
                                                            input.id = "saleitem"+counter;
                                                            input.name = "saleitem"+counter;
                                                            input.setAttribute('class',"typeahead form-control");
                                                            input.setAttribute('size',"50");
                                                            input.setAttribute('placeholder',"Model No. - Name - Size");

                                                    var label1 = document.createElement("label");
                                                        label1.innerHTML = "Quantity:";
                                                        label1.setAttribute('class',"control-label col-md-4");

                                                    var  input1 = document.createElement("input");
                                                            input1.setAttribute('type',"number");
                                                            input1.id = "saleqty"+counter;
                                                            input1.name = "saleqty"+counter;
                                                            input1.setAttribute('class',"form-control");
                                                            input1.setAttribute('min',"1");
                                                            input1.setAttribute('placeholder',"Quantity");

                                                    var  chidden = document.getElementById("totalNoOfItems");
                                                    //alert(chidden);
                                                    /*if(chidden = ''){
                                                        //alert(chidden);
                                                        var  chidden = document.createElement("input");
                                                             chidden.id = "totalNoOfItems";
                                                             chidden.name = "totalNoOfItems";
                                                             div.appendChild(chidden);  
                                                             chidden.value = counter; 
                                                    }else{*/
                                                        chidden.value = counter;
                                                    //}
                                                    //x.appendChild(br);

                                                    div.appendChild(label);
                                                    div.appendChild(input);
                                                    div.appendChild(label1);
                                                    div.appendChild(input1);
                                                    //div.appendChild(chidden);
                                                    
                                                    

                                                    var w = document.createElement("button");
                                                            w.setAttribute('class',"pull-right btn btn-default removeButton");
                                                            w.innerHTML = "<i class='fa fa-minus'></i>";
                                                            w.onclick =  function removeItem(){
                                                                                    w.parentNode.innerHTML = "";
                                                                                    }       
                                                    div.appendChild(w);
                                                    div.appendChild(hr);
                                                    x.appendChild(div);

                                                    $('.sales #saleitem'+counter).typeahead({
                                                        name: 'saleitem',
                                                        remote:'includes/data-processors/searchitemsale.php?key=%QUERY',
                                                        limit : 8
                                                    });

                                                    //validate();
                                                }

                                               /* function validate(){
                                                    $('#salesForm').bootstrapValidator({
                                                        feedbackIcons: {
                                                            message: 'This value is not valid',
                                                            valid: 'glyphicon glyphicon-ok',
                                                            invalid: 'glyphicon glyphicon-remove',
                                                            validating: 'glyphicon glyphicon-refresh'
                                                        },
                                                        fields: {
                                                            asaleitem: {
                                                                validators: {
                                                                    notEmpty: {
                                                                        message: 'Item is required'
                                                                    }
                                                                }
                                                            },
                                                            asaleqty: {
                                                                validators: {
                                                                    notEmpty: {
                                                                        message: 'Quantity is required'
                                                                    },
                                                                    regexp: {
                                                                        regexp: /^[0-9, .]+$/,
                                                                        message: 'Please enter a valid price.'
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                }*/


                                                


                                            </script>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Quantity:</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control" placeholder="Quantity"
                                                id="saleqty" name="saleqty" min = "1"/>
                                        </div>
                                        <button style="display: inline" type="button" class="pull-right add-field btn btn-default addButton" onclick="addItem()">
                                                     <i class="fa fa-plus"></i> Add Item
                                            </button>
                                    </div>

                                    <div class="form-group"  id = "itemDiv">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Date:</label>
                                        <div class="col-md-5">
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


