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

 
	}	function doEdit(){global $mydb; 		if ($_GET['actions']=='deac') {						$status	= 'inactive';	echo '<script>alert("Shop '.($_GET['name']).' deactivated")</script>';		}elseif ($_GET['actions']=='active') {						$status	= 'active';	echo '<script>alert("Shop '.($_GET['name']).' activated")</script>';		}			$user = New shop(); 			$user->shop_status = $status;						$user->update($_GET['id']);			redirect("index.php");	}

function doInsert(){
if(isset($_POST['save'])){
		
	 

		
			$shop = New shop(); 
			$shop->shop_name 		= $_POST['shop_name'];
			$shop->shop_img 		= $location; 			$shop->shop_img 		= 'active'; 
			$shop->create();
			
			message("New [". $_POST['shop_name'] ."] created successfully!", "success");
			redirect("index.php");
						
							
			
	}
}	



function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New User();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$user = New shop();
	 		 	$user->delete($id);
			 
			message("User already Deleted!","info");
			redirect('index.php');
		// }
		// }

		
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
		 	
					 

						$product = New shop();
						$product->IMAGES 			= $location;
						$product->update($_POST['proid']); 

						redirect("../../admin/index.php");
						 
							
					}
			}
			 
		}
		
?>

