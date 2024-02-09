<?php
		//check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Damaged Details</h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		
				  		<th>Product Image</th>
						<th>Replenishment Name</th>
						<th>Product Name</th>
						<th>Quantity</th>  

				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php
					
					if(isset($_POST['dam_id'])){
					$res = $_POST['dam_id'];
						$query = "SELECT * FROM `tblrestock` r , `tblproduct` p , `tbldamage` dm 
           					 WHERE   dm.`dam_id` = '$res' AND  r.`restock_id` = dm.`restock_id` AND r.`PROID`=p.`PROID` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';
				  		
						echo '<td width="1%" style="padding:0px;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->PRODNAME.'" style="width:200px;height:250px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 
						echo '<td width="20%"><h3>'. $result->PRODNAME.'</h3></td>';
						echo '<td width="20%"><h3>'. $result->PRODNAME.'</h3></td>';
				  		echo '<td width="20%"><h3>'.$result->dam_qty.'</h3></td>';
				  		}
						
					}
				  	?>
				  </tbody>
					
				 	
				</table>
				</form>