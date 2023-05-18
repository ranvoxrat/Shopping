<?php
require_once("../include/initialize.php");

?>
<?php
// login confirmation
if (isset($_SESSION['USERID'])) {
	// redirect(web_root."admin/index.php");
	header("Location:admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	
</head>
<body>
<!-- <div class="container">
		<div class="cover">
			<div class="front">
				<img src="images/LogoWeb.png" alt="">
				<div class="text">
					<img src="images/LogoWeb.png" alt="">
				</div>
			</div>
		</div>
		<div class="forms">
			<div class="form-content">
				<div class="login-form">
					<div class="title">Login <i class="fa-brands fa-codepen"></i></div>
					<form method="post" action="" >
						<div class="input-boxes">
							<div class="input-box">
			
								<div class="input-box">
								<i class="fa-solid fa-envelope"></i>
								<input type="text" placeholder="Enter your username" name="Username" id="Username"
									required autocomplete="off">
							</div>
							<div class="input-box">
								<i class="fa-solid fa-lock"></i>
								<input type="password" placeholder="Enter your password" name="Password" id="Password"
									required autocomplete="off">
							</div>
							<div class="button input-box fa-solid">
								<input type="submit" id="login" name="login" value="Login">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->
<div class="limiter" >
		<div class="container-login100" >

			<div class="wrap-login100">
				<form method="post" action=""  class="login100-form validate-form" >
					<div class="login100-form-avatar">
						<img src="images/LogoWeb.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Login Admin
					</span>

					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text"  name="user_email"  placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="user_pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button  type="submit" name="btnLogin"  class="login100-form-btn">
							Login
						</button>
					</div>
 
				</form>
			</div>
		</div>
	</div>
	 
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php

if (isset($_POST['btnLogin'])) {
	$email = trim($_POST['user_email']);
	$upass = trim($_POST['user_pass']);
	$h_upass = sha1($upass);

	if ($email == '' or $upass == '') {

		message("Invalid Username and Password!", "error");
		header("Location:login.php");

	} else {
		//it creates a new objects of member
		$user = new User();
		//make use of the static function, and we passed to parameters
		$res = $user::userAuthentication($email, $h_upass);
		if ($res == true) {
			message("You logon as " . $_SESSION['U_ROLE'] . ".", "success");
			if ($_SESSION['U_ROLE'] == 'Administrator') {
				header("Location:admin/index.php");

			} else {
				header("Location:admin/login.php");
			}
		} else {
			message("Account does not exist! Please contact Administrator.", "error");
			// header("Location:admin/login.php");
		}
	}
}
?>