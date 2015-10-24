<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>
		<script src="js/inventory-script.js"></script>
		<title>Inventory</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<br />
		<div class="container">
			<div class="jumbotron" style="height: 100px;">
            	<h2 style="margin-top: -15px; margin-left: -60px; text-align: center;">Inventory</h2>
        	</div>
			<!-- Inventory Buttons -->
			<div id="inventory">
				   <div class="actionBtns">
						<button type="button" id="addnew" class="btn btn-info" data-toggle="modal" 
							href="#addNewSupply"><i class="fa fa-plus fa-fw"></i> Add New Supply </button>

						<a class="btn btn-info" href="fabrication-items.php">
						<i class="fa fa-folder-open">
						</i> Fabrication Items</a>
						</a>

	           			 <div class="btn-group">
			                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Logs </a>
			                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			                <span class="fa fa-caret-down"></span></a>
			                <ul class="dropdown-menu">
			                    <li>
			                    	<a type="button" class="btn btn-info" href="ingoing-items.php" 
			                        style="text-align:left;  margin: 0px 5px 5px 5px; width: 94%;">
			                        <i class="fa fa-list"></i>Ingoing
			                        </a>
			                    </li>
			                    <li><a type="button" class="btn btn-info" href="outgoing-items.php" 
			                        style="text-align:left;  margin: 0px 5px 0px 5px; width: 94%;">
			                            <i class="fa fa-list"></i> Outgoing</a>
			                            </li>
			                </ul>
	            		</div>
            	</div>
			</div> 
			<hr>
			<!-- Inventory Table -->

			<div id="test1">
				<button type="button" id="editsupplybtn" class="btn btn-info" data-toggle="modal" title "Edit"
					href="#editSupplyModal">
	                <i class="fa fa-pencil-square-o fa-fw"></i> 
                </button>
				<button type="button" id="addsupplybtn" class="btn btn-info" data-toggle="modal" 
						href="#addInventoryModal" title="Add">
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
				</button>
				<button type="button" id="procuresupplybtn" class="btn btn-info" data-toggle="modal"
						title="Procure" href="#procSuppliesModal">
					<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>
				</button>
				<button type="button" id="deletesupplyBtn" class="btn btn-info" data-toggle="modal"
						title "Delete" href="#deleteSuppliesModal">
					<span class="glyphicon glyphicon-remove-sign"></span>
				</button>
			</div>

			<!-- Inventory Table -->
			<table  id="inventoryTable" class="table table-condensed table-hover">
				<thead>
					<tr>
						<th data-column-id="modelno">
							Model No
						</th>
						<th data-column-id="inventoryid" data-visible="false"  data-identifier="true">
							Inventory ID
						</th>
						<th data-column-id="inventoryname">
							Name
						</th>
						<th data-column-id="inventorysize">
							Size
						</th>
						<th data-column-id="inventoryprice">
							Price
						</th>
						<th data-column-id="inventoryquantity">
							Quantity
						</th>
						<th id="options" data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">
							Options
						</th>
						<th data-column-id="reorderlevel" data-visible="false">
							Reorder Level
						</th>

					</tr>
				</thead>  
			</table>
			<hr>

			<?php include 'includes/footer.php'; ?>
		</div>
		<!-- Job Order Modals -->
		<?php 
			include 'includes/modals/modal-supplies.php';
		?>   
	</body>
</html>