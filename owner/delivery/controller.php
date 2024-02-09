<?php
require_once ("../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

	case 'banner' :
	setBanner();
	break;

 case 'discount' :
	setDiscount();
	break;
	
	
	case 'remit' :
	doRemit();
	break;
	}

   
function doInsert(){
	if(isset($_POST['save'])){

						$autonumber = New Autonumber();
						$res = $autonumber->set_autonumber('');

  				 	 	$delsum = New delsum();  
						$delsum->delivery_name 		= $_POST['delivery_name']; 
						$delsum->del_date 		= date('Y-m-d h-i-s');
						$delsum->shop_id 		= $_SESSION['shop_id'];
						$delsum->dstat 		= 'Pending';
						$delsum->create();
				 
						message("New Delivery Batch created successfully!", "success");
						redirect("index.php");
						}
							
					}
					
					function doRemit(){
		global $mydb; 
		 $delivered = "";
		if ($_GET['actions']=='recieved') {
							# code...
				$status	= 'Remitted';	
				$remarks ='Delivery remitted';
				$delivered = Date('Y-m-d');

		}
			
			$order = New delsum();
			$order->dstat       = $status;
			$order->pupdate($_GET['id']);



			// $customer = New customer;
  	// 		$res = $customer->single_customer($_GET['customerid']); 


      

			message(" ".$order->dstat ."!", "success");
			redirect("index.php");
		
	}
 
 
	function doEdit(){
		if (@$_GET['stats']=='NotAvailable'){
			$product = New Product();
			$product->PROSTATS	= 'Available';
			$product->update(@$_GET['id']);

		}elseif(@$_GET['stats']=='Available'){
			$product = New Product();
			$product->PROSTATS	= 'NotAvailable';
			$product->update(@$_GET['id']);
		}else{

		if (isset($_GET['front'])){
			$product = New Product();
			$product->FRONTPAGE	= True;
			$product->update(@$_GET['id']);

		}
	}



		if(isset($_POST['save'])){
 
						$product = New Product();
						// $product->PROMODEL 		= $_POST['PROMODEL']; 
						// $product->PRONAME 		= $_POST['PRONAME']; 
						$product->OWNERNAME 		= $_POST['OWNERNAME']; 
						$product->OWNERPHONE 		= $_POST['OWNERPHONE']; 
						$product->PRODESC 		= $_POST['PRODESC'];
						$product->CATEGID	    = $_POST['CATEGORY'];
						$product->PROQTY		= $_POST['PROQTY'];
						$product->ORIGINALPRICE	= $_POST['ORIGINALPRICE']; 
						$product->PROPRICE		= $_POST['PROPRICE'];  
						$product->update($_POST['PROID']);
  

			message("Product has been updated!", "success");
			redirect("index.php");
	  }
	redirect("index.php"); 
}

	function doDelete(){

 
 

		if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$product = New Product();
			$product->delete($id[$i]);
 

			$stockin = New StockIn();
			$stockin->delete($id[$i]);

			$promo = New Promo();   
			$promo->delete($id[$i]);

			message("Product has been Deleted!","info");
			redirect('index.php');

			}
		}

	}
		 
	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="uploaded_photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_POST['proid']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_POST['proid']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	
					 

						$product = New Product();
						$product->IMAGES 			= $location;
						$product->update($_POST['proid']); 

						redirect("index.php");
						 
							
					}
			}
			 
		}


	function setBanner(){
		$promo = New Promo();
		$promo->PROBANNER  =1;  
		$promo->update($_POST['PROID']);

	}

 	function setDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
	function removeDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
	
	
	
?>