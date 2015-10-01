<!-- AccessValidation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>

<!-- NewClientModal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 650px; margin-top: 50px;">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <i class="fa fa-user fa-5x"></i>
                <h4 class="modal-title" id="myModalLabel">New Client</h4>
            </div>
            <div class="client modal-body">
                <div class="well">
                    <form class="form-horizontal" method="post" 
                        action="includes/data-processors/client.php" id="clientForm" novalidate>
                        <div class="control-group form-group">
                            <div class="controls col-md-5">
                                <label>Lastname:</label>
                                <input type="text" class="form-control"  placeholder="Lastname"
                                    id="clientln" name="clientln" required/>
                            </div>
                            <div class="controls col-md-5">
                                <label>Firstname:</label>
                                <input type="text" class="form-control"  placeholder="Firstname"
                                    id="clientfn" name="clientfn" required/>
                            </div>
                            <div class="controls col-md-2">
                                <label>M.I.:</label>
                                <input type="text" class="form-control" placeholder="M.I."
                                    id="clientmi" name="clientmi" required/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls col-md-6">
                                <label>Gender:</label>
                                <select class="form-control" placeholder="Address..."
                                    id="clientgender" name="clientgender" required>
                                    <option value="Gender"  selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="controls col-md-6">
                                <label>Cellphone No.:</label>
                                <input type="number" class="form-control" placeholder=""
                                    id="clientcp" name="clientcp" required/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls col-md-12">
                                <label>Address:</label>
                                <textarea rows="3" cols="100" class="form-control" placeholder="Address..."
                                    id="clientadd" name="clientadd"
                                    maxlength="999" style="resize:none" 
                                    required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="savedata" class="btn btn-primary" form="clientForm" value="Save">
                    <span class="glyphicon glyphicon-ok-sign"></span> Save </button>  
            </div>
        </div>
    </div>
</div> <!-- /.newclientmodal -->

<!-- UpdateClientModal -->
<div class="modal fade" id="updateClientModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 650px; margin-top: 50px;">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <i class="fa fa-user fa-5x"></i>
                <h4 class="modal-title" id="myModalLabel">Edit/Update Client</h4>
            </div>
            <div class="client modal-body">
                <div class="well">
                    <form class="form-horizontal" method="post" 
                        action="includes/data-processors/updateclient.php" id="updateclientForm" novalidate>
                        <div class="control-group form-group">
                            <div class="controls" style="display: none;">
                                <label>Client ID:</label>
                                <input type="text" class="form-control"  placeholder="Client ID"
                                    id="clientid" name="clientid" required/>
                            </div>
                            <div class="controls col-md-5">
                                <label>Lastname:</label>
                                <input type="text" class="form-control"  placeholder="Lastname"
                                    id="clientln" name="clientln" required/>
                            </div>
                            <div class="controls col-md-5">
                                <label>Firstname:</label>
                                <input type="text" class="form-control"  placeholder="Firstname"
                                    id="clientfn" name="clientfn" required/>
                            </div>
                            <div class="controls col-md-2">
                                <label>M.I.:</label>
                                <input type="text" class="form-control" placeholder="M.I."
                                    id="clientmi" name="clientmi" required/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls col-md-6">
                                <label>Gender:</label>
                                <select class="form-control" placeholder="Address..."
                                    id="clientgender" name="clientgender" required>
                                    <option value="Gender"  selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="controls col-md-6">
                                <label>Cellphone No.:</label>
                                <input type="number" class="form-control" placeholder="09123456789"
                                    id="clientcp" name="clientcp" required/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls col-md-12">
                                <label>Address:</label>
                                <textarea rows="3" cols="100" class="form-control" placeholder="Address..."
                                    id="clientadd" name="clientadd"
                                    maxlength="999" style="resize:none" 
                                    required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                <button type="submit" name="updatedata" class="btn btn-primary" form="updateclientForm" value="Update">
                    <span class="glyphicon glyphicon-ok-sign"></span> Save </button>  
            </div>
        </div>
    </div>
</div> <!-- /.updateclientmodal -->