<?php 
	 if (!isset($_SESSION['suid'])){
     } 
?>


<div class="row" style="margin:0;text-align:center;">
<form  action="index.php" method="post">  
	 <div class="col-lg-6"></div>
   <div class="col-lg-4"> 
	 <div class="col-md-12"  > 
 	    <div class="row">
		  <div class="col-md-6">
				<div class="form-group input-group"> 
	                <label>From::</label> 
	                <input type="date"
                        name="date_pickerfrom" id="date_pickerfrom"min="1900-01-01" ></div>
				</div><div class="col-md-6">    <div class="form-group input-group">         <label>To::</label> </br>        <input type="date" name="date_pickerto" id="date_pickerto"               min="1900-01-01" max="<?php echo date('Y-m-d'); ?> value="<?php echo date('y-m-d'); ?>"">           </div></div>
	    </div> 
	 </div>
   </div>
   <div class="col-lg-2">  
 	    <div class="row">
		  <div class="col-md-12">
			 <div class="form-group input-group" style="margin-top:25px;">  
                <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>
                </button> 
            </div>
		   </div>  
	    </div> 
	 </div>
   </div>
</form>
</div>



<div class="row">
<span id="printout">
	<div class="col-md-12" >
	<div class="page-header" style="text-align:center;" >
	<h1>List of Best Seller Products</h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? date_format(date_create($_POST['date_pickerfrom']),'M/d/Y h:i:s') :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? date_format(date_create($_POST['date_pickerto']),'M/d/Y h:i:s') : '';?> </div>
	</div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;"> 
				<td >Product Name</td>
				<td >Product Description</td>
				<td >Quantity</td>
			</tr>

		</thead>
		<tbody>		
<?php
	$totAmount = 0;
	$Capital = 0;
	$totQty =0;
	$markupPrice = 0;
if(isset($_POST['submit'])){
$sid = $_SESSION['sshop_id'];
$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 
WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid' GROUP BY `PRODESC` ORDER BY `QTY` DESCLIMIT 1
";


// $query = "SELECT  *  FROM  `tblcustomer` c,  `tblsummary` s 
//            WHERE  c.`CUSTOMERID` = s.`CUSTOMERID` AND  ORDEREDSTATS='Confirmed' 
//            AND  date(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']), "Y-m-d")."' 
//            date(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']), "Y-m-d")."'";


			$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

				  		if(!isset($cus)){
				  			foreach ($cur as $result) {
			# code...		
							echo '<tr>
									<td>'.$result->PRODNAME.'</td>
									<td>'.$result->PRODESC.'</td>
									<td>'.$result->QTY .'</td>
								 </tr>';
			
		
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
	</span><script>date_pickerto.max = new Date().toISOString().split("T")[0];</script>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="window.print();return false;" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
   
