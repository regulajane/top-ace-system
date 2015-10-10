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
                <h4 class="modal-title" id="myModalLabel">Job Order Form</h4>
            </div>
            <div class="joPreForm modal-body" id="joPreFormPrint">
                <div class="row"  id="a">
                    <div class="col-md-12">
                        <form method="post" action="includes/newjoborder.php" id="preForm">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p>TOP ACE Motor Works Corp., Inc.</p>
                                    <p>369 Magsaysay Avenue, Baguio City * Tel. Nos.: 445-4848; 442-2805</p>
                                    <p>VAT Reg. TIN 000-279-654-000</p>
                                    <p>TEMPORARY JOB ORDER</p>
                                </div>
                            </div>
                            <table id="joformtable1" class="table table-borderless">
                                <tr>
                                    <td colspan="5"><span id="notBold"></td>
                                    <td colspan="1"><span id="notBold">No.&nbsp;_____________</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span id="notBold">To:&nbsp;_________________________________________________________________</td>
                                    <td colspan="2"><span id="notBold">Date:&nbsp;_____________________________</td>
                                </tr>
                                <tr>
                                    <td colspan="6"><span id="notBold">Address:&nbsp;_______________________________________________________________________________________________</td>
                                </tr>
                            </table>
                            <table id="joformtable2" class="table table-bordered">
                                <tr>
                                    <td colspan="1">QTY</td>
                                    <td colspan="3">DESCRIPTION</td>
                                    <td colspan="1">AMOUNT</td>
                                    <td colspan="1">QTY</td>
                                    <td colspan="3">DESCRIPTION</td>
                                    <td colspan="1">AMOUNT</td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                </tr>
                                
                                
                            </table>
                            <table id="joformtable3" class="table table-bordered">
                                <tr>
                                    <td colspan="1">QTY</td>
                                    <td colspan="3">DESCRIPTION</td>
                                    <td colspan="1">U-PRICE</td>
                                    <td colspan="1">AMOUNT</td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                 <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="1"></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="notBold">NOTE:&nbsp;FOR QUOTATION OF JOB ORDER ONLY</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id=""><span id="notBold">(All items not claimed within 30 days after accomplishment shall be forfeited in favor of TOP-ACE MOTOR WORKS CORP., INC)</span></p>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Machinist: <br><br>
                                        <p><span id="notBold"></span></p>
                                    </td>
                                    <td>Confirmed by: <br><br>
                                        <p><span id="notBold"></span></p>
                                    </td>
                                    <td>Received by:<br><br>
                                        <p><span id="notBold"></span></p>
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