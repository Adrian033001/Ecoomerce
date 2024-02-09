<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Shops  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a></h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th width="50">Image</th>
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th>Shop Name</th> 
				  		<th>Owner/Staff</th>				  		<th>Address</th>
				  		<th>Action</th>


				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM shop p 
           					   ORDER BY p.`shop_name`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				    echo '<td style="padding:0px;">
							
							<img  title="'.$result->shop_id.'" style="width:100px;height:100px;padding:0;"  src="'. web_root.'admin/shop/'.$result->shop_img . '">
							</td>';	
				  		
				  		echo '<td>'. $result->shop_name.'</td>'; 
				  		//echo '<td>'. $result->name.'</td>';
						$sid = $result->shop_id;
						?>
						<td><?php
						echo 'Owner/s ===>&nbsp&nbsp';
						$query = "SELECT * FROM `owner` pr 
           					 WHERE pr.`shop_id` = '$sid' ORDER BY pr.`name`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						echo ''.$result->name.'&nbsp&nbsp&nbsp&nbsp&nbsp';
						}
							?>
							<?php
						echo '</br>';
						echo '</br>';
						echo 'Staff/s ===>&nbsp&nbsp';
						$query = "SELECT * FROM `staff` pr 
           					 WHERE pr.`shop_id` = '$sid' ORDER BY pr.`name`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						echo ''.$result->name.'&nbsp&nbsp&nbsp&nbsp&nbsp';
						}
							?></td>							<td><?php											$query = "SELECT * FROM `shop` ss            					 WHERE ss.`shop_id` = '$sid' ORDER BY ss.`shop_name`";				  		$mydb->setQuery($query);				  		$cur = $mydb->loadResultList();						foreach ($cur as $result) { 						echo ''. $result->street.'&nbsp  '. $result->brgy.' </br>  '. $result->municipality.'&nbsp '. $result->province.'</br> '. $result->mobile .'';						}							?><?php							#echo '<td> '. $result->street.'&nbsp  '. $result->brgy.' </br>  '. $result->municipality.'&nbsp '. $result->province.'</br> '. $result->mobile .'</td>'; 
				  	 	$query = "SELECT * FROM `shop` s            					 WHERE s.`shop_id` = '$sid' ORDER BY s.`shop_name`";				  		$mydb->setQuery($query);				  		$cur = $mydb->loadResultList();						foreach ($cur as $result) { 						if($result->shop_status=='active'){				  				echo '<td> <a href="#"  class="btn btn-success btn-xs" disabled>Active</a>								<a href="controller.php?action=edit&id='.$result->shop_id.'&name='.$result->shop_name.'&actions=deac" class="btn btn-danger btn-xs">Deactivate</a>				  				</td>';			  	 		}elseif($result->shop_status=='inactive'){				  	 			echo '<td><a href="#"  class="btn btn-danger btn-xs" disabled>Inactive</a>								<a href="controller.php?action=edit&id='.$result->shop_id.'&name='.$result->shop_name.'&actions=active" class="btn btn-danger btn-xs">Activate</a>								</td>';			  	 		}						}
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				
				</div>
				</form>
 
 <div class="modal fade" id="productmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">ï¿½</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/products/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">

                                                            <input class="proid" type="hidden" name="proid" id="proid" value="">
                                                              <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                