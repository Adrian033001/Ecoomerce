<?php 
	 if (!isset($_SESSION['suid'])){
      redirect(web_root."staff/index.php");
     } 
?>

<!-- <div class="row">
<form  action="index.php" method="post">  
	<div class="col-lg-3 col-lg-offset-3">
	 <div class="panel panel-default">
	 <div class="panel-heading" >Search</div>
	 <div class="col-md-12"  ><br/>
 		<div class="row" style="line-height:4px;">
			<div class="col-md-12">
		          <label>Product::</label>
			      <div class="form-group">
		                <input type="text" class="form-control input-sm" placeholder="Search for...."> 
		            </div>
				</div>
				<div class="col-md-12">
		          <label>Payment Method::</label>
			      <div class="form-group">  
		                <select class="form-control  input-sm">
		                    <option>Cash on Pick Up</option>
		                    <option>Cash on Delivery</option>
		                    <option>All</option> 
		                </select>
		            </div> 
				</div>
				<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>From::</label> 
		                <input type="text"  name="date_pickerfrom" id="date_pickerfrom"  value="<?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] :date_create('m/d/Y');?>" readonly="true" class=" input-sm datetimepicker  form-control">
		                <span class="input-group-btn">
		                    <i class="fa  fa-calendar" ></i> 
		                </span>
		            </div>
				</div>
					<div class="col-md-6">
					<div class="form-group input-group"> 
		                <label>To::</label> 
		                <input type="text"  name="date_pickerto" id="date_pickerto" value="<?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : date_create('m/d/Y');?>"  readonly="true" class="datetimepicker   form-control  input-sm">
		                <span class="input-group-btn">
		                    <i class="fa  fa-calendar" ></i> 
		                </span>
		            </div>
				</div>
				<div class="col-md-12 pull-right">
			      <div class="form-group input-group"> 
		                <span class="input-group-btn">
		                    <button class="btn btn-primary" name="submit" type="submit" >Search <i class="fa fa-search"></i>
		                    </button>
		                </span>
		            </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
   
	</form>
</div>  -->

 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      

                    <!--     <li>
                            <a href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> -->
                      
                        <li>
                             <a href="<?php echo web_root; ?>staff/inventory/damaged/index.php"> Damaged Items </a>
           
                        </li>
						<li>
                            <a href="<?php echo web_root; ?>staff/inventory/replenishment/index.php" > Replenishments </a>
                          
                        </li>
                        <li>
                             <a href="<?php echo web_root; ?>staff/inventory/stocks/index.php" > Stocks Available </a>
                  </li>
                           
                         <li>
                             <a href="<?php echo web_root; ?>staff/inventory/low/index.php" > Low Stocks </a>
            
                        </li>

                        
						
                   
 
 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
</div>





	


