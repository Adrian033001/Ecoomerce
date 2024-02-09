<?php
   if (!isset($_SESSION['suid'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add Product to Damaged Replenishment</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
<div class="form-group">                    <div class="col-md-8">                      <label class="col-md-4 control-label" for=                      "CATEGORY">Replenishment:</label>                      <div class="col-md-8">                       <select class="form-control input-sm" name="res_id" id="res_id">                          <?php								$res = $_POST['res_id'];                          $mydb->setQuery("SELECT * FROM `tblrestock` r, `tblrsummary` rs						  WHERE  r.`res_id` = rs.`res_id` AND rs.`res_id` = '$res' GROUP BY rs.`res_id`");                          $cur = $mydb->loadResultList();                        foreach ($cur as $result) {                          echo  '<option value="'.$result->res_id.'" >Replenishment name:&nbsp'.$result->rname.' &nbsp Date: '.date_format(date_create($result->d_date),'M/d/Y h:i:s').'</option>';                          }							                          ?>                                  </select>                       </div>                    </div>                  </div>
				<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">Damaged Item Batch Name:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="dam_id" id="dam_id">
                          <option value="None">Damaged Item Batch Name</option>
                          <?php
                            $sid = $_SESSION['sshop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrdamaged` d
						  WHERE d.`shop_id` = '$sid' ORDER BY d.`d_date` DESC");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->dam_id.' >'.$result->dname.' &nbsp Date: '.date_format(date_create($result->d_date),'M/d/Y h:i:s').'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>				  				  
				  
				  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Product:</label>

                      <div class="col-md-8">
                       
                          
                          <?php						  						  echo '<select class="form-control input-sm" name="restock_id" id="restock_id">';
                            if(isset($_POST['save'])){
								$res = $_POST['res_id'];
                          $mydb->setQuery("SELECT * FROM `tblrestock` r , `tblproduct` p  
						  WHERE  p.`PROID`=r.`PROID` AND r.`res_id` = '$res'");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value="'.$result->restock_id.'" >Product name:&nbsp'.$result->PRODNAME.'&nbsp&nbsp&nbsp&nbsp&nbsp Quantity:&nbsp'.$result->qty.'</option>';
                          }
                          ?>			
          				
                        </select> 												<?php													}						?>
                      </div>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROQTY">Quantity:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="qty" name="qty" placeholder=
                            "Quantity" type="number" min="1" value="">
                      </div>
                    </div>
                  </div>
				  
				  
                  
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

       