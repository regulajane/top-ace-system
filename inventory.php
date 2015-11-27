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
		<div class="pagecontainer">
    	<br>
		<div class="container">
			<!-- Inventory Buttons -->
			<div id="inventory">
				   <div class="actionBtns">
						<button type="button" id="addnew" class="btn btn-info" data-toggle="modal" 
							href="#addNewSupply"><i class="fa fa-plus fa-fw"></i>New Item</button>

						<a class="btn btn-info" href="fabrication-items.php">
						<i class="fa fa-folder-open">
						</i> Fabrication Items</a>
						</a>

						<div class="btn-group">
			                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Upload Files </a>
			                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			                <span class="fa fa-caret-down"></span></a>
			                <ul class="dropdown-menu">
			                    <li><a data-toggle="modal"  href="#importNewItems">
			                    	<i class="fa fa-list"></i> New Items (.excel)</a></li>
			                    <li class="divider"></li>
			                    <!-- <li><a data-toggle="modal"  href="#importNewItems">
			                        <i class="fa fa-list"></i> Edit Price (.excel)</a></li>
			                    <li class="divider"></li>
								<li><a data-toggle="modal"  href="#importNewItems">
			                        <i class="fa fa-list"></i> Edit Quantity (.excel)</a></li> -->
			                </ul>
	            		</div>

	           			 <div class="btn-group">
			                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Logs </a>
			                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			                <span class="fa fa-caret-down"></span></a>
			                <ul class="dropdown-menu">
			                    <li><a href="ingoing-items.php"><i class="fa fa-list"></i> Ingoing</a></li>
			                    <li class="divider"></li>
			                    <li><a href="outgoing-items.php"><i class="fa fa-list"></i> Outgoing</a></li>
			                </ul>
	            		</div>
            	</div>
			</div> 
			<hr>
			<!-- Inventory Table -->

			<div id="test1">
				<button type="button" id="editsupplybtn" class="btn btn-info" data-toggle="modal" title "Edit"
					href="#editSupplyModal">
	                <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                </button>
				<button type="button" id="addsupplybtn" class="btn btn-info" data-toggle="modal" 
						href="#addInventoryModal" title="Add">
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</button>
				<button type="button" id="procuresupplybtn" class="btn btn-info" data-toggle="modal"
						title="Procure" href="#procSuppliesModal">
					<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Procure
				</button>
			</div>

			<!-- Inventory Table -->
			<table  id="inventoryTable" class="table table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th data-column-id="modelno">
							Model No
						</th>
						<th data-column-id="inventoryid" data-visible="false"  data-identifier="true">
							Inventory ID
						</th>
						<th data-column-id="inventoryname"  data-width="30%">
							Name
						</th>
						<th data-column-id="inventorysize">
							Size
						</th>
						<th data-column-id="inventoryprice" data-align="right" data-header-align="right">
							Price
						</th>
						<th data-column-id="inventoryquantity">
							Quantity
						</th>
						<th data-column-id="reorderlevel" >
							Reorder Level
						</th>

					</tr>
				</thead>  
			</table>

			<?php include 'includes/footer.php'; ?>
		</div>
	</div>
		<!-- Job Order Modals -->
		<?php 
			include 'includes/modals/modal-supplies.php';
		?>   
	</body>
</html>