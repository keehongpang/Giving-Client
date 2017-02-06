<?php
	include_once 'includes/register.inc.php';
	include_once 'html_open.php';
?>


<div class="container">
	<h2 class="heading-large">GIVING: REGISTER</h2>

	<!-- Registration form to be output if the POST variables are not
		set or if the registration script caused an error. -->
	<ul class="list-unstyled">
		<li class="text-warning">Emails must have a valid email format.</li>
		<li class="text-warning">Passwords must be at least 6 characters long.</li>
		<li class="text-warning">Passwords must contain
			<ul>
				<li class="text-warning">At least one upper case letter (A..Z)</li>
				<li class="text-warning">At least one lower case letter (a..z)</li>
				<li class="text-warning">At least one number (0..9)</li>
			</ul>
		</li>
		<li class="text-warning">Your password and confirmation must match exactly.</li>
	</ul>
	
	<p>Send us an Email to <a href="mailto:giving@northlandchurch.net">giving@northlandchurch.net</a> if you need help.</p>

	<?php
		if (isset($_GET['error'])) {
			$error = $_GET['error'];
			echo '<p><div id="loginError" class="alert alert-danger" role="alert">' . $error . '</div></p>';
		}
		if (!empty($error_msg)) {
			echo $error_msg;
		}
	?>
	
	<form id="frmContact" name="frmContact" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" > 
		<h3 class="form-signin-heading">Your Information</h3>

		<div id="wholeerror" class="alert alert-danger" role="alert" style="display:none">
			Message for immediate attention.
		</div>	

		<p>
			<label for="email" class="sr-only">Email address</label>
			<input name="email" id="email" class="form-control required-email-register" placeholder="Email address" required="" autofocus="" type="email" maxlength="60" >
			<div id="errorinvalidemail" class="alert alert-warning" role="alert" style="display:none">Please enter valid email address!</div>
			<div id="errorexistemail" class="alert alert-warning" role="alert" style="display:none">Email exists in the system. Please go to Sign In page.</div>
		</p>
		<p>
			<label for="firstname" class="sr-only">First Name</label>
			<input name="firstname" id="firstname" class="form-control required" placeholder="First Name" required="" type="text" maxlength="20" >
			<div id="errorfirstname" class="alert alert-warning" role="alert" style="display:none">Please enter your first name.</div>
		</p>
		<p>
			<label for="lastname" class="sr-only">Last Name</label>
			<input name="lastname" id="lastname" class="form-control required" placeholder="Last Name" required="" type="text" maxlength="20" >
			<div id="errorlastname" class="alert alert-warning" role="alert" style="display:none">Please enter your last name.</div>
		</p>
		<p>
			<label for="password" class="sr-only">Password</label>
			<input name="password" id="password" class="form-control required-password" placeholder="Password" required="" type="password">
			<div id="errorlengthpassword" class="alert alert-warning" role="alert" style="display:none">Password must be at least 6 characters long.</div>
			<div id="errorcombinationpassword" class="alert alert-warning" role="alert" style="display:none">Password must contain at least one number, one lowercase and one uppercase letter.</div>
		</p>
		<p>
			<label for="confirmpw" class="sr-only">Password</label>
			<input name="confirmpw" id="confirmpw" class="form-control required-confirmpw" placeholder="Confirm Password" required="" type="password">
			<div id="errorconfirmpw" class="alert alert-warning" role="alert" style="display:none">The Password must match the Confirm Password.</div>
		</p>
		<p>
			<button id="registerbutton"  class="btn btn-lg btn-primary btn-block" disabled type="submit">Register</button>
		</p>

	</form>

	<p>Return to the <a href="index.php">Sign In page</a>.</p>
	
	
</div>


<?php
	include_once 'html_footer.php';
?>

<script>
'use strict';

$(document).ready(function () {

	// Password validation check when text field entered
	$("input[type='password'].required-password").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val();
		var valueid 	= $(this).attr('id');
		
		// Check if the password is sufficiently long (min 6 chars)
		if (value.length < 6) {
			$("#errorlength"+valueid).show();
			return false;
		} else {
			$("#errorlength"+valueid).hide();
		}
			
		// At least one number, one lowercase and one uppercase letter 
		// At least six characters 
		var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
		if (!re.test(value)) {
			$("#errorcombination"+valueid).show();
			return false;
		} else {
			$("#errorcombination"+valueid).hide();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});


	// Password for Conformation validation check when text field entered
	$("input[type='password'].required-confirmpw").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val();
		var valueid 	= $(this).attr('id');
		var password	= $("#password").val();

		// Check password and confirmation are the same
		if (password != value) {
			$("#error"+valueid).show();
		} else {
			$("#error"+valueid).hide();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});


	// email validation check when text field entered
//	$("input[type='text'].required-email-register").keyup(function() {
	$(".required-email-register").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');
		
		if (validateEmail(value) === true) 
		{
			$("#errorinvalid"+valueid).hide();
		} 
		else 
		{
			$("#errorinvalid"+valueid).show();
			$("#registerbutton").prop('disabled', true);
			return false;
		}
		
		// Call to check the email exist in the system and act based on the response
		checkEmailExist(value);
		
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});

	// Actions for form submission
	$("#frmContact").submit(function(event) {
		event.preventDefault();
		
		$("#registerbutton").prop('disabled', true);
		$("#wholeerror").hide();
		
		// Validation checking for input variables
		var errors 	= registerValidation();
		
		// Display errors when exist from validation process
		if (errors != null && errors != '') {
			// Display errors for Payment Validation
//			alert (errors.join("\r\n"));
			$("#wholeerror").html(errors.join("<BR />"));
			$("#wholeerror").show();
			return false;
		}

		regformhash(event.target, event.target.firstname, event.target.lastname, event.target.email, event.target.password, event.target.confirmpw);

	});
});


/////////////////////////////////////////////////////////////////////////////////
//	Checking if the credit card or bank account information entered is valid
// 	Checking if every fields is valid
//  Returns error messages if there are any invalid information
/////////////////////////////////////////////////////////////////////////////////
function registerValidation()
{
	var errors = [];

	var firstname	= $("#firstname").val().trim();
	var lastname	= $("#lastname").val().trim();
	var email		= $("#email").val().trim();
	var password	= $("#password").val();
	var confirm		= $("#confirmpw").val();

//	console.log("Starting registerValidation()");
	
	// Name validation
	if (firstname.length < 1 || lastname.length < 1)	
		errors.push ("Enter first and last name");
	
	// Email validation
	if (!validateEmail(email))
		errors.push ("Enter a valid email address");

	// Check if the password is sufficiently long (min 6 chars)
	if (password.length < 6) 
		errors.push ("Password must be at least 6 characters long.");

	// At least one number, one lowercase and one uppercase letter 
	// At least six characters 
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
	if (!re.test(password)) 
		errors.push ("Password must contain at least one number, one lowercase and one uppercase letter.");
		
	// Check password and confirmation are the same
	if (password != confirm) 
		errors.push (" The Password must match the Confirm Password.");

	return errors;	
}


////////////////////////////////////////////////////////////////////////////////////
// 		Check if Email exists in the system when email entered
////////////////////////////////////////////////////////////////////////////////////
function checkEmailExist(email)
{
	// Call a PHP to check email exist in the EE system
	$.ajax({
		type: "GET",
		url: "includes/check_email_exist.php?email=" + email,
	})
	.done(function(data) {
		// Email exists in the system
		if (data == "Exist")
		{
			$("#errorexistemail").show();
			$("#registerbutton").prop('disabled', true);
		} 
		// Email does not exist in the system
		else if (data == "NotExist")
		{
			$("#errorexistemail").hide();
			$("#registerbutton").prop('disabled', false);
		}
		// Error handling
		else 
		{
			$("#registerbutton").prop('disabled', true);
			alert(data);
		}
		
	})
	.fail(function(jqXHR, textStatus) {
		alert("Request failed: " + textStatus);
	})
	.always(function() { });
	
}


</script>

</body>

</html>