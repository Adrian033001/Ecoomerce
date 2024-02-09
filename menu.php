
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
         <?php
		 include 'sidebar.php'; 
		 include 'shops.php'; ?>
          </div><!--/category-productsr-->  
        
        <div class="col-sm-9 padding-right">
		  <?php
			error_reporting (E_ALL ^ E_NOTICE);
		  $ssid = $_GET['shop'];
		  //$query = "SELECT * FROM `shop` s WHERE s.`shop_id` = '$sid'";
					$mydb->setQuery("SELECT * FROM `shop` s WHERE s.`shop_id` = '$ssid' and s.`shop_status` = 'active'");
                                            $cur = $mydb->loadResultList();
                                           foreach ($cur as $result) { 	 
				
			error_reporting (E_ALL ^ E_NOTICE);		
            echo '<h2 class="title text-center">'.$result->shop_name.'&nbspProducts</h2>';}?>
              <?php
			  $sid = $_GET['shop'];
             if(isset($_POST['search'])) { 
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c, `shop` s
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0   AND p.`shop_id` = s.`shop_id` and s.`shop_status` = 'active'
                AND ( `CATEGORIES` LIKE '%{$_POST['search']}%' OR `PRODESC` LIKE '%{$_POST['search']}%'OR `PRODNAME` LIKE '%{$_POST['search']}%' or `PROQTY` LIKE '%{$_POST['search']}%' or `PROPRICE` LIKE '%{$_POST['search']}%') ORDER BY pr.`PRODISPRICE` ASC";
              }elseif(isset($_GET['category'])){
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c, `shop` s
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND CATEGORIES='{$_GET['category']}' AND p.`shop_id` = '{$_GET['shop']}' and p.`shop_id` = s.`shop_id`  GROUP BY p.`PROID`";
              }
			  elseif(isset($_GET['shop'])){
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `shop` s
            WHERE pr.`PROID`=p.`PROID`   AND PROQTY>0 AND p.`shop_id` = '{$_GET['shop']}' AND s.`shop_id` = '{$_GET['shop']}' and s.`shop_status` = 'active'";
			
              }else{
                $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
              }

           
            $mydb->setQuery($query);
            $res = $mydb->executeQuery();
            $maxrow = $mydb->num_rows($res);

            if ($maxrow < 1){
				echo '<h1>No Products Available</h1>';
			}
			else{ 
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) { 

              ?>
            <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                      <h3>&#8369 <?php  echo number_format($result->PRODISPRICE,2); ?></h3>
                      <h2><?php  echo    $result->PRODNAME; ?></h2>
                      <p><?php  echo    $result->PRODESC; ?></p>
                      <h5><i class="fa  fa-shopping-bag fa-fw"></i><?php  echo    $result->shop_name; ?></h5>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h3>&#8369 <?php  echo number_format($result->PRODISPRICE,2); ?></h3>
                      <h2><?php  echo    $result->PRODNAME; ?></h2>
                      <p><?php  echo    $result->PRODESC; ?></p>
                      <h5><i class="fa  fa-shopping-bag fa-fw"></i><?php  echo    $result->shop_name; ?></h5>
                        <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                   <li>
                              <?php     
                            if (isset($_SESSION['CUSID'])){  

                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                             }else{
                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                            }  
                            ?>

                    </li> 
                  </ul>
                </div>
              </div>
            </div>
          </form>
       <?php  } 


            }?> 
          </div><!--features_items-->
        </div>
      </div>
    </div>
  </section>
  