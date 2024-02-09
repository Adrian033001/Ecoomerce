<?php 
	 if (!isset($_SESSION['U_ROLE'])=='Administrator'){
      redirect(web_root."admin/index.php");
     } 
?>




<div class="row" style="margin:0;text-align:center;"><form  action="index.php" method="post">  	 <div class="col-lg-6"></div>   <div class="col-lg-4"> 	 <div class="col-md-12"  >  	    <div class="row">		  <div class="col-md-6">				<div class="form-group input-group"> 	                <label>From::</label> 	                <input type="date"                        name="date_pickerfrom" id="date_pickerfrom"min="1900-01-01" ></div>				</div><div class="col-md-6">    <div class="form-group input-group">         <label>To::</label> </br>        <input type="date" name="date_pickerto" id="date_pickerto"               min="1900-01-01" max="<?php echo date('Y-m-d'); ?> value="<?php echo date('y-m-d'); ?>"">           </div></div>	    </div> 	 </div>   </div>   <div class="col-lg-2">   	    <div class="row">		  <div class="col-md-12">			 <div class="form-group input-group" style="margin-top:25px;">                  <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>                </button>             </div>		   </div>  	    </div> 	 </div>   </div></form>
</div>




<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" >
	<h1>
	<?php 
	
			error_reporting (E_ALL ^ E_NOTICE);
	$shid = $_POST['shop'];
$query="SELECT * FROM `shop` s WHERE S.`shop_id` = '$shid'
";
$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();
				  	
				  			foreach ($cur as $result) {
	
							echo ''.$result->shop_name.'';
							}
							?>
							Sales Report</h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? date_format(date_create($_POST['date_pickerfrom']),'M/d/Y h:i:s') :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? date_format(date_create($_POST['date_pickerto']),'M/d/Y h:i:s') : '';?> </div>
	</div>
		 
		
<?php
	
if(isset($_POST['submit'])){
error_reporting(0);$query = "SELECT * FROM `shop`";
$mydb->setQuery($query);				  		$cur = $mydb->loadResultList();				  		if(!isset($cus)){				  			foreach ($cur as $result) {						$totAmount = 0;	$Capital = 0;	$totQty =0;	$markupPrice = 0;#$sid = $_POST['shop'];$sid = $result->shop_id;$sname = $result->shop_name;
$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C, `shop` sh
WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid' and sh.`shop_id` = '$sid'  GROUP BY `PRODESC` ORDER BY `QTY` DESC
";
?><form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">			<table class="table table-bordered table-hover" align="center" cellspacing="10px">		<thead><div class="page-header" style="text-align:center;" >	<h3><?php echo '</br>'.$sname. ''; ?></h3>	</div>			<tr bgcolor="skyblue" style="font-weight: bold;"> 				<td >Date Ordered</td>  				 <td >Product</td>				<td >Price</td>				<td >Quantity</td> 				<td >Sub-total</td>			</tr>		</thead>		<tbody><?php



			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();
				  		if(!isset($cus)){
				  			foreach ($cur as $result) {								if($result->PAYMENT === 0){
			# code...		
				  					$totAmount = 0;									$Capital = 0;									$totQty =0;										$AMOUNT = 0 ;								$CAP = 0 ;			$ttlsales = 0;			 			$totAmount = 0;
								}								else{								$AMOUNT = $result->PROPRICE * $result->QTY ;								$CAP = $result->ORIGINALPRICE * $result->QTY ;							echo '<tr>									<td>'.date_format(date_create($result->ORDEREDDATE),'M/d/Y ').'</td>									 <td>'.$result->PRODNAME.'</td>									<td>'.$result->PROPRICE.'</td>									<td>'.$result->QTY .'</td>									<td style = "text-align: right">&#8369 '.number_format($AMOUNT,2).'</td>  								 </tr>';						$Capital += $result->ORIGINALPRICE;				$markupPrice += $result->PROPRICE;			$totQty +=$result->QTY;				  			$totAmount += $AMOUNT;			$ttlsales = $totAmount/100;								}																						}?>												</tbody><tfoot>	<tr bgcolor="#FFFFE0" style="font-weight: bold;">		<td colspan="4">Total Sales</td>		<td style = "text-align: right">&#8369 <?php echo number_format($totAmount,2); ?></td>			</tr>		</br>	<tr bgcolor="#7FFF00" style="font-weight: bold;">		<td colspan="4">Total Recievable from <?php echo ''.$sname. ''; ?></td>		<td style = "text-align: right">&#8369 <?php 		if ($totAmount != 0) {			$ttlsales = $totAmount/100;}else{$ttlsales = 0;}			error_reporting (E_ALL ^ E_NOTICE);			echo number_format($ttlsales,2); ?></td>		</tr></tfoot></table>						<?php								}else{
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
		 
 
?>
<?php}} 	}else{			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';	}?>
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
   
