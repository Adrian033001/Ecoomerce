<?php
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>

<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Shop Personell  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>#</th> -->
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Account Name</th>
				  		<th>Username</th>
						<th>Shop</th>
						<th>Action</th>
				  		
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * FROM  `staff` s , `shop` sp 
						WHERE s. `shop_id` = sp.`shop_id` ORDER BY sp.`shop_name` ASC");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->name.'</a></td>';
				  		echo '<td>'. $result->username.'</td>';
						echo '<td>'. $result->shop_name.'</td>';
				  		
				  		if($result->status=='active'){				  				echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>Active</a>								<a href="controller.php?action=edit&id='.$result->staff_id.'&name='.$result->name.'&actions=deac" class="btn btn-danger btn-xs">Deactivate</a>				  				</td>';			  	 		}elseif($result->status=='inactive'){				  	 			echo '<td><a href="#"  class="btn btn-danger btn-xs" disabled>Inactive</a>								<a href="controller.php?action=edit&id='.$result->staff_id.'&name='.$result->name.'&actions=active" class="btn btn-danger btn-xs">Activate</a>								</td>';			  	 		}
				  	} 
				  	?>
				  </tbody>
					
				</table>
 

			</div>
				</form>
	

</div> <!---End of container-->