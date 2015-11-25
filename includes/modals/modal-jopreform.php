<!-- JO Pre Form Modal --> 
<div class="modal fade" id="joPreFormModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="width:755px;">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelbtn" onclick="reload()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Job Order Form</h4>
            </div>
            <div class="joPreForm modal-body" id="joPreFormPrint">
                <div class="row"  id="a">
                    <div class="print col-md-12">
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
                                    <td colspan="4"></td>
                                    <td colspan="2" id="joborderidform">Receipt No.&nbsp;<span id="notBold">___________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" id="clnameform">To:&nbsp;<span id="notBold">______________________________________________________________________</span></td>
                                    <td colspan="2" id="datebroughtform">Date:&nbsp;<span id="notBold">_________________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="6" id="claddressform">Address:&nbsp;<span id="notBold">_______________________________________________________________________________________</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" id="clcontactinfo">Contact number:&nbsp;<span id="notBold">_______________________________________________</span></td>
                                </tr>
                            </table>
                            <table id="joformtable2" class="table table-bordered">
                                <tr>
                                    <td colspan="9">Service Name</td>
                                    <td colspan="1">Service Price</td> 
                                </tr>

                                <tr id="s">
                                    <td colspan="9" id="srvname" ></td>
                                    <td colspan="1" id="srvprice" ></td>
                                </tr>

                               
                                
                                
                            </table>
                            <div id="tsc" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <table id="joformtable3" class="table table-bordered">
                                <tr>
                                    
                                    <td colspan="9" >Item Name</td>
                                    <td colspan="2" >Item Price</td>
                                    <td colspan="2" >Item Quantity</td>
                                </tr>
                                <tr>
                                    
                                    <td colspan="9" id="itemname"></td>
                                    <td colspan="2" id="itemprice"></td>
                                    <td colspan="2" id="itemqty"></td>
                                </tr>
                           
                            </table>
                            <div id="tic" style="border:1px solid white;text-align:right;margin:20px 20px 20px 10px;"></div>
                            <hr>

                            <table id="joformtable3" class="table table-bordered">
                                <!-- <tr>
                                    
                                    <td colspan="9" ></td>
                                    
                                    
                                </tr> -->
                                
                                    <tr>
                                        <td colspan="9" id="srcanditemcost" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="adjustments" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="grandtotal" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="dpayment" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" id="jobalance" style="border:1px solid white;text-align:right;"></td>
                                    </tr>
                                  
                                
                           
                            </table>

                            <hr>
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
                                        <span id="notBold"><p id="machinistform"></p></span>
                                    </td>
                                    <td>Confirmed by: <br><br>
                                        <span id="notBold"><p id="confirmedbyform"></p></span>
                                    </td>
                                    <td>Received by:<br><br>
                                        <span id="notBold"><p id="receivedbyform"></p></span>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="cancelbtn" type="button" data-toggle="modal" class="btn btn-primary" 
                    data-dismiss="modal" onclick="reload();"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>             
                <button type="button" data-toggle="modal" form="joForm" 
                    onclick="printForm('joPreFormPrint')" class="btn btn-success">
                    <i class="fa fa-print fa-fw"></i> Print</button>
            </div>
        </div>
    </div>
</div> 
<!-- JO Pre Form Modal