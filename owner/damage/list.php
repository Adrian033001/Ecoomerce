<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"> Damaged Items <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New Damaged Batch </a></h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
<div>
			    <form action="details/index.php?view=add" method="POST" >  	
					<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Add Damaged Item from Replenishment:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="res_id" id="res_id">
                          
                          <?php
                            $sid = $_SESSION['shop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrsummary` d
						  WHERE d.`shop_id` = '$sid'");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->res_id.' >'.$result->rname.'</option>';
                          }
                          ?>
          
                        </select> </br>
                      </div>
                    </div>
                  </div>
				  
				  
					<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" > Add Damaged Item </button>
                      </div></br></br></br></br></br><h4>Select Damage Batch </h4>
                    </div>
                  </div>
				  
				<!--<div class="btn-group">
				  <button type="submit" class="btn btn-default" name="restock">Restock Selected</button>
				</div>
				</div> -->
				</form>
</div>

			    <form action="details/index.php" method="POST" >  	
<div>
				  
				<table class="table table-bordered table-hover" align="center" cellspacing="10px">
				
		<thead>
				  	<tr bgcolor="skyblue" style="font-weight: bold;">
				  		<th>Restock Date</th>
						<th>Restock Batch Name</th>
						<th>Action</th>
				  		
				  		 
				  	</tr>	

				  </thead> 	

			  <tbody>
				  	<?php 
					$sid = $_SESSION['shop_id'];
				  		 $sid = $_SESSION['shop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrdamaged` d
						  WHERE d.`shop_id` = '$sid'");
                          $cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						
				  		echo '<tr>';
							echo '<td>'.date_format(date_create($result->d_date),'M/d/Y h:i:s').'</td>';
						  echo '<td><label for="res_id">'.$result->dname.'</label><br></td>';
							echo '<td><button class="btn  btn-primary btn-sm" name="dam_id" value="'.$result->dam_id.'" type="submit" > View </button></td>';
							echo '</tr>';
						  } 	
				  	?>
				  </tbody>
					
				 	
				</table>
				
				
				</form>
</div>
				        	<!--View List -->
							

 
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

                