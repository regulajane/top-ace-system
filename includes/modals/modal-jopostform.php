<!-- Access validation -->
<?php
    if(!isset($_SESSION["username"])){
    header('Location: ../index.php?loggedout=true');}
?>
<!-- JO Post Form Modal --> 
<div class="modal fade" id="joPostFormModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Post-Repair Inspection Form</h4>
            </div>
            <div class="modal-body" id="joPostFormPrint">
                <div class="col-md-12">
                    <p>Form Nr 3</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row text-center">
                            <p>REQUEST FOR POST-REPAIR INSPECTION</p>
                        </div>
                        <form method="post" action="includes/newjoborder.php" id="postForm">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Section A: Request for Post-Repair</td>
                                    <td id="dateOfPostrepairRequestForm" name="dateOfPostrepairRequestForm">
                                        Date:&nbsp;_________________________</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span id="notBold">To:&nbsp;_________________________<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________</span></td>
                                </tr>
                            </table>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>Request conduct post-repair inspection of the equipment / 
                                        plant property describes as follows:</p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td id="descriptionPostForm" name="descriptionPostForm">Description of Property: </td>
                                    <td id="locationPostForm" name="locationPostForm">Location of Property: </td>
                                </tr>
                                <tr>
                                    <td id="articleNomenclaturePostForm" name="articleNomenclaturePostForm">
                                        Article Nomenclature: </td>
                                    <td id="endItemPostForm" name="endItemPostForm">End Item: </td>
                                </tr>
                                <tr>
                                    <td id="plateNoPostForm" name="plateNoPostForm">Plate No.: </td>
                                    <td id="brandPostForm" name="brandPostForm">Type / Brand: </td>
                                </tr>
                                <tr>
                                    <td id="engineNoPostForm" name="engineNoPostForm">Engine No.: </td>
                                    <td id="chassisNoPostForm" name="chassisNoPostForm">Chassis No.: </td>
                                </tr>
                                <tr>
                                    <td id="contractNoPostForm" name="contractNoPostForm">JO/WO/Contract No.: </td>
                                    <td id="amountPostForm" name="amountPostForm">Amount: </td>
                                </tr>
                                <tr>
                                    <td id="accountOfPostForm" name="accountOfPostForm">Account of: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td id="deliveredAtPostForm" name="deliveredAtPostForm">Delivered at: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td id="dateDeliveredPostForm" name="dateDeliveredPostForm">Date Delivered.: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td id="contractorPostForm" name="contractorPostForm">Dealer/ Contractor: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td id="invoiceReceiptNoPostForm" name="invoiceReceiptNoPostForm">Invoice Receipt No.: </td>
                                    <td></td>
                                </tr>
                            </table>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Requested by:<br><br>
                                        <p><span id="notBold">______________________________</br>
                                            <?php
                                                $reqby = '<p id="requestedByPostForm"><span id="notBold">
                                                    ______________________________<br>Supply Sgt:____________________</span></p>';
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
                            <div class="row">
                                <div class="col-md-12"> 
                                    <p id="sectionB2Label">Section B:</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>For MFO Portion Only</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="toLabel"><span id="notBold">To:&nbsp;&nbsp;MFO Inspector/Representative
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PMA, FDP, Baguio City
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________</span></p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p><span id="notBold">Please conduct inspection on the 
                                        above stated requested for inspection.</span></p>
                                </div>
                            </div>
                            <div class="row text-right">
                                <div class="col-md-12">
                                    <p><span id="notBold">Date Signed:_______________</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="sectionCLabel">Section C:</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>ACTION TAKEN</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="findingsLabel"><span id='notBold'>Findings / 
                                        Observations  _________________________________________________________________</span></p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Inspected by: <br><br>
                                        <p><span id="notBold">_________________________<br>_________________________</span></p>
                                        <p><span id="notBold">Designated Inspector</span></p>
                                        <p><span id="notBold">Date signed:_______________</span></p>
                                    </td>
                                    <td>Witnessed by: <br><br>
                                        <p><span id="notBold">_________________________<br>_________________________</span></p>
                                        <p><span id="notBold">Maintenance NCO</span></p>
                                        <p><span id="notBold">Date signed:_______________</span></p>
                                    </td>
                                    <td>Certified by: <br><br>
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
                <button type="button" onclick="printForm('joPostFormPrint')" class="btn btn-primary" 
                    data-dismiss="modal"><i class="fa fa-print fa-fw"></i> Print</button>
                <button id="cancelbtn2" type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Post Form Modal