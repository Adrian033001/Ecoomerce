<?php
require_once("../../include/initialize.php");
if(!isset($_SESSION['suid'])){
	redirect(web_root."staff/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Users"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'edit.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	default :
		$content    = 'edit.php';		
}
require_once ("../theme/templates.php");
?>
  
