<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>
	    <script src="js/fabrication-inventory-script.js"></script>		
		<title>Inventory</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
	    <div class="pagecontainer">
	    <br>
		    <div id="fabrication">
		    	<div class="container">        
		        <h4>Fabrication Items</h4>
		        <div class="actionBtns" style="position: relative; float:right; ">
		            <div style="position: relative; margin-top: -40px;">
		                <a type="button" class="btn btn-primary" href="inventory.php" title="Inventory">
		                    <i class="fa fa-arrow-left fa-fw"></i> Back</a>
		            </div>
		        </div>
		        <hr>
				<div class="actionBtns">
					<button type="button" id="addnew" class="btn btn-info" data-toggle="modal" 
						href="#"><i class="fa fa-plus fa-fw"></i>New Item</button>

					<div class="btn-group">
		                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Upload Files </a>
		                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
		                <span class="fa fa-caret-down"></span></a>
		                <ul class="dropdown-menu">
		                    <li><a data-toggle="modal"  href="#importNewItemsFabrication">
			                    	<i class="fa fa-list"></i> New Items (.excel)</a></li>
		                </ul>
	        		</div>
				</div>
				
				<table  id="fabricationTable" class="table table-condensed table-hover table-striped" style="margin-top: 20px">
					<thead>
						<tr><th data-column-id="itemid" data-visible="false"  data-identifier="true">Item ID</th>
							<th data-column-id="itemname">Name</th>
							<th data-column-id="itemsizediam">Size (diam)</th>
							<th data-column-id="itemsizelength">Length (length)</th>
						</tr>
					</thead>  
				</table>
				<?php include 'includes/modals/modal-fabricationitems.php';?>  
				<?php include 'includes/footer.php'; ?>
				</div>
			</div>
		</div>
	</body>
</html>