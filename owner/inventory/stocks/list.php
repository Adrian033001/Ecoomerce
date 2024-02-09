
<?php 
	 if (!isset($_SESSION['ouid'])){
     } 
?>



<div class="row" style="margin:0;text-align:center;">

</div>




<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" ><h1>List of Products Available</h1></div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
				  	<tr>
				  		<th width="50">Image</th>
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Product Name</th> 
				  		<th>Description</th>
				  		<!-- <th>Category</th> -->
				  		<th>Quantity</th>  

				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
					$sid = $_SESSION['sshop_id'];
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c 
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` AND  p.`shop_id` = '$sid'";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						
				  		echo '<tr>';
				    echo '<td style="padding:0px;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->CATEGORIES.'" style="width:100px;height:100px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 	
				  		// echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i> ' . $result->PROMODEL.'</a></td>';
				  		echo '<td><h3>'.$result->PRODNAME.'</h3></td>';
				  		
				  		echo '<td><h3>'. $result->PRODESC.'</h3></td>'; 

				  		echo '<td width="4%"><h3>'. $result->PROQTY.'</h3></td>';
				  		// echo '<td><a href="controller.php?action=delete&id='.$result->PROD.'" class="btn btn-danger">delete</a></td>';

				  		
				  		// if ($result->PROSTATS=='Available'){
				  		// 	$stats = 'Available';
				  		// }else{
				  		// 	$stats = 'NotAvailable';
				  		// }
				  	// 	echo
				  	// 	 '<td align="left">
							// <a href="'.web_root.'admin/products/controller.php?action=edit&id='.$result->PROID.'&stats='.$stats.'" class="btn btn-primary btn-xs">'.$stats.'</a>
							// <a href="settings.php?id='.$result->PROID.'" data-toggle="lightbox"  class="btn btn-primary btn-xs">Set Discount</a>
				  	// 	 </td>';
				  	} 
						
				  	?>
				  </tbody>
					
				 	
				</table>
 </form>
	</div>
	</span>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="window.print();return false;" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
