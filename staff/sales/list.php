<?php 	 if (!isset($_SESSION['suid'])){     } ?><div class="row" style="margin:0;text-align:center;"><form  action="index.php" method="post">  	 <div class="col-lg-6"></div>   <div class="col-lg-4"> 	 <div class="col-md-12"  >  	    <div class="row">		  <div class="col-md-6">				<div class="form-group input-group"> 	                <label>From::</label> 	                <input type="date"                        name="date_pickerfrom" id="date_pickerfrom"min="1900-01-01" ></div>				</div><div class="col-md-6">    <div class="form-group input-group">         <label>To::</label> </br>        <input type="date" name="date_pickerto" id="date_pickerto"               min="1900-01-01" max="<?php echo date('Y-m-d'); ?> value="<?php echo date('y-m-d'); ?>"">           </div></div>	    </div> 	 </div>   </div>   <div class="col-lg-2">   	    <div class="row">		  <div class="col-md-12">			 <div class="form-group input-group" style="margin-top:25px;">                  <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>                </button>             </div>		   </div>  	    </div> 	 </div>   </div></form></div><div class="row"><span id="printout">	<div class="col-md-12" >	<div class="page-header" style="text-align:center;" ><h1>List of Ordered Products</h1>		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?> </div>	</div>		 <form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">		<table class="table table-bordered table-hover" align="center" cellspacing="10px">		<thead>			<tr bgcolor="skyblue" style="font-weight: bold;"> 				<td >Date Ordered</td>  				 <!--<td >Customer</td> -->				<td >Product</td>				<!--<td >Original Price</td> -->				<td >Price</td>				<td >Quantity</td> 				<td >Sub-total</td>			</tr>		</thead>		<tbody>		<?php	$totAmount = 0;	$Capital = 0;	$totQty =0;	$markupPrice = 0;if(isset($_POST['submit'])){$from = $_POST['date_pickerfrom'];$to = $_POST['date_pickerto'];$days = (strtotime($to) - strtotime($from)) / (60 * 60 * 24);$sid = $_SESSION['sshop_id'];if($days == 1){$query="SELECT *,ORDEREDQTY as 'QTY'   FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid' GROUP BY `ORDERID`";			$mydb->setQuery($query);				  		$cur = $mydb->loadResultList();				  		if(!isset($cus)){				  			foreach ($cur as $result) {			# code...						  				$AMOUNT = $result->PROPRICE * $result->QTY ;								$CAP = $result->ORIGINALPRICE * $result->QTY ;							echo '<tr>';									echo '<td>'.date_format(date_create($result->ORDEREDDATE),'M/d/Y').'</td>';									echo '<td>'.$result->PRODNAME.'</td>';									#echo '<td>'.$result->ORIGINALPRICE.'</td>';									echo '<td>'.$result->PROPRICE.'</td>';									echo '<td>'.$result->QTY .'</td>';									echo '<td style = "text-align: right">&#8369 '.number_format($AMOUNT,2).'</td>  ';								echo '</tr>';						$Capital += $result->ORIGINALPRICE;				$markupPrice += $result->PROPRICE;			$totQty +=$result->QTY;				  			$totAmount += $AMOUNT;			error_reporting (E_ALL ^ E_NOTICE);			$ttlcap += $CAP;			$ttlsales = $totAmount - $ttlcap;								} }else{									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';								}}else{								$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid' GROUP BY `PRODESC`";// $query = "SELECT  *  FROM  `tblcustomer` c,  `tblsummary` s //            WHERE  c.`CUSTOMERID` = s.`CUSTOMERID` AND  ORDEREDSTATS='Confirmed' //            AND  date(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']), "Y-m-d")."' //            date(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']), "Y-m-d")."'";			$mydb->setQuery($query);				  		$cur = $mydb->loadResultList();				  		if(!isset($cus)){				  			foreach ($cur as $result) {			# code...						  				$AMOUNT = $result->PROPRICE * $result->QTY ;								$CAP = $result->ORIGINALPRICE * $result->QTY ;							echo '<tr>';									echo '<td>'.date_format(date_create($result->ORDEREDDATE),'M/d/Y').'</td>';									echo '<td>'.$result->PRODNAME.'</td>';									#echo '<td>'.$result->ORIGINALPRICE.'</td>';									echo '<td>'.$result->PROPRICE.'</td>';									echo '<td>'.$result->QTY .'</td>';									echo '<td style = "text-align: right">&#8369 '.number_format($AMOUNT,2).'</td>  ';								echo '</tr>';						$Capital += $result->ORIGINALPRICE;				$markupPrice += $result->PROPRICE;			$totQty +=$result->QTY;				  			$totAmount += $AMOUNT;			error_reporting (E_ALL ^ E_NOTICE);			$ttlcap += $CAP;			$ttlsales = $totAmount - $ttlcap;								} }else{									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';								}} 	}else{			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';	}	  ?></tbody><tfoot>	<tr bgcolor="#FFFFE0" style="font-weight: bold;">		<td colspan="4">Total Sales</td>		<td style = "text-align: right">&#8369 <?php echo number_format($totAmount,2); ?></td>			</tr>		</br>	<!--<tr bgcolor="#FFA07A" style="font-weight: bold;">		<td colspan="5">Total Capital</td>		<td style = "text-align: right">&#8369 <?php 					error_reporting (E_ALL ^ E_NOTICE);			echo number_format($ttlcap,2); ?></td>			</tr>		</br> -->	<tr bgcolor="#7FFF00" style="font-weight: bold;">		<td colspan="4">Profit</td>		<td style = "text-align: right">&#8369 <?php 			error_reporting (E_ALL ^ E_NOTICE);			echo number_format($ttlsales,2); ?></td>			</tr></tfoot></table> </form>	</div>	</span><script>date_pickerto.max = new Date().toISOString().split("T")[0];</script>	<div class="row">		<div class="col-md-12">			<div class="col-md-2"> 				<button onclick="window.print();return false;" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button> 		</div>	  </div>	</div></div>   