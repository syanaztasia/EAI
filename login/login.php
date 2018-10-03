<!DOCTYPE html>
<html lang="en">
<?php
		
		session_start();
		require_once __DIR__.'/vendor/autoload.php';
		require ("Facebook/autoload.php");
		if(isset($_GET['state'])) {
		    $_SESSION['FBRLH_state'] = $_GET['state'];
		}
?>
<head>
	<title>Login Cabskuy</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
			<script>
			<?php
			  /*Step 1: Enter Credentials*/
				$fb = new \Facebook\Facebook([
				    'app_id' => '461997810874969',
				    'app_secret' => '1a96dcfcf4726e2a5192d11bfd69a151',
				    'default_graph_version' => 'v3.1',
				    //'default_access_token' => 'EAAGOwhb1RJkBAF9MvQJWYYHFLIFE1ZCcKhQ8nsUebDZBsRhnJyJEHF9CNQY6zkwbaBsuGNWUlzIbaZC1ivW71ZCGVRTouDtmuvYuYygrAosTFb0idJh07tLEuEegF87wHotCB6iZAgXliTDTbA4HzCYOuqWBAfYkdCHVhZBp9444oKlY31ZAHxi6Ti1n2dyoSpC6NMrfvZAdIAZDZD', // optional
				]);
				?>
				
			</script>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>
					<div class="login100-form-social flex-c-m">
					<?php
 					 echo "<a href='auth.php'>Login with google</a>";
					
					?>
					</div>
					<?php
					if(empty($access_token)) {

					?>	
					<div class="login100-form-social flex-c-m">
					<?php
						 echo "<a href='{$fb->getRedirectLoginHelper()->getLoginUrl("https://localhost/eai1/login/logedfb.php")}'>Login with Facebook </a>"; 

						}
						




						 ?>
							
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../images/bgcabs.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>