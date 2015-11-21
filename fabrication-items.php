<!DOCTYPE html>
<html lang="en">
	<head>
		<?php   
	        include 'includes/header.php';
	        include 'includes/head-elements.php';   
	        if(!isset($_SESSION["username"])) {
	            header('Location: index.php?loggedout=true');}
	    ?>		
		<title>Inventory</title>
	</head>
	<body>
		<?php include 'includes/nav.php'; ?>
		<div id="fabrication">
			<div class="container" style="margin-top: 20px">
				<div class="actionBtns">
							<a type="button" class="btn btn-info" href="inventory.php" >
                    			<i class="fa fa-arrow-left fa-fw"></i> Back
                    		</a>
							<button type="button" id="addnew" class="btn btn-info" data-toggle="modal" 
								href="#"><i class="fa fa-plus fa-fw"></i>Add New Item</button>

							<div class="btn-group">
				                <a class="btn btn-info" href="#"><i class="fa fa-folder-open"></i> Upload Files </a>
				                <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
				                <span class="fa fa-caret-down"></span></a>
				                <ul class="dropdown-menu">
				                    <li>
				                    	<a type="button" class="btn btn-info" data-toggle="modal"  href="#" 
				                        style="text-align:left;  margin: 0px 5px 5px 5px; width: 94%; color: #FFF">
				                        <i class="fa fa-list"></i> New Items (.excel)
				                        </a>
				                    </li>
				                </ul>
		            		</div>
				</div>
				<table  id="fabricationTable" class="table table-condensed table-hover table-striped" style="margin-top: 20px">
				<thead>
					<tr>
						<th data-column-id="fabricationid" data-visible="false"  data-identifier="true">
							Fabrication ID
						</th>
						<th data-column-id="fabricationname">
							Fabrication Name
						</th>
						<th data-column-id="fabricationsize(diam)">
							Fabrication Size (diam)
						</th>
						<th data-column-id="fabricationsize(length)">
							Fabrication Length (length)
						</th>
						<th data-column-id="reorderlevel" data-visible="false">
							Reorder Level
						</th>

					</tr>
				</thead>  
			</table>
				<?php include 'includes/footer.php'; ?>
			</div>
		</div>
	</body>
</html>