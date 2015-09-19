<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- JO Pre Form Modal --> 
<div class="modal fade" id="joPreFormModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pre-Repair Inspection Form</h4>
            </div>
            <div class="joPreForm modal-body" id="joPreFormPrint">
                <div class="col-md-12">
                    <p>Form Nr 2</p>
                </div>
                <div class="row"  id="a">
                    <div class="col-md-12">
                        <div class="row text-center">
                            <p>REQUEST FOR PRE-REPAIR INSPECTION</p>
                        </div>
                        <form method="post" action="includes/newjoborder.php" id="preForm">
                            <div class="row text-center">
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Section A: Request for Pre-Repair</td>
                                    <td id="dateOfPrerepairRequestForm" name="dateOfPrerepairRequestForm">
                                            Date:&nbsp;_________________________</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span id="notBold">To:&nbsp;_________________________<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________</span></td>
                                </tr>
                            </table>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>Request conduct pre-repair inspection of the equipment / 
                                        plant property describes as follows:</p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td id="descriptionForm" name="descriptionForm">Description of Property: </td>
                                    <td id="locationForm" name="locationForm">Location of Property: </td>
                                </tr>
                                <tr>
                                    <td id="articleNomenclatureForm" name="articleNomenclatureForm">Article Nomenclature: </td>
                                    <td id="endItemForm" name="endItemForm">End Item: </td>
                                </tr>
                                <tr>
                                    <td id="plateNoForm" name="plateNoForm">Plate No.: </td>
                                    <td id="brandForm" name="brandForm">Type / Brand: </td>
                                </tr>
                                <tr>
                                    <td id="engineNoForm" name="engineNoForm">Engine No.: </td>
                                    <td id="chassisNoForm" name="chassisNoForm">Chassis No.: </td>
                                </tr>
                                <tr>
                                    <td id="natureOfLastRepairForm" name="natureOfLastRepairFormorm">Nature of Last Repair: </td>
                                    <td id="acquisitionCostForm" name="acquisitionCostForm">Acquistion Cost: </td>
                                </tr>
                                <tr>
                                    <td id="dateOfLastRepairForm" name="dateOfLastRepairForm">Date of Last Repair: </td>
                                    <td></td>
                                </tr>
                            </table>
                            <div class="row" id="b">
                                <div class="col-md-12">
                                    <p id="defectsLabel">Defects / Complain: </p>
                                    <p id="defectsForm">&nbsp;</p>
                                </div>
                            </div>
                            <div class="row" id="b">
                                <div class="col-md-12">
                                    <p id="natureOfWorksToBeDoneLabel">Nature and scope of works to be done: </p>
                                    <p id="natureOfWorksToBeDoneForm">&nbsp;</p>
                                </div>
                            </div>
                            <div class="row" id="b">
                                <div class="col-md-12">
                                    <p id="partsToBeProcuredLabel">Parts to be procured / Replaced: </p>
                                    <p id="partsToBeProcuredForm">&nbsp;<br><br><br></p>
                                </div> 
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Requested by:<br><br>
                                        <p><span id="notBold">______________________________</br>
                                        <?php
                                            $reqby = '<p id="requestedByForm"><span id="notBold">
                                                ______________________________<br>Supply NCO:Acad</span></p>';
                                            echo ($reqby);
                                        ?>
                                        <p><span id="notBold">Date signed:___________________</span></p>
                                    </td>
                                    <td>Noted by:<br><br>
                                        <p><span id="notBold">LEON L. ONGGAO JR.<br>MAJ (INF) PA<br>
                                            Commanding Officer: TMC</span></p>
                                        <p><span id="notBold">Date signed:___________________</span></p>
                                    </td>
                                </tr>
                            </table>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>ACTION TAKEN</p>
                                </div>
                            </div>
                            <div class="row" id="b">
                                <div class="col-md-12">
                                    <p id="sectionBLabel">Section B: Report of Pre-Repair Inspector:</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="findingsLabel"><span id="notBold">Findings / 
                                        Observations  ___________________________________________________________</span></p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Pre-Inspected by: <br><br>
                                        <p><span id="notBold">_________________________<br>_________________________</span></p>
                                        <p><span id="notBold">MFO Inspector</span></p>
                                        <p><span id="notBold">Date signed:_______________</span></p>
                                    </td>
                                    <td>Witnessed by: <br><br>
                                        <p><span id="notBold">_________________________<br>_________________________</span></p>
                                        <p><span id="notBold">Maintenance NCO</span></p>
                                        <p><span id="notBold">Date signed:_______________</span></p>
                                    </td>
                                    <td>Noted by: MFO Representatives:<br><br>
                                        <p><span id="notBold">_________________________<br>_________________________</span></p>
                                        <p><span id="notBold">Chief, Pre-Audit MFO</span></p>
                                        <p><span id="notBold">Date signed:_______________</span></p>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">             
                <button type="button" data-toggle="modal" form="joForm" 
                    onclick="printForm('joPreFormPrint')" class="btn btn-primary">
                    <i class="fa fa-print fa-fw"></i> Print</button>
                <button id="cancelbtn" type="button" data-toggle="modal" class="btn btn-primary" 
                    data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Pre Form Modal