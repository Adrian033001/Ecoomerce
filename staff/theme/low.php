  <div class="left-sidebar">
            </br><p><?php echo '&nbsp&nbsp&nbsp';?>Low Stocks</p>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
 
                 <?php 
			error_reporting (E_ALL ^ E_NOTICE);
			  $sid = $_SESSION['sshop_id'];
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c 
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` AND  p.`shop_id` = '$sid'";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
						 if($result->PROQTY < 25){
                      echo ' 
                              <p >&nbsp&nbsp&nbsp'.$result->PRODNAME.'&nbsp QTY:'.$result->PROQTY.'</p>
                            ';
					 }}
                  ?>
              
            </div><!--/category-products-->
 
          
          </div>

 