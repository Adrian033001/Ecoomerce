<?php
require_once("../../include/initialize.php");
	if(!isset($_SESSION['suid'])){
	redirect(web_root."staff/inventory/dash.php");
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
	// case 'list' :
	// 	$content    = 'list.php';		
	// 	break;	
			
	default :
		$content    = 'dash.php';		
}
  // include '../modal.php';
require_once '../theme/templates.php';
?>


  
