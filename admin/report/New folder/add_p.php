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
                      "PROQTY">Batch Number:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="batchno" name="batchno" placeholder=
                            "" type="number" value="">
                      </div>
                       
                    </div>
                  </div>

                  

                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROQTY">Payment Remittance:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="pay_rem" name="pay_rem" placeholder=
                            "" type="number" value="">
                      </div>
                       
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "rname">Status:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="status" name="status" placeholder=
                            "" type="text" value="">
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
      
