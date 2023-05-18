
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['USERID'])){
         header("Location:admin/index.php");
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
	}
   function alertProducts(){
       //Alert Products if the qty is below to 10%...
       
   }
	function doInsert(){
		if(isset($_POST['save'])){
		if ( $_POST['CATEGORY'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			header('Location:index.php?view=add');
		}else{	
			$category = New Category();
			$category->CATEGORIES	= $_POST['CATEGORY'];
			$category->create();

			message("New [". $_POST['CATEGORY'] ."] created successfully!", "success");
			header("Location:index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$category = New Category();
			$category->CATEGORIES	= $_POST['CATEGORY'];
			$category->update($_POST['CATEGID']);

			message("[". $_POST['CATEGORY'] ."] has been updated!", "success");
			header("Location:index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$category = New Category();
			$category->delete($id);

			message("Category already Deleted!","info");
			header('Location:index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>