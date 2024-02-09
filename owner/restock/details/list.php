<?php
		//check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Restock Details</h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		
				  		<th style="text-align : center;">Product Image</th>
						<th style="text-align : center;">Replenishment Name</th>						<th style="text-align : center;">Replenishment Date</th>
						<th style="text-align : center;">Product Name</th>
						<th style="text-align : center;">Quantity</th>  

				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php
					
					if(isset($_POST['res_id'])){
					$res = $_POST['res_id'];
						$query = "SELECT * FROM `tblrestock` r , `tblproduct` p , `tblrsummary` rs 
           					 WHERE p.`PROID`=r.`PROID` AND  r.`res_id` = '$res' AND  r.`res_id` = rs.`res_id`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';
				  		
						echo '<td width="1%" style="padding:0px; text-align : center;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->PRODNAME.'" style="width:100px;height:120px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 
						echo '<td width="20%" style="padding:0px; text-align : center;"><h4>'. $result->rname.'</h4></td>';						echo '<td width="20%" style="padding:0px; text-align : center;"><h4>'.date_format(date_create( $result->res_date),'M/d/Y').'</h4></td>';
						echo '<td width="20%" style="padding:0px; text-align : center;"><h4>'. $result->PRODNAME.'</h4></td>';
				  		echo '<td width="5%" style="padding:0px; text-align : center;"><h4>'.$result->qty.'</h4></td>';
				  		}
						
					}
				  	?>
				  </tbody>
					
				 	
				</table>
				</form>