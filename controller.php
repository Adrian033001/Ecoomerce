<?php
require_once ("include/initialize.php");

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'cancel' :	doEditst();	break;

	}
	function doEditst(){		global $mydb; 		 $delivered = "";		if ($_GET['heyo']=='cancel'){			// $order = New Order();				$status	= 'Cancelled';				$remarks ='The customer CANCELLED the order.';$summary = New Summary();			$summary->ORDEREDSTATS       = $status;			$summary->ORDEREDREMARKS     = $remarks;			$summary->CLAIMEDADTE 		 = $delivered;			$summary->HVIEW 			 = 0;			$summary->update($_GET['id']);						message("Order ".$summary->ORDEREDSTATS."!", "success");			redirect("index.php?q=profile");		}else{			message("Error!");		}	}
   
?>