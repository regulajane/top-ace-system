<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        include 'includes/header.php';
        include 'includes/head-elements.php';   
        if(!isset($_SESSION["username"])) {
            header('Location: index.php?loggedout=true');}
    ?>
    <script src="js/sales-script.js"></script>
    <script type="text/javascript" src="js/graph/canvasjs.min.js"></script>
    <title>Sales</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="pagecontainer">
    <br>
    <div class="container" id="sales">   

        <div class="actionBtns">
            <label>Select Year</label>
            <select id="saleYear" name="saleYear" style="border-radius: 4px;" required>
                <option value="" disabled selected >Select Year</option>
                    <?php
                        $sql = "SELECT saledate from sales ORDER BY saledate"; 
                        $result = $conn->query($sql);
                        $counterYear = array("");
                        if ($result->num_rows > 0) {
                             // output data of each row
                            while($resultRow = $result->fetch_assoc()){
                                 $year = explode("-",$resultRow['saledate']);
                                 
                                 
                                if(in_array( strval($year[0]), $counterYear) == false){     
                                    $option = '<option value="' . $resultRow['saleYear'] . '">' . $year[0] . '</option>';
                                    echo ($option);
                                    array_push($counterYear, strval($year[0]));
                                }
                                
                            }
                        }

                    ?>
                </select>
        </div>

        <!-- Graph -->
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>

        <div class="actionBtns">
            <button type="button" id="newsalebtn" class="btn btn-info" data-toggle="modal" 
                href="#salesModal"><i class="fa fa-plus fa-fw"></i> New Sale </button>
        </div>

        

        <!-- SalesTable -->
        <div>
            <table  id="salesTable" class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="saleid" data-visible="false" data-identifier="true">
                            Sale ID</th>
                        <th data-column-id="saledate">
                            Date</th>
                        <th data-column-id="invoiceno">
                            Invoice No</th>
                        <!-- <th data-column-id="modelno">
                            Model No</th> -->
                        <th data-column-id="itemname">
                            Name</th>   
                        <!-- <th data-column-id="itemsize">
                            Size</th>  --> 
                        <th data-column-id="noofitems">
                            Quantity</th>
                        <th data-column-id="saleprice" data-align="right" data-header-align="right">
                            Price</th>
                        <th data-column-id="total" data-align="right" data-header-align="right">
                            Total</th>
                    </tr>
                </thead>  
            </table>
        </div>
   
        <?php include 'includes/modals/modal-sales.php'; ?>
        <?php include 'includes/footer.php'; ?>
         </div>
    </div>  
</body>
</html>