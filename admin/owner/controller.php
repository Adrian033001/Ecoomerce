<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

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

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	

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
			$user->shop_id			=  $_POST['shop'];			
			$user->status			=  'active';
			
			$user->create();

						// $autonum = New Autonumber(); 
						// $autonum->auto_update(2);

			message("New [". $_POST['U_NAME'] ."] created successfully!", "success");
			redirect("../owner/index.php");
			
		}
		}

	}

	function doEdit(){
global $mydb; 		if ($_GET['actions']=='deac') {						$status	= 'inactive';	echo '<script>alert("Owner '.($_GET['name']).' Account Deactivated")</script>';		}elseif ($_GET['actions']=='active') {						$status	= 'active';	echo '<script>alert("Owner '.($_GET['name']).' Account Activated")</script>';		}
			$user = New ownerlog(); 
			$user->status = $status;
			
			$user->update($_GET['id']);

			redirect("index.php");
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

				$user = New ownerlog();
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
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
		 	
					 

						$user = New ownerlog();
						$user->USERIMAGE 			= $location;
						$user->update($_SESSION['USERID']);
						redirect("index.php");
						 
							
					}
			}
			 
		}
 
?>