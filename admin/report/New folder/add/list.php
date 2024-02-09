
<div class="container">
	<?php
		 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

		check_message();
			
		?>

 
<h1 class="page-header">Batch Delivery<a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Batch  </a> 
			<a href="add/index.php?view=add_p" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Delivery Detail </a></h1>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
                  <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			 		<thead>
			 		<tr >
				  		
				  		<th>Batch #</th>
				  		<th>Date of Delivery</th>
				  		<th>Payment Remittance</th>	 
				  		<th >Status</th>
						
				  		
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
					   <?php 
				  		$query = "SELECT * FROM `tbldelivery` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';
						  echo '<td width="4%"><a href="#" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="orders" >'.$result->batchno .'</a> </td>';  
						echo '<td width="4%">'. $result->date.'</td>';
						echo '<td width="4%">'. $result->pay_rem.'</td>';
						echo '<td width="4%">'. $result->status.'</td>';
						

				  	} 
				  	?>
				
			
			  	 		
 
				  	
				  	
				 </tbody>
				 	
				</table>
				<div class="btn-group">
				</div>
				</div>
				</form> 

  <div class="modal fade" id="myModal" tabindex="-1">
						
	</div><!-- /.modal -->
