<?php 
	 if (!isset($_SESSION['suid'])){
     } 
?>

<div class="row" style="margin:0;text-align:center;"><form  action="index.php" method="post">  	 <div class="col-lg-6"></div>   <div class="col-lg-4"> 	 <div class="col-md-12"  >  	    <div class="row">		  <div class="col-md-6">				<div class="form-group input-group"> 	                <label>From::</label> 	                <input type="date"                        name="date_pickerfrom" id="date_pickerfrom"min="1900-01-01" ></div>				</div><div class="col-md-6">    <div class="form-group input-group">         <label>To::</label> </br>        <input type="date" name="date_pickerto" id="date_pickerto"               min="1900-01-01" max="<?php echo date('Y-m-d') ; ?> value="<?php echo date('y-m-d'); ?>"">           </div></div>	    </div> 	 </div>   </div>   <div class="col-lg-2">   	    <div class="row">		  <div class="col-md-12">			 <div class="form-group input-group" style="margin-top:25px;">                  <button class="btn btn-primary btn-sm" name="submit" type="submit" >Search <i class="fa fa-search"></i>                </button>             </div>		   </div>  	    </div> 	 </div>   </div></form>
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
				<td>Replenishment Name</td>				<td>Replenishment Date</td>
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
							
								 echo '<td width="20%"><h3>'. $result->rname.'</h3></td>';								 echo '<td width="20%"><h3>'.date_format(date_create( $result->res_date),'M/d/Y').'</h3></td>';
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
	</span><script>date_pickerto.max = new Date().toISOString().split("T")[0];</script>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"> 	
			<button onclick="window.print();return false;" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
 		</div>
	  </div>
	</div>
</div>
   
