 <?php
 require_once ("include/initialize.php"); 
 if (@$_GET['page'] <= 2 or @$_GET['page'] > 5) {
  # code...
    // unset($_SESSION['PRODUCTID']);
    // // unset($_SESSION['QTY']);
    // // unset($_SESSION['TOTAL']);
} 
if(isset($_POST['sidebarLogin'])){
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $h_upass = sha1($upass);
   if ($email == '' OR $upass == '') {
      message("Invalid Username and Password!", "error");
      header("Location: index.php");
    } else {   
        $cus = new Customer();
        $cusres = $cus::cusAuthentication($email,$h_upass);
        if ($cusres==true){
           header("Location:index.php?q=profile");
        }else{
             message("Invalid Username and Password! Please contact administrator", "error");
             header("Location:index.php");
        }
 }
}
 if(isset($_POST['modalLogin'])){
  $email = trim($_POST['U_USERNAME']);
  $upass  = trim($_POST['U_PASS']);
  $h_upass = sha1($upass);
   if ($email == '' OR $upass == '') { 
      message("Invalid Username and Password!", "error");
       header("Location:index.php?page=6");
         
    } else {   
        $cus = new Customer();
        $cusres = $cus::cusAuthentication($email,$h_upass);

        if ($cusres==true){

           if($_POST['proid']==''){
            header("Location:index.php?q=orderdetails");
           }else{
              $proid = $_POST['proid'];
              $id = mysqli_insert_id($con);
              mysqli_query($con,"INSERT INTO `tblwishlist` (`PROID`, `CUSID`, `WISHDATE`, `WISHSTATS`)  VALUES ('". $proid."','".$_SESSION['CUSID']."','".DATE('Y-m-d')."',0)") or die("Error");
              header("Location:index.php?q=profile");
             } 
        }else{
             message("Invalid Username and Password! Please contact administrator", "error");
             header("Location:index.php");
        }
 
 }
 }
 ?> 
 

 