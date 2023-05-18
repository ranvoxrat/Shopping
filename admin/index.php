<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
	    header("Location:admin/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Products";	
		$content='products/';		
		break;	
	default :
	 //    $title="Products";	
		// $content ='products/';		
	// redirect("products/");
	header("Location:products/");
}
require_once("theme/templates.php");
?>