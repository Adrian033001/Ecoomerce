<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"> Restock <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> New Restock Batch </a> 
			<a href="add/index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Restock Products </a></h1>
			
       		</div>
			
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="details/index.php" method="POST" >  	
					<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Replenishment:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="res_id" id="res_id">
                          <option value="">Select Replenishment</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblrsummary`");
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
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" > View </button>
                      </div>
                    </div>
                  </div>
				  
				<!--<div class="btn-group">
				  <button type="submit" class="btn btn-default" name="restock">Restock Selected</button>
				</div>
				</div> -->
				</form>


                