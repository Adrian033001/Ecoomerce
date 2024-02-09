<?phpif (!isset($_SESSION['suid'])){      redirect(web_root."index.php");     }		check_message(); 		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"> Restock <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New Restock Batch </a> </h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
		 <h4>Select Restock </h4>
			    <form action="details/index.php" method="POST" >  	<div class="table-responsive">
					

				
				<table class="table table-bordered table-hover" align="center" cellspacing="10px">
		<thead>
				  	<tr bgcolor="skyblue" style="font-weight: bold;">
				  		<th style="text-align: center;" >Restock Date</th>
						<th style="text-align: center;" >Restock Batch Name</th>
						<th style="text-align: center;" >View</th>
						<th style="text-align: center;" >Add Product</th>
				  		
				  		 
				  	</tr>	

				  </thead> 	

			  <tbody>
				  	<?php 
					$sid = $_SESSION['sshop_id'];
				  		 $sid = $_SESSION['sshop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrsummary` d
						  WHERE d.`shop_id` = '$sid'");
                          $cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						
				  		echo '<tr>';
							echo '<td style="text-align: center;" >'.date_format(date_create($result->res_date),'M/d/Y h:i:s').'</td>';
						  echo '<td style="text-align: center;" ><label for="res_id">'.$result->rname.'</label><br></td>';
							echo '<td style="text-align: center;" ><button class="btn  btn-primary btn-sm" name="res_id" value="'.$result->res_id.'" type="submit" > View </button></form></td>';
							echo '<td style="text-align: center;" >
							<form action="add/index.php?view=add" method="POST">
							<button class="btn  btn-primary btn-sm" name="res_id" value="'.$result->res_id.'" type="submit" > Add products </button></td></form>';
							echo '</tr>';
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

                