<?php
require_once("../../include/initialize.php");
//checkAdmin();
	# code...
if(!isset($_SESSION['ouid'])){
	redirect(web_root."owner/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="Damaged"; 
	switch ($view) {

	case 'list' :
	 
		$content    = 'list.php';		
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
	$title="Damaged";
		$content    = 'list.php';
	}


   
 
require_once ("../theme/templates.php");
?>
  
