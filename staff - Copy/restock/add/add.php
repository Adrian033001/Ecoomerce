<?php
   if (!isset($_SESSION['suid'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 


 <form class="form-horizontal span6" action="controller.php?action=add2" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add Products to Replenishment</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

				<div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Restock">Restock Name:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="res_id" id="res_id" required>
                          
                          <?php if(isset($_POST['res_id'])){
                            $rid = $_POST['res_id'];
							$sid = $_SESSION['sshop_id'];
                          $mydb->setQuery("SELECT * FROM `tblrsummary` d
						  WHERE d.`res_id` = '$rid'");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->res_id.' >'.$result->rname.'</option>';
						}}
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>


<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
		<thead>
				  	<tr bgcolor="skyblue" style="font-weight: bold;">
						<th style="text-align: center;" >Select</th>
						<th style="text-align: center;" >Product Name</th>
						<th style="text-align: center;" >Product Descrition</th>
						<th style="text-align: center;" >Quantity</th>
				  		
				  		 
				  	</tr>	

				  </thead> 	

			  <tbody>
				  	<?php 
					$sid = $_SESSION['sshop_id'];
				  		 $sid = $_SESSION['sshop_id'];
                          $mydb->setQuery("SELECT * FROM `tblproduct` p
						  WHERE p.`shop_id` = '$sid'");
                          $cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
						
				  		echo '<tr>';
				  		echo '<td width="1%" align="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->PROID. '"/></td>';
						  echo '<td style="text-align: center;" >'.$result->PRODNAME.'<br></td>';
						  echo '<td style="text-align: center;" >'.$result->PRODESC.'<br></td>';
						  echo '<td style="text-align: center;" ><div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROQTY">Quantity:</label>';
?>
                      <div class="col-md-8">
                         <input type="number" class="form-control input-sm" id="PROQTY[]" name="PROQTY[]" placeholder="<?= $result->PROQTY ?>" value="" >
                      </div>
                       
                    </div>
                  </div></br></td>
				  <?php
							echo '</tr>';
						  } 	
				  	?>
				  </tbody>
					
				 	
				</table>

                  
            
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
      
<script>
var inputValue = document.getElementById("PROQTY[]").value;
console.log(inputValue);

</script>
       