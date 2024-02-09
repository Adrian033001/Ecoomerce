<?php 
	 if (!isset($_SESSION['ouid'])){
     } 
?>


<div class="row" style="margin:0;text-align:center;"><form  action="index.php" method="post">  	 <div class="col-lg-6"></div>   <div class="col-lg-4"> 	 <div class="col-md-12"  >  	    <div class="row">		  <div class="col-md-6">				<div class="form-group input-group"> 	                <label>From::</label> 	                <input type="date"                        name="date_pickerfrom" id="date_pickerfrom"min="1900-01-01" ></div>				</div><div class="col-md-6">    <div class="form-group input-group">         <label>To::</label> </br>        <input type="date" name="date_pickerto" id="date_pickerto"               min="1900-01-01" max="<?php echo date('Y-m-d'); ?> value="<?php echo date('y-m-d'); ?>"">           </div></div>	    </div> 	 </div>   </div>   <div class="col-lg-2">   	    <div class="row">		  <div class="col-md-12">			 <div class="form-group input-group" style="margin-top:25px;">                  <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>                </button>             </div>		   </div>  	    </div> 	 </div>   </div></form>
</div>




<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" ><h1>List of Damaged Products</h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?> </div>
	</div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;"> 
				<td >Damaged Batch Date</td>
				<td >Batch name</td>
				<td>Replenishment Name</td>
				<td>Product Image</td>
				<td>Product Name</td>
				<td>Quantity</td>  
				<td>Loss Amount</td>  
			</tr>

		</thead>
		<tbody>		
<?php
$totAmount = 0;
	$Capital = 0;
	$totQty =0;
	$markupPrice = 0;
if(isset($_POST['submit'])){

$sid = $_SESSION['shop_id'];
$query="SELECT *  FROM `tblrdamaged` s,  `tbldamage` d, `tblrestock` r , `tblproduct` p, `tblrsummary` rs  WHERE
 DATE(d_date) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(d_date) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' 
 AND d.`dam_id`=s.`dam_id` AND  d.`restock_id` = r.`restock_id` AND r.`res_id`= rs.`res_id` AND p.`PROID`=r.`PROID` AND s.`shop_id` = '$sid' 
";

			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

				  		if(!isset($cus)){
				  			foreach ($cur as $result) {
							$AMOUNT = $result->ORIGINALPRICE * $result->dam_qty ;
				 echo '<tr>';
							echo '
									<td>'.date_format(date_create($result->d_date),'M/d/Y h:i:s').'</td>
									<td>'.$result->dname.'</h3></td>
								 ';
								 echo '<td width="20%">'. $result->rname.'</td>';
								echo '<td width="1%" style="padding:0px;">
							<a class="PROID" href="" data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="'.$result->PRODNAME.'" style="width:100px;height:100px;padding:0;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 
						echo '<td width="20%">'. $result->PRODNAME.'</td>';
				  		echo '<td width="20%">'.$result->dam_qty.'</td>';
				  		echo '<td width="20%">'.$AMOUNT.'</td>';
			echo '</tr>';
			error_reporting (E_ALL ^ E_NOTICE);
			$ttlcap += $AMOUNT;
								} }else{
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
 
	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 
 
?>
</tbody>
<tfoot>

	<tr bgcolor="#FFA07A" style="font-weight: bold;">
		<td colspan="6">Total loss</td>
		<td style = "text-align: right">&#8369 <?php 
		
			error_reporting (E_ALL ^ E_NOTICE);
			echo number_format($ttlcap,2); ?></td>
		
	</tr>	

</tfoot>
</table>
 </form>
	</div>
	</span><script>date_pickerto.max = new Date().toISOString().split("T")[0];</script>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="window.print();return false;" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
   
