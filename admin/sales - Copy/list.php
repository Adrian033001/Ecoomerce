<?php 
	 if (!isset($_SESSION['U_ROLE'])=='Administrator'){
      redirect(web_root."admin/index.php");
     } 
?>




<div class="row" style="margin:0;text-align:center;">

<form  action="index.php" method="post">  
	 <div class="col-md-6">
					</br><div class="form-group input-group"> 
		                <label>Shop::</label> <span class="input-group-btn">
		                    
		                </span>
		                <select class="form-control input-sm" name="shop" id="shop">
                          
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `shop` ORDER BY `shop_name` ASC");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->shop_id.' >'.$result->shop_name.'</option>';
                          }
                          ?>
          
                        </select>
		            </div>
				</div>
				<div class="col-lg-4"> 
	 <div class="col-md-12"  > 
 	    <div class="row">
		  <div class="col-md-6">
				<div class="form-group input-group"> 
	                <label>From::</label> 
	                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="date_pickerfrom" id="date_pickerfrom"  
                           value="<?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :'';?>"
                            readonly="true" class="date_pickerfrom input-sm form-control">

	            </div>
				</div>
					<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>To::</label> 
		                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="date_pickerto" id="date_pickerto" 
                           value="<?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : '';?>" 
                            readonly="true" class="date_pickerto form-control  input-sm">
		               

		            </div>
				</div>
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
							List of Ordered Products</h1>
		<div>Inclusive Dates: From : <?php echo isset($_POST['date_pickerfrom']) ? date_format(date_create($_POST['date_pickerfrom']),'M/d/Y h:i:s') :'';?> - To : <?php echo isset($_POST['date_pickerto']) ? date_format(date_create($_POST['date_pickerto']),'M/d/Y h:i:s') : '';?> </div>
	</div>
		 
<form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
			<tr bgcolor="skyblue" style="font-weight: bold;"> 
				<td >Date Ordered</td>  
				<!-- <td >Customer</td> -->
				<td >Product</td>
				<td >Original Price</td>
				<td >Price</td>
				<td >Quantity</td> 
				<td >Sub-total</td>
			</tr>

		</thead>
		<tbody>		
<?php
	$totAmount = 0;
	$Capital = 0;
	$totQty =0;
	$markupPrice = 0;
if(isset($_POST['submit'])){
 // 	$_SESSION['date_pickerfrom']=$_POST['date_pickerfrom'];
	// $_SESSION['date_pickerto']=$_POST['date_pickerto'];	

 // echo date_format(date_create($_POST['date_pickerfrom']),'Y-m-d');
// echo $_POST['txtSearch'];
// $query = "SELECT  *  FROM  `tblcustomer` c,  `tblsummary` s WHERE  c.`CUSTOMERID` = s.`CUSTOMERID` AND  ORDEREDSTATS='Confirmed' AND date(ORDEREDDATE)>='". date_format(date_create($_POST['date_pickerfrom']), "Y-m-d")."' AND date(ORDEREDDATE) <='". date_format(date_create($_POST['date_pickerto']), "Y-m-d")."'";
// $query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 
// WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
// AND CONCAT(`PRODESC`, ' ' ,O.`ORDEREDNUM`, ' ' ,`FNAME`,' ', `LNAME`, ' ',`MNAME`) LIKE '%{$_POST['txtSearch']}%' AND DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
// AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' GROUP BY `PRODESC`
// ";
$sid = $_POST['shop'];
$query="SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C
WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND S.`CUSTOMERID`=C.`CUSTOMERID`  
AND  DATE(ORDEREDDATE) >= '". date_format(date_create($_POST['date_pickerfrom']),'Y-m-d')."' 
AND DATE(ORDEREDDATE) <= '". date_format(date_create($_POST['date_pickerto']),'Y-m-d')."' AND P.`shop_id` = '$sid'  GROUP BY `PRODESC`
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
				  				$AMOUNT = $result->PROPRICE * $result->QTY ;
								$CAP = $result->ORIGINALPRICE * $result->QTY ;
							echo '<tr>
									<td>'.date_format(date_create($result->ORDEREDDATE),'M/d/Y h:i:s').'</td>   
									<td>'.$result->PRODNAME.'</td>
									<td>'.$result->ORIGINALPRICE.'</td>
									<td>'.$result->PROPRICE.'</td>
									<td>'.$result->QTY .'</td>
									<td style = "text-align: right">&#8369 '.number_format($AMOUNT,2).'</td>  
								 </tr>';
			
			$Capital += $result->ORIGINALPRICE;	
			$markupPrice += $result->PROPRICE;
			$totQty +=$result->QTY;				 
 			$totAmount += $AMOUNT;
			error_reporting (E_ALL ^ E_NOTICE);
			$ttlcap += $CAP;
			$ttlsales = $totAmount - $ttlcap;
								} }else{
									echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';
								}
 
	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 
 
?>
</tbody>
<tfoot>
	<tr bgcolor="#FFFFE0" style="font-weight: bold;">
		<td colspan="5">Total Sales</td>
		<td style = "text-align: right">&#8369 <?php echo number_format($totAmount,2); ?></td>
		
	</tr>
	
	</br>
	<tr bgcolor="#FFA07A" style="font-weight: bold;">
		<td colspan="5">Total Capital</td>
		<td style = "text-align: right">&#8369 <?php 
		
			error_reporting (E_ALL ^ E_NOTICE);
			echo number_format($ttlcap,2); ?></td>
		
	</tr>	
	</br>
	<tr bgcolor="#7FFF00" style="font-weight: bold;">
		<td colspan="5">Total Revenue</td>
		<td style = "text-align: right">&#8369 <?php 
			error_reporting (E_ALL ^ E_NOTICE);
			echo number_format($ttlsales,2); ?></td>
		
	</tr>
</tfoot>
</table>
 </form>
	</div>
	</span>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="tablePrint();" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
   
<script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:Calibri(body);  font-size:8px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});	

		
</script>