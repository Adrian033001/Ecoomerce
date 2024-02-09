<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['ouid'])){
      redirect(web_root."owner/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Products";	
		$content='owner/index.php';		
		break;	
	default :
	 //    $title="Products";	
		// $content ='products/';		
	redirect("staff/index.php");
}
require_once("theme/templates.php");
?>