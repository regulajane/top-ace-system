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
                                action="includes/data-processors/client.php" id="clientForm">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="clientln" name="clientln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">First Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="clientfn" name="clientfn" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Middle Initial:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" placeholder="Middle Initial"
                                                id="clientmi" name="clientmi"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Gender</label>
                                        <div class="col-md-4">
                                            <div class="radio">
                                                <label><input type="radio" name="clientgender" value="Male" /> Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="clientgender" value="Female" /> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Contact No.:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" placeholder="Contact No."
                                                id="clientcp" name="clientcp" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Address:</label>
                                        <div class="col-md-7">
                                            <textarea rows="3" cols="100" class="form-control" placeholder="Address"
                                                id="clientadd" name="clientadd"
                                                maxlength="999" style="resize:none" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Date:</label>
                                        <div class="col-md-7">
                                            <input type="date" class="form-control" placeholder="Date"
                                                id="clientsince" name="clientsince" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="savedata" class="btn btn-success" form="clientForm" value="Save">
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
                                        <label class="control-label col-md-4">Client ID:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Client ID"
                                                id="clientid" name="clientid" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="Last Name"
                                                id="clientln" name="clientln" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">First Name:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control"  placeholder="First Name"
                                                id="clientfn" name="clientfn" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Middle Initial:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" placeholder="Middle Initial"
                                                id="clientmi" name="clientmi"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Gender</label>
                                        <div class="col-md-4">
                                            <div class="radio">
                                                <label><input type="radio" name="clientgender" value="Male" /> Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="clientgender" value="Female" /> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Contact No.:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" placeholder="Contact No."
                                                id="clientcp" name="clientcp" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Address:</label>
                                        <div class="col-md-7">
                                            <textarea rows="3" cols="100" class="form-control" placeholder="Address"
                                                id="clientadd" name="clientadd"
                                                maxlength="999" style="resize:none" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Client Since:</label>
                                        <div class="col-md-7">
                                            <input type="date" class="form-control" placeholder="Date"
                                                id="clientsince" name="clientsince" required readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="updatedata" class="btn btn-success" form="updateclientForm" value="Update">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Save Changes</button> 
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
</div> <!-- /.updateclientmodal -->

<!-- Upload New Clients -->
<div class="modal fade" id="importNewClients" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Clients</h4>
            </div>
            <div class="fabImportNewClients modal-body">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/importNewClients.php" 
                                id="importNewClientsForm"
                                enctype="multipart/form-data">
                                <input required type="file" name="excelfileNewClients" 
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"/>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">  
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelbtn2">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                <button type="submit" name="upload" class="btn btn-success" form="importNewClientsForm" value="upload" 
                    ><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
            </div>
        </div>
    </div>
</div> 