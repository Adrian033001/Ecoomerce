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
            <h1 class="page-header">Add Products to Damaged Items</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

				<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">Damaged Item Batch Name:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="res_id" id="res_id">
                          <option value="None">Damaged Item Batch Name</option>
                          <?php
                            $sid = $_SESSION['shop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrdamaged` d
						  WHERE d.`shop_id` = '$sid'");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->dam_id.' >'.$result->dname.'</option>';
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
                       <select class="form-control input-sm" name="PROID" id="PROID">
                          <option value="">Select Product</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblproduct`");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->PROID.' >'.$result->PRODNAME.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROQTY">Quantity:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PROQTY" name="PROQTY" placeholder=
                            "Quantity" type="number" value="">
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
      

       