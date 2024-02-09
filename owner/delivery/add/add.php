<?php
   if (!isset($_SESSION['ouid'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add Orders to Batch</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

				<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">Delivery Batch Name:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="batchid" id="batchid">
                          <option value="None">Select Delivery Batch Name</option>
                          <?php
                            $sid = $_SESSION['shop_id'];
                          $mydb->setQuery("SELECT * FROM `tbldsummary` d
						  WHERE d.`shop_id` = '$sid' AND d.`dstat` = 'Pending' ");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->batchid.' >Delivery Batch Name:&nbsp'.$result->delivery_name.' &nbsp&nbsp&nbsp&nbsp&nbsp Date:'.$result->del_date.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Order:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="SUMMARYID" id="SUMMARYID">
                          <option value="">Select Order</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblsummary` s, `tblorder` ord , `tblproduct` p
						  WHERE s. `ORDEREDSTATS`='Prepaired' AND s.`ORDEREDNUM` = ord.`ORDEREDNUM` and ord.`PROID` = p.`PROID` AND p.`shop_id` = '$sid' GROUP BY ord.`ORDEREDNUM` ORDER BY `ORDEREDDATE` desc ");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->ORDEREDNUM.' > Order Number:&nbsp'.$result->ORDEREDNUM.' &nbsp&nbsp&nbsp&nbsp&nbsp Order Date:&nbsp'.$result->ORDEREDDATE.'</option>';
                          }
                          ?>
          
                        </select> 
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
      

       