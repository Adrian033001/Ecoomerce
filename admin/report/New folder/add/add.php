<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 
 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">Batch :</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="delivery_id" id="delivery_id">
                          <option value="None">Select batch</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tbldelivery`");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->delivery_id.' >'.$result->batchno.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>
                  
 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">ID:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="summary_id" id="summary_id">
                          <option value="None">Select ID</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblsummary`");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->SUMMARYID.' >'.$result->SUMMARYID.'</option>';
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
      
