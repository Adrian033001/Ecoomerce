<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"> Delivery </h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="details/index.php" method="POST" >  	

				  		<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
				  	<tr bgcolor="skyblue" style="font-weight: bold;">
				  		<th>Delivery Date</th>
						<th>Delivery Batch Name</th>
						<th>Action</th>
						<th>Status</th>
				  		
				  		 
				  	</tr>	

				  </thead> 	

			  <tbody>
				  	<?php 
					$sid = $_SESSION['shop_id'];
				  		 $sid = $_SESSION['shop_id'];
                          $mydb->setQuery("SELECT * FROM `tbldsummary` d, `tbldelivery` dl
						  WHERE dl.`batchid` = d.`batchid` AND d.`shop_id` = '$sid' GROUP BY d.`batchid` ORDER BY d.`del_date` ASC");
                          $cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						
				  		echo '<tr>';
				  		
				  		
							echo '<td>'.date_format(date_create($result->del_date),'M/d/Y h:i:s').'</td>';
						  echo '<td><label for="res_id">'.$result->delivery_name.'</label><br></td>';
							echo '<td><button class="btn  btn-primary btn-sm" name="res_id" value="'.$result->batchid.'" type="submit" > View </button></td>';
							if($result->dstat=='Pending'){
				  				echo '<td width="10%"><a href="controller.php?action=remit&id='.$result->batchid.'&actions=recieved" class="btn btn-danger btn-xs">Recieve Remittance?!</a>
				  				</td>';
			  	 		}elseif($result->dstat=='Remitted'){
				  	 			echo '<td width="10%">
								<a href="#"  class="btn btn-success btn-xs" disabled>Remitted</a></td>';
				  	 		 
			  	 		}
							echo '</tr>';
						  } 	
				  	?>
				  </tbody>
					
				 	
				</table>
				 
				<!--<div class="btn-group">
				  <button type="submit" class="btn btn-default" name="restock">Restock Selected</button>
				</div>
				</div> -->
				</form>
 
 <div class="modal fade" id="productmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

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

                