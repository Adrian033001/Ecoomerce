<?php
require_once("../../include/initialize.php");
	if(!isset($_SESSION['suid'])){
}
 // if (!isset($_SESSION['justadmin_ID'])){
 // 	redirect(WEB_ROOT ."admin/login.php");
 // }
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title ='Report';
switch ($view) {
	case 'list' :

		$content    = 'dash.php';		
		break;
	 case 'sales' :
	 $title ='Sales';
	 	$content    = 'sales.php';		
	 	break;	
			
	default :
		$content    = 'dash.php';		
}
  // include '../modal.php';
require_once '../theme/templates.php';
?>


  
