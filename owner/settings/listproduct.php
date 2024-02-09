<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Products   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr>  
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Product Name</th> 
				  		<th>Description</th>
				  		<th>Category</th>
				  		<th>Price</th>
				  		<!-- <th>Quantity</th>   -->
				  		<th width="130">Action</th> 
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
					$sid =$_SESSION['shop_id'];
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` AND p.`shop_id`='$sid'";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>'; 
				    		echo '<td>'.$result->PRODNAME.'</td>';
				  		echo '<td>'.$result->PRODESC.'</td>';
				  		 
				  		
				  		echo '<td>'. $result->CATEGORIES.'</td>'; 
				  		// echo '<td>'. $result->CATEGORIES.'</td>'; 
				  		echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'</td>';
				  		// echo '<td width="4%">'. $result->PROQTY.'</td>'; .
				  		
				  		
				  		echo
				  		 '<td align="left">
							
							<a href="setDiscount.php?id='.$result->PROID.'" data-toggle="lightbox"  class="btn btn-primary btn-xs">Set Discount</a>
				  		 </td>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div> -->
				</div>
				</form>
 
 