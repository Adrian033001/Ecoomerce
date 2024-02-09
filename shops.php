  <div class="left-sidebar">
            <h2>Shops</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
 
                 <?php 
			error_reporting (E_ALL ^ E_NOTICE);
			  $sid = $_GET['shop'];
                      $mydb->setQuery("SELECT * FROM `shop` where `shop_status` = 'active'");
                      $cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
                      echo ' <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"><a href="index.php?q=product&shop='.$result->shop_id.'" >'.$result->shop_name.'</a></h4>
                            </div>
                          </div>';
                      }
                  ?>
              
            </div><!--/category-products-->
 
          
          </div>

 