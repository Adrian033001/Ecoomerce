<?php
	 if (!isset($_SESSION['ouid'])){
      redirect(web_root."owner/index.php");
     }

?>

<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Owners  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a>  </h1>
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
				  		
				  		 $sid = $_SESSION['shop_id'];
				  		$mydb->setQuery("SELECT * FROM  `owner` s , `shop` sp 
						WHERE sp. `shop_id` = s.`shop_id` AND s. `shop_id` = '$sid'");;
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->name.'</a></td>';
				  		echo '<td>'. $result->username.'</td>';
				  		echo '<td>'. $result->shop_name.'</td>';
				  		if($result->status=='active'){				  				echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>Active</a>								<a href="controller.php?action=editstat&id='.$result->owner_id.'&name='.$result->name.'&actions=deac" class="btn btn-danger btn-xs">Deactivate</a>				  				</td>';			  	 		}elseif($result->status=='inactive'){				  	 			echo '<td><a href="#"  class="btn btn-danger btn-xs" disabled>Inactive</a>								<a href="controller.php?action=editstat&id='.$result->owner_id.'&name='.$result->name.'&actions=active" class="btn btn-danger btn-xs">Activate</a>								</td>';			  	 		}
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->