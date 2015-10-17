<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- JO Empty Form Modal -->
<div class="modal fade" id="brkdownModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                   
                <h4 class="modal-title" id="myModalLabel">Services Breakdown</h4>
            </div>
            <div class="brkdown modal-body">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12 bs-example">
                            <form class="form-horizontal" method="post" action="includes/data-processors/______.php" 
                                id="joForm">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary pull-left" 
                    onclick="clearForm()">Clear All</button> -->


                <button type="submit" name="submit" class="btn btn-primary" form="joForm" value="submit">
                    <span class="glyphicon glyphicon-ok-sign"></span> Next</button>


                <!-- <button type="button" id="newjoborderbtn" class="btn btn-info" data-toggle="modal" 
                            href="#joModal"><i class="fa fa-plus fa-fw"></i> New Job Order </button> -->

                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="reload()">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Empty Form Modal -->


