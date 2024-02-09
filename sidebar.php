  <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
 
                 <?php 
			error_reporting (E_ALL ^ E_NOTICE);
			  $sid = $_GET['shop'];
                      $mydb->setQuery("SELECT * FROM `tblcategory`");
                      $cur = $mydb->loadResultList();
                     foreach ($cur as $result) {
                      echo ' <div class="categ panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"><a href="index.php?q=product&shop='.$sid.'&category='.$result->CATEGORIES.'" >'.$result->CATEGORIES.'</a></h4>
                            </div>
                          </div>';
                      }
                  ?>
              
            </div><!--/category-products-->
 
          
          </div>

 