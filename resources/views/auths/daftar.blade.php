<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/lib/sweetalert2/css/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/daftar.css') }}">
	<link rel="icon" type="icon" href="{{ asset('/assets/pic/icon.png') }}">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

	<title>Join to Velo</title>
</head>

<body>

	<div class="container container1 register mt-5">

		<div class="row">

			<div class="col-md-3">
				<hr><a class="text-danger text-decoration-none" href="{{ url('/') }}">
					<h1 class="text-center font-weight-bold text-uppercase">velo</h1>
				</a>
				<hr>
				<h3 class="mb-5 text-center">REGISTRATION FORM</h3>
				<p>Create Your Velo Account Now!</p>
				<p class="mt-5">Already Have?</p>
				<a class="btn btn-outline-danger rounded-pill btn1" href="{{ url('/login') }}" role="button"><span class="fa fa-sign-in"></span> LOGIN</a>
			</div>

			<form id="regForm" action="#" autocomplete="off">
				@method('post')
				@csrf
				<!-- One "tab" for each step in the form: -->
				<div class="tab">
					<h1>Your Personal Info</h1>
					<label>First Name</label>
					<p><input required autocomplete="off" type="text" placeholder="First name" oninput="this.className = ''" name="first_name"></p>
					<label>Last Name</label>
					<p><input required autocomplete="off" type="text" placeholder="Last name" oninput="this.className = ''" name="last_name"></p>
					<label>Date of Birth</label>
					<p><input required autocomplete="off" type="Date" placeholder="Date of Birth" oninput="this.className = ''" name="date_of_birth"></p>
					<label>Phone Number</label>
					<p><input required step="off" autocomplete="off" type="number" placeholder="e.g. 628xxxx" oninput="this.className = ''" name="phone_number"></p>
					<label>Profession</label>
					<p><input required autocomplete="off" type="text" placeholder="Profession" oninput="this.className = ''" name="job"></p>
					<div class="custom-control custom-radio custom-control-inline">
						<input required type="radio" class="custom-control-input" id="customRadio" name="gender" value="Male">
						<label class=" custom-control-label" for="customRadio">Male</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input required type="radio" class="custom-control-input" id="customRadio2" name="gender" value="Female">
						<label class="custom-control-label" for="customRadio2">Female</label>
					</div>
				</div>
				<div class="tab">
					<h1>Domicile</h1>
					<label>Country Name</label>
					<p><input required type="text" autocomplete="off" placeholder="Country" oninput="this.className = ''" name="country"></p>
					<label>Currently Live at</label>
					<p><input required type="text" autocomplete="off" placeholder="Province" oninput="this.className = ''" name="currently_live_at"></p>
				</div>
				<div class="tab">
					<h1>Account Setup</h1>
					<label>Email</label>
					<p><input required type="email" autocomplete="off" placeholder="Email" oninput="this.className = ''" name="email"></p>
					<label>Password</label>
					<p><input required type="password" autocomplete="off" placeholder="Password" oninput="this.className = ''" name="password" id="password-field"><span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span></p>
					<label>Confirm Password</label>
					<p><input required type="password" autocomplete="off" placeholder="Confirm Password" oninput="this.className = ''" name="password_confirmation" id="con-password-field"><span toggle="#con-password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password-2"></span></p>
				</div>
				<div style="overflow:auto;" class="mt-4">
					<div style="float:right;">
						<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
						<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
					</div>
				</div>
				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center;margin-top:40px;">
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
				</div>
			</form>




		</div>

	</div>

	<!-- footer -->
	<footer class="page-footer font-small py-3 mt-5">
		<div class="footer-copyright text-center text-white text-md-left ml-3">&copy;2019 Copyright VELO. All Right Reserved |
			<a href="#collapse-aboutus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-aboutus" aria-expanded="false" aria-controls="collapseExample"> About Us</a> |
			<a href="#collapse-contactus" class="fa fa-arrow-right icon-aboutus text-white textfooter1" data-toggle="collapse" data-target="#collapse-contactus" aria-expanded="false" aria-controls="collapseExample"> Contact Us</a>
		</div>
		<div class="collapse" id="collapse-aboutus">
			<div class="card card-body mt-3" style=" color: #dc3545">
				Velo is a PABW project made by Dàkes Project. Know More About Us<span class="fa fa-arrow-right"><a href="/about"> More about Velo</a></span>
			</div>
		</div>
		<div class="collapse" id="collapse-contactus">
			<div class="card card-body mt-3" style=" color: #dc3545">
				Found any Problem? Contact us at
				<span class="fa fa-whatsapp mb-1"> +62 811 2233 4455</span>
				<span class="fa fa-envelope"> Velo@velomail.com</span>
			</div>
		</div>
	</footer>
	<!-- end footer -->

</body>

</html>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="{{ asset('/assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/assets/lib/sweetalert2/js/sweetalert2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
		// This function will display the specified tab of the form
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		//... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").innerHTML = "Submit";
		} else {
			document.getElementById("nextBtn").innerHTML = "Next";
		}
		//... and run a function that will display the correct step indicator:
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form...
		if (currentTab >= x.length) {
			// ... the form gets submitted:
			// document.getElementById("regForm").submit();
			// return false;
			showTab(currentTab - 1); //jangan dihapus
			registerAjax();
			currentTab = currentTab - 1; //jangan dihapus
		} else {
			// Otherwise, display the correct tab:
			showTab(currentTab); // cek disini jika jquery salah
		}
	}

	function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByTagName("input");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
				// add an "invalid" class to the field:
				y[i].className += " invalid";
				// and set the current valid status to false
				valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class on the current step:
		x[n].className += " active";
	}

	function registerAjax() {
		$('#nextBtn').attr('type', 'submit');
		// $('#regForm').attr('action', '/register');
		$('#regForm').on('submit', function(e) {
			e.preventDefault();
			var first_name = $(this).val();
			var last_name = $(this).val();
			var gender = $(this).val();
			var date_of_birth = $(this).val();
			var country = $(this).val();
			var currently_live_at = $(this).val();
			// var regency_city = $(this).val();
			// var sub_regency = $(this).val();
			// var village = $(this).val();
			var phone_number = $(this).val();
			var job = $(this).val();
			var email = $(this).val();
			var password = $(this).val();
			var password_confirmation = $(this).val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url: '/register',
				method: 'post',
				data: $('form').serialize(),

				// dataType: 'JSON',
				cache: false,
				success: function(response) {
					// swal("Success!", val, "success");
					window.location.href = "{{ url('/home') }}";
				},
				error: function(xhr) {

					var res = xhr.responseJSON;
					if ($.isEmptyObject(res) == false) {
						$.each(res.errors, function(key, val) {
							Swal.fire("Invalid!", val, "error");
						});
					}
					// return false;
				}

			});
		});
		return;
	}


	//psw visibility
	$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye-slash fa-eye");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
	//confirm psw visibility
	$(".toggle-password-2").click(function() {

		$(this).toggleClass("fa-eye-slash fa-eye");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>