<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Sign Up | Ever Successauto</title>
	<meta content="We have used cars available for sale including Toyota Hilux Vigo and other Japanese used cars. Our dealers offer cars in cheap rates." name="description">
	<meta content="" name="keywords">
	<meta name="facebook-domain-verification" content="q416yx61i5c8n2kebsqrw9denthigb" />

	<link href="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/images/favicon.png" rel="icon">
	<link rel="preload" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300&display=swap" as="style">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300&display=swap">
	<link href="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/css/custom-style.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>
	<div class="customer-area">
		<div class="header">
			<img src="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/images/logo-header.png">
		</div>
		<div class="container">
			<div class="form-container">
				<div class="info-container signup-img">
					<img src="https://ever-successauto.com/asia_hilux_back/asiahilux/assets/images/earn-10points.jpg">
				</div>
                <form action="<?php echo base_url() ?>signup" method="POST">
				<!-- <form action="<?= base_url('home/signup'); ?>" method="post"> -->
					<div class="alert alert-danger d-none" id="sys-message-box" role="alert"></div>
					<div class="text-center">
						<h3>Create Account</h3>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" required>
					</div>
					<div class="form-group mb-0">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="at least 8 characters including a number" required>
					</div>
					<div class="form-group form-check text-right mb-0">
						<input type="checkbox" class="form-check-input" id="showpass" onchange="showPassword()">
						<label class="form-check-label" for="showpass">Show Password</label>
					</div>
					<div class="form-group">
						<label for="country">Country</label>
						<select name="country" id="country" class="form-control" required>
							<option value="">Select</option>
							<option value="1">Pakistan</option>
							<option value="2">India</option>
							<option value="3">Afghanistan</option>
							<option value="4">Iran</option>
							<option value="5">Kenya</option>
						</select>
					</div>
					<!-- <button type="button" onclick="checkPassword()" class="btn btn-primary btn-block mt-4">CREATE ACCOUNT</button> -->
					<button type="submit" class="btn btn-primary btn-block mt-4">CREATE ACCOUNT</button>
				</form>
				<div class="content-footer">
					<div class="other-act-nav">
						<p>
							By creating an account, you agree to Ever Successauto
							<br>
							<a href="#" target="_blank">Terms &amp; Conditions</a>
							and
							<a href="#" target="_blank">Privacy Policy</a>
							<br>
							<span id="recaptcha-text">This site is protected by reCAPTCHA and the Google</span>
						</p>
						<p class="opt-in-option">
							<label>
								<input type="checkbox" id="opt_in_check" name="opt_in_check" checked="checked"> Receive news, coupons and special deals
							</label>
						</p>
						<p class="opt-in-login">
							Already have an account?&nbsp;&nbsp;<a class="normal_link" href="#">Login</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<footer id="footer" class="footer">
			<div class="footer-sub-nav">
				<ul>
					<li>
						<a href="#" target="_blank">
							Terms &amp; Conditions
						</a>
					</li>
					<li>
						<a href="#" target="_blank">
							Privacy
						</a>
					</li>
					<li>
						<a href="#" target="_blank">
							Disclaimer
						</a>
					</li>
				</ul>
			</div>

			<div class="copyright">
				© Copyright 2023 Ever Successauto. All Rights Reserved.
			</div>
		</footer>
	</div>
</body>
<script>
	function checkPassword() {
		let password = $('#password').val();
		let email = $('#email').val();
		let country = $('#country').val();
		let eightChar = new RegExp(".{8,}");
		let number = new RegExp("(?=.*?[0-9])");
		let result = 1;
		let cresult = 1;
		let eresult = 1;
		let errorMsg = '';

		let eightCharResult = eightChar.test(password);
		let numberResult = number.test(password);

		if (!email) {
			result = 0;
			eresult = 0;
			errorMsg += "<li>Email should not be empty</li>";
		}
		if (!password) {
			result = 0;
			errorMsg += "<li>Password should not be empty</li>";
		}
		if (!country) {
			result = 0;
			cresult = 0;
			errorMsg += "<li>Country should not be empty</li>";
		}
		if (!eightCharResult) {
			result = 0;
			errorMsg += "<li>Atleast 8 characters required</li>";
		}
		if (!numberResult) {
			result = 0;
			errorMsg += "<li>Atleast 1 Number required</li>";
		}


		// if (!(password === cPassword)) {
		// 	result = 0;
		// 	errorMsg += "<li>Password doesn't match</li>";
		// }

		$('#country').css('border', '1px solid #ced4da');
		$('#email').css('border', '1px solid #ced4da');
		$('#password').css('border', '1px solid #ced4da');
		$('#sys-message-box').addClass('d-none');
		$('#sys-message-box').html('');
		if (result == 0) {
			$('#sys-message-box').removeClass('d-none');
			$('#sys-message-box').html(errorMsg);
			$('#password').css('border', '1.5px solid red');
			if (eresult == 0) {
				$('#email').css('border', '1.5px solid red');
			}
			if (cresult == 0) {
				$('#country').css('border', '1.5px solid red');
			}
			return false;
		} else {
			// $(obj).closest('form').submit();
		}

	}

	function showPassword() {
		let passType = $('#password').attr('type');
		if (passType == 'password') {
			$('#password').attr('type', 'text');
		} else {
			$('#password').attr('type', 'password');
		}
	}
</script>

</html>