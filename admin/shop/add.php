<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Shop</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "name">Shop Name:</label>

                      <div class="col-md-8"><input name="deptid" type="hidden" value="">
                            <input class="form-control input-sm" id="name" name="name" placeholder=
                            "Shop Name" type="text" value="" required>
                      </div>
                    </div>
                  </div>  

  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "image">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="image" value="" required id="image" >
                      </div>
                    </div>
                  </div>
				  
				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "street">Street:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="street" name="sstreet" placeholder=

                            "Street" type="text" value="" required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "barangay">Barangay:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="sbarangay" name="sbarangay" placeholder=

                            "Barangay" type="text" value="" required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "municipality">Municipality:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="smunicipality" name="smunicipality" placeholder=

                            "Municipality" type="text" value=""required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "province">Province:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="sprovince" name="sprovince" placeholder=

                            "Province" type="text" value=""required>

                      </div>

                    </div>

                  </div>
				  
				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "contact_no">Mobile number:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="scontact_no" name="scontact_no" placeholder=

                            "Mobile Number" type="number" min="09000000001" max="09999999999"value=""required>

                      </div>

                    </div>

                  </div>
				  
				  <div class="row">

         <div class="col-lg-12">

            <h1 class="page-header">Add New Shop Owner</h1>

          </div>

          <!-- /.col-lg-12 -->

       </div> 

                   

                    <!-- <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "user_id">User Id:</label>



                      <div class="col-md-8"> --> 

                        <!--  <input class="form-control input-sm" id="user_id" name="user_id" placeholder=

                            "Account Id" type="hidden" value="<?php echo $res->AUTO; ?>"> -->

                    <!--   </div>

                    </div>

                  </div> -->           

                   <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "U_NAME">Name:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder=

                            "Account Name" type="text" value="" required>

                      </div>

                    </div>

                  </div>



                  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "U_USERNAME">Username:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=

                            "Username" type="text" value=""required>

                      </div>

                    </div>

                  </div>



                  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "U_PASS">Password:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder=

                            "Account Password" type="text" value="" required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "street">Street:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="street" name="street" placeholder=

                            "Street" type="text" value="" required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "barangay">Barangay:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="barangay" name="barangay" placeholder=

                            "Barangay" type="text" value="" required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "municipality">Municipality:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="municipality" name="municipality" placeholder=

                            "Municipality" type="text" value=""required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "province">Province:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="province" name="province" placeholder=

                            "Province" type="text" value=""required>

                      </div>

                    </div>

                  </div>

				  

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "email">Email:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="email" name="email" placeholder=

                            "Email" type="email" value="" required>

                      </div>

                    </div>

                  </div>

				  <div class="form-group">

                    <div class="col-md-8">

                      <label class="col-md-4 control-label" for=

                      "contact_no">Mobile number:</label>



                      <div class="col-md-8">

                        <input name="deptid" type="hidden" value="">

                         <input class="form-control input-sm" id="contact_no" name="contact_no" placeholder=

                            "Mobile Number" type="number" min="09000000001" max="09999999999"value=""required>

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
      

       