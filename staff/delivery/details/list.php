 
<div class="container">
	<?php
		 if (!isset($_SESSION['suid'])){
      redirect(web_root."staff/index.php");
     }

		check_message();
			
		?>

 
 	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Orders</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			 
			    <form action="controller.php?action=delete" Method="POST">  					
				 <div class="table-responsive">	
                  <table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
			 		<thead>
			 		<tr >
				  		<th>#</th>
				  		<th>Order#</th>
				  		<th>Customer</th>
						<th>Address</th>
				  		<th>DateOrdered</th>	 
				  		<th >Price</th>
				  		<th >PaymentMethod</th>	
						
				  		<th width="100px">Action</th>
				  	<!--	<th>Status</th>
				  		<th width="100px">Action</th>-->
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
					<?php
						if(isset($_POST['res_id'])){
							$delid = $_POST['res_id'];
				  		$query = "SELECT * FROM `tblsummary` s ,`tblcustomer` c , `tbldelivery` d
				  				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` AND d.`batchid`= '$delid' AND d.`SUMMARYID`=s.`ORDEREDNUM` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						
					?>

					<?php
						echo '<tr>';
				  		echo '<td width="3%" align="center"></td>';
				  		echo '<td><a href="#" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="orders" data-id="'.$result->ORDEREDNUM.'">'.$result->ORDEREDNUM .'</a> </td>';  
				  		echo '<td>'. $result->FNAME.' '. $result->LNAME.'</td>';
						echo '<td>'. $result->CUSHOMENUM.' &nbsp '. $result->STREETADD.' &nbsp '. $result->BRGYADD.' &nbsp '. $result->CITYADD.' &nbsp '. $result->CITYADD. ' &nbsp '. $result->PROVINCE.' &nbsp '. $result->ZIPCODE.'</td>';
				  		echo '<td>'. date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s").'</td>';
				  		echo '<td> &#8369 '.number_format($result->PAYMENT ,2).'</td>';
				  		echo '<td >'.$result->PAYMENTMETHOD .'</td>';
				  		
				  		if($result->ORDEREDSTATS=='Pending'){
				  				echo '<td><a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  				<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=confirm"  class="btn btn-primary btn-xs">Confirm</a></td>';
			  	 		}elseif($result->ORDEREDSTATS=='Confirmed'){
				  	 			echo '<td>
								<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=pack"  class="btn btn-primary btn-xs">Packed</a></td>';
				  	 		 
			  	 		}elseif($result->ORDEREDSTATS=='Prepaired'){
			  	 			 echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>To be delivered</a>
							 <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=delivery"  class="btn btn-primary btn-xs">Out for delivery</a></</td>';				
			
			  	 		}elseif($result->ORDEREDSTATS=='Delivery'){
			  	 			 echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>Out for delivery</a>
							<a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=delivered"  class="btn btn-primary btn-xs">Delivered</a></td>';				
			
			  	 		}elseif($result->ORDEREDSTATS=='Delivered'){
			  	 			 echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>Delivered</a></td>';				
			
			  	 		} else{
			  	 			 echo '<td> <a  href="#"  class="btn btn-danger btn-xs" disabled>Cancelled</a></td>';				
			
			  	 		}
				  		
						
				  		
						error_reporting (E_ALL ^ E_NOTICE);
						$ttlamt += $result->PAYMENT;
						
						
				  	}
					
					
						}
						
				  	?> 
					
				 </tbody>
				 	
				</table>
				
				<table id="example" class="table  table-striped table-bordered table-hover"  style="font-size:20px" >
				<thead>
			 		<tr>
				  		<th>Total Remittance Amount</th>
						<?php
						error_reporting (E_ALL ^ E_NOTICE);
					echo '<th>&#8369 '.number_format($ttlamt,2).'</th>';
					?>
				  	</tr>	
			   		</thead>
					
				</table>
				<div class="btn-group">
				</div>
				</div>
				</form> 

  <div class="modal fade" id="myModal" tabindex="-1">
						
	</div><!-- /.modal -->
