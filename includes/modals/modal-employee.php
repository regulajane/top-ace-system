<!-- ADD Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Employee</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" 
                                action="includes/data-processors/addemployee.php" id="addemployeeform">
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="emplastname" name="emplastname" 
                                                required placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empfirstname" name="empfirstname" 
                                                required placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Middle Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empmiddlename" name="empmiddlename" 
                                                required placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <div class="radio">
                                                <label><input type="radio" name="empgender" value="Male" /> Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="empgender" value="Female" /> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Contact No.:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empcelno" name="empcelno" 
                                                required placeholder="Contact No.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="2" cols="100" class="form-control" id="empaddress" name="empaddress"
                                            maxlength="150" style="resize:none" placeholder="Address" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Email Address:</label>
                                        <div class="col-xs-7">
                                            <input type="email" class="form-control" id="empemailad" name="empemailad" 
                                                required placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Job Description:</label>
                                        <div class="col-xs-7">
                                            <select class="form-control" id="emptype" name="emptype">
                                                <option value="" disabled selected>Select Job Description</option>
                                                <option value="Machinist">Machinist</option>
                                                <option value="Front Desk Personnel">Front Desk Personnel</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove-sign"></span> Cancel </button>
                                        <button type="submit" name="addemp" class="btn btn-success" form="addemployeeform" value="addemployee">
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
</div> 
<!-- ADD Employee Modal -->


<!-- UPDATE Employee Modal -->
<div class="modal fade" id="updateEmployeeModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit/Update Employee</h4>
            </div>
            <div class="empUpdate modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post"
                                action="includes/data-processors/updateemployee.php" id="updateemployeeform" validate>
                                <div class="control-group col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Last Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="emplastname" name="emplastname" 
                                                required placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">First Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empfirstname" name="empfirstname" 
                                                required placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Middle Name:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empmiddlename" name="empmiddlename" 
                                                required placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Gender:</label>
                                        <div class="col-xs-4">
                                            <div class="radio">
                                                <label><input type="radio" name="empgender" value="Male" /> Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="empgender" value="Female" /> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Contact No.:</label>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" id="empcelno" name="empcelno" 
                                                required placeholder="Contact No.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Address:</label>
                                        <div class="col-xs-7">
                                            <textarea rows="2" cols="100" class="form-control" id="empaddress" name="empaddress"
                                            maxlength="150" style="resize:none" placeholder="Address" 
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Email Address:</label>
                                        <div class="col-xs-7">
                                            <input type="email" class="form-control" id="empemailad" name="empemailad" 
                                                required placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Job Description:</label>
                                        <div class="col-xs-7">
                                            <select class="form-control" id="emptype" name="emptype">
                                                <option value="" disabled selected>Select Job Description</option>
                                                <option value="Machinist">Machinist</option>
                                                <option value="Front Desk Personnel">Front Desk Personnel</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-4">Number of Jobs:</label>
                                        <div class="col-xs-4">
                                            <input type="number" class="form-control" id="noofjobs" name="noofjobs" 
                                                required placeholder="" readonly="">
                                        </div>
                                    </div>
                                    <div id="empstatusdiv" class="form-group">
                                        <label class="control-label col-xs-4">Status:</label>
                                        <div class="col-xs-4">
                                            <select class="form-control" id="empstatus" name="empstatus" required>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
                                            <button type="submit" name="updateemp" class="btn btn-success" form="updateemployeeform" value="updateemployee">
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
</div> 
<!-- UPDATE Employee Modal