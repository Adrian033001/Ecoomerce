<?php 
	 if (!isset($_SESSION['suid'])){
     } 
?>


</div>




<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" ><h1>List of Replenishment </h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?> </div>
	</div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;">
				<td>Replenishment Name</td>
				<td>Product Image</td>
				<td>Product Name</td>
				<td>Quantity</td>  
			</tr>

		</thead>
		<tbody>		
<?php

if(isset($_POST['submit'])){

$sid = $_SESSION['sshop_id'];
$query="SELECT *  FROM `tblrdamaged` s,  `tbldamage` d, `tblrestock` r , `tblproduct` p, `tblrsummary` rs  WHERE
 DATE(res_date) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(res_date) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' 
 AND  r.`res_id`= rs.`res_id` AND p.`PROID`=r.`PROID` AND p.`shop_id` = '$sid' group by r.`restock_id`
";

			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

				  		if(!isset($cus)){
				  			foreach ($cur as $result) {
			# code...		
				 echo '<tr>';
							
								 echo '<td width="20%"><h3>'. $result->rname.'</h3></td>';
								echo '<td width="1%" style="padding:0px;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->PRODNAME.'" style="width:100px;height:100px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 
						echo '<td width="20%"><h3>'. $result->PRODNAME.'</h3></td>';
				  		echo '<td width="20%"><h3>'.$result->qty.'</h3></td>';
			echo '<tr>';
								} }else{
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
 
	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

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
   