<!-- NewClientModal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Client</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/client.php" id="clientForm" validate>
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="clientln" name="clientln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="clientfn" name="clientfn" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Middle Initial:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" placeholder="Middle Initial"
                                                id="clientmi" name="clientmi" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" placeholder="Gender"
                                                id="clientgender" name="clientgender" required>
                                                <option value="Gender"  selected disabled>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Contact No.:</label>
                                        <div class="col-xs-7">
                                            <input type="number" class="form-control" placeholder="Contact No."
                                                id="clientcp" name="clientcp" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="3" cols="100" class="form-control" placeholder="Address"
                                                id="clientadd" name="clientadd"
                                                maxlength="999" style="resize:none" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Date:</label>
                                        <div class="col-xs-7">
                                            <input type="date" class="form-control" placeholder="Date"
                                                id="clientsince" name="clientsince" required/>
                                        </div>
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
                <button type="submit" name="savedata" class="btn btn-success" form="clientForm" value="Save">
                    <span class="glyphicon glyphicon-ok-sign"></span> Save </button>  
            </div>
        </div>
    </div>
</div> <!-- /.newclientmodal -->

<!-- UpdateClientModal -->
<div class="modal fade" id="updateClientModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit/Update Client</h4>
            </div>
            <div class="clienteditupdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/updateclient.php" id="updateclientForm" validate>
                                <div class="control-group col-md-12">
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control"  placeholder="Client ID"
                                                id="clientid" name="clientid" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="clientln" name="clientln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="clientfn" name="clientfn" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Middle Initial:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" placeholder="Middle Initial"
                                                id="clientmi" name="clientmi" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" placeholder="Gender"
                                                id="clientgender" name="clientgender" required>
                                                <option value="Gender"  selected disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Contact No.:</label>
                                        <div class="col-xs-7">
                                            <input type="number" class="form-control" placeholder="Contact No."
                                                id="clientcp" name="clientcp" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="3" cols="100" class="form-control" placeholder="Address"
                                                id="clientadd" name="clientadd"
                                                maxlength="999" style="resize:none" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Client Since:</label>
                                        <div class="col-xs-7">
                                            <input type="date" class="form-control" placeholder="Date"
                                                id="clientsince" name="clientsince" required readonly/>
                                        </div>
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
                <button type="submit" name="updatedata" class="btn btn-success" form="updateclientForm" value="Update">
                    <span class="glyphicon glyphicon-ok-sign"></span> Save Changes</button>  
            </div>
        </div>
    </div>
</div> <!-- /.updateclientmodal -->