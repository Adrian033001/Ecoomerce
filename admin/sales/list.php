<?php 
	 if (!isset($_SESSION['U_ROLE'])=='Administrator'){
      redirect(web_root."admin/index.php");
     } 
?>




<div class="row" style="margin:0;text-align:center;">
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
error_reporting(0);
$mydb->setQuery($query);
$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C, `shop` sh
WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid' and sh.`shop_id` = '$sid'  GROUP BY `PRODESC` ORDER BY `QTY` DESC
";
?>



			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();
				  		if(!isset($cus)){
				  			foreach ($cur as $result) {
			# code...		
				  					$totAmount = 0;
								}
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
		 
 
?>

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
   