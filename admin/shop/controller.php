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

	}

   
function doInsert(){
	if(isset($_POST['save'])){
		
	 

			$errofile = $_FILES['image']['error'];
			$type = $_FILES['image']['type'];
			$temp = $_FILES['image']['tmp_name'];
			$myfile =$_FILES['image']['name'];
		 	$location="uploaded_photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				@$image_name= addslashes($_FILES['image']['name']); 
				@$image_size= getimagesize($_FILES['image']['tmp_name']);

			if ($image_size==FALSE || $type=='video/wmv') {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=add");
			}else{
					//uploading the file
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	
					if ($_POST['name'] == "") {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}else{	
						
						// Create an instance of the auto-number generator
$autonumber = new AutoNumber();
$res = $autonumber->set_autonumber('shop_id');

$shop = new Shop();
$shop->shop_id = $res;



			$shop->shop_name 		= $_POST['name'];

			$shop->shop_img 		= $location;
			$shop->shop_id			= $res->AUTO;
			$shop->shop_status 		= 'active'; 
			
			$shop->street			=  $_POST['sstreet'];

			$shop->brgy			=  $_POST['sbarangay'];

			$shop->municipality			=  $_POST['smunicipality'];

			$shop->province			=  $_POST['sprovince'];

			$shop->mobile			= $_POST['scontact_no'];


			$shop->create();


$user = New ownerlog();

			// $user->USERID 		= $_POST['user_id'];

			$user->name 		= $_POST['U_NAME'];

			$user->username		= $_POST['U_USERNAME'];

			$user->pass			=$_POST['U_PASS'];

			$user->street			=  $_POST['street'];

			$user->brgy			=  $_POST['barangay'];

			$user->municipality			=  $_POST['municipality'];

			$user->province			=  $_POST['province'];

			$user->email			=  $_POST['email'];

			$user->contact_no			= $_POST['contact_no'];

			$user->shop_id			=  $res->AUTO;
			
			$user->status			=  'active';

			

			$user->create();
			

			message("New Shop ". $_POST['name'] ." created successfully!", "success");

			redirect("index.php");
						}
							
					}
			}
			 
		  }


	  }
 
 

	function doEdit(){

global $mydb; 

		if ($_GET['actions']=='deac') {		

				$status	= 'inactive';	
echo '<script>alert("Shop '.($_GET['name']).' deactivated")</script>';
		}elseif ($_GET['actions']=='active') {		

				$status	= 'active';	
echo '<script>alert("Shop '.($_GET['name']).' activated")</script>';
		}

			$user = New shop(); 


			$user->shop_status = $status;

			

			$user->update($_GET['id']);



			redirect("index.php");


	}

		 function doDelete(){
	

				$id = 	$_GET['id'];



				$user = New shop();

	 		 	$user->delete($id);

			 

			message("User already Deleted!","info");

			redirect('index.php');




		

	}



	
	
?>