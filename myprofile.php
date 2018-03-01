<?php
	include_once 'html_open.php';
?>

<?php
	if (isset($_GET['error'])) {
		$error = $_GET['error'];
		echo '<p><div id="loginError" class="alert alert-danger" role="alert">' . $error . '</div></p>';
	}

?> 


<div class="container">
	<H2 class="heading-large">MY PROFILE</H2>
	<hr>

	<?php if ($logged_in) : ?>
	<!-- ////////////////////////////////////////////////////// -->
	<!-- 			Section for logged in user 					-->
	<!-- ////////////////////////////////////////////////////// -->
	<!-- Hidden fields -->
	<div id="mypersonid" hidden></div>
	<div id="myaddressid" hidden></div>
	<div id="oldstreet" hidden></div>
	<div id="oldcity" hidden></div>
	<div id="oldstate" hidden></div>
	<div id="oldzip" hidden></div>
	<div id="oldphonearea" hidden></div>
	<div id="oldphoneline" hidden></div>
	<div id="mycid" hidden></div>
	<div id="myemailid" hidden></div>
	<div id="myphoneid" hidden></div>
	<div id="myscreenname" hidden><?php echo $_SESSION['screen_name'] ?></div>
	<div id="myemail" hidden><?php echo $_SESSION['email'] ?></div>


	<div id="rsErrorDiv" class="alert alert-danger" role="alert" style="display:none">
		Message for immediate attention.
	</div>	
	

	<div class="panel panel-info">
		<div class="panel-heading">
			<H3 class="panel-title">E-mail</H3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<p id="myprofileemail" class="form-control-static"></p>
					</div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-12">
						<ul class="list-group">
						  <li class="list-group-item list-group-item-warning">Email is linked to your Giving Records as an identifier.<BR />
						  Please contact giving@northlandchurch.net if you want to change Email address.</li>
						</ul>
					</div>
				</div>	
			</form>
		</div>
	</div>	

	
	<div class="panel panel-info">
		<div class="panel-heading">
			<H4 class="panel-title">Name</H4>
		</div>
		<div class="panel-body">
			<form id="profilename" method="get" action="#" class="form-horizontal">
				<div id="successprofilename" class="alert alert-success" role="alert" style="display:none">
					Your name successfully updated!
				</div>	

				<div class="form-group">				
					<label for="firstname" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control required" id="firstname" name="firstname" placeholder="First Name" maxlength="20" required >
					</div>
				</div>
				<div id="errorfirstname" class="alert alert-warning" role="alert" style="display:none">Please enter your first name.</div>

				<div class="form-group">				
					<label for="lastname" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control required" id="lastname" name="lastname" placeholder="Last Name" maxlength="20" required >
					</div>
				</div>
				<div id="errorlastname" class="alert alert-warning" role="alert" style="display:none">Please enter your last name.</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Update Name</button>
					</div>
				</div>
			</form>
		</div>
	</div>	
	

	<div class="panel panel-info">
		<div class="panel-heading">
			<H4 class="panel-title">Billing Address</H4>
		</div>
		<div class="panel-body">
			<form id="profileaddress" method="get" action="#" class="form-horizontal">
				<div id="successprofileaddress" class="alert alert-success" role="alert" style="display:none">
					Your address successfully updated!
				</div>	

				<div class="form-group">				
					<label for="addressstreet" class="col-sm-2 control-label">Street</label>
					<div class="col-sm-10">
						<input type="text" class="form-control required" id="addressstreet" name="addressstreet" placeholder="Street Address" maxlength="80" required >
					</div>
				</div>
				<div id="erroraddressstreet" class="alert alert-warning" role="alert" style="display:none">Please enter your street address.</div>

				<div class="form-group">				
					<label for="addresscity" class="col-sm-2 control-label">City</label>
					<div class="col-sm-10">
						<input type="text" class="form-control required" id="addresscity" name="addresscity" placeholder="City" maxlength="20" required >
					</div>
				</div>
				<div id="erroraddresscity" class="alert alert-warning" role="alert" style="display:none">Please enter your street address.</div>

				<div class="form-group">				
					<label for="addressstate" class="col-sm-2 control-label">State</label>
					<div class="col-sm-10">
						<select id="addressstate" name="addressstate" class="form-control"></select>
					</div>
				</div>
				
				<div class="form-group">				
					<label for="addresszip" class="col-sm-2 control-label">Postal Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control required" id="addresszip" name="addresszip" placeholder="Postal Code" maxlength="10" required >
					</div>
				</div>
				<div id="erroraddresszip" class="alert alert-warning" role="alert" style="display:none">Please enter your postal code.</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Update Address</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	

	
	<div class="panel panel-info">
		<div class="panel-heading">
			<H4 class="panel-title">Phone Number</H4>
		</div>
		<div class="panel-body">
			<form id="profilephone" method="get" action="#" class="form-horizontal">
				<div id="successprofilephone" class="alert alert-success" role="alert" style="display:none">
					Your  phone number successfully updated!
				</div>	

				<div class="form-group">				
					<label for="phonearea" class="col-sm-2 control-label">Area Code</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control required-number" id="phonearea" name="phonearea" placeholder="Area Code" required maxlength="4">
					</div>			
				</div>
				<div id="errorphonearea" class="alert alert-warning" role="alert" style="display:none">Please enter your valid area code (numbers only).</div>

				<div class="form-group">				
					<label for="phoneline" class="col-sm-2 control-label">Phone Number</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control required-number" id="phoneline" name="phoneline" placeholder="Phone Number" required maxlength="20">
					</div>			
				</div>
				<div id="errorphoneline" class="alert alert-warning" role="alert" style="display:none">Please enter your valid phone number (numbers only).</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Update Phone</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="panel panel-info" style="display:none">
		<div class="panel-heading">
			<H4 class="panel-title">Giving Statement Communication Preference</H4>
		</div>
		<div class="panel-body">
			<div class="col-sm-12">
				Thank you for your contributions to Northland, A Church Distributed! <br>
				We are doing our very best to be good stewards of the resources you have provided to enhance God's Kingdom on earth. <br>
				One of the ways we are doing this is to go GREEN through electronic delivery of year end giving statements (instead of incurring the cost of printing and mailing them through the US Postal System). <br>
				You do not have to do anything, in order to receive your year end statement electronically. <br>
				Your statement will be sent to this e-mail address at the end of January.<br>
				If you prefer to receive a printed copy of the statement, we are happy to send one to you. Simply click the following link to opt out of paperless.<br>
				<a href="http://optout.northlandchurch.net/">OPT OUT OF PAPERLESS link</a>
			</div>
		</div>
	</div>

	
	<?php else : ?>
	<!-- ////////////////////////////////////////////////////// -->
	<!-- 		Section for non-logged in user 					-->
	<!-- ////////////////////////////////////////////////////// -->
	<div class="alert alert-danger" role="alert" >
		<p>You are not authorized to access this page. <BR />
		Please <a href="index.php">Login</a>
		</p>
	</div>
	
	<?php endif; ?>

</div>

<?php
	include_once 'html_footer.php';
?>
	

<?php if ($logged_in) : ?>
<!-- ////////////////////////////////////////////////////// -->
<!-- 			Section for logged in user 					-->
<!-- ////////////////////////////////////////////////////// -->
<script>
'use strict';

	
$(document).ready(function () {
	
	$('#navbar-profile').addClass('active');
	
	var myemail 		= $("#myemail").text();
	var myscreenname 	= $("#myscreenname").text();

	// Adding State drop-down menu
	var state = populateState();
	$("#addressstate").html(state);

	$.ajaxSetup({
		headers : {
			'CsrfToken': $('meta[name="csrf-token"]').attr('content'),
			'TokenString': $('meta[name="token-string"]').attr('content')
		}
	});
	
	// Get User information by starting up
	$.ajax({
		type: "POST",
		url: "ws/webservice_old.php",
		data: "srv=get_user_by_email&format=json&email="+myemail+"&screen_name="+myscreenname,
		dataType: "json",
	})
	.done(function(data) {
		parseGetUser(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });


	// Triggers proper method based on the form clicked
	$("form").submit(function(event) {
		event.preventDefault();

		switch(event.target.id) {
			case "profilename":
				processUpdateName();
				break;
			case "profileaddress":
				processUpdateAddress();
				break;
			case "profilephone":
				processUpdatePhone();
				break;
			default:
				break;
		}
	});
	
});



///////////////////////////////////////////////////////////////////////////
//		Process Name update
///////////////////////////////////////////////////////////////////////////
function processUpdateName()
{
	var personid 		= $("#mypersonid").text();
	var firstname 		= $("#firstname").val().trim();
	var lastname 		= $("#lastname").val().trim();
	
	$("#successprofilename").hide();

	var errors 	= checkNameValidation();
	
	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	// Send an Ajax request to update name 
	$.ajax({
		type: "POST",
		url: "ws/webservice_old.php",
		data: "srv=update_person_by_id&format=json&personid="+personid+"&firstname="+firstname+"&lastname="+lastname,
		dataType: "json",
	})
	.done(function(data) {
		parseUpdateName(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}

///////////////////////////////////////////////////////////////////////////
//		Process Address update
///////////////////////////////////////////////////////////////////////////
function processUpdateAddress()
{
	var addressid 		= $("#myaddressid").text();
	var billingline1 	= $("#addressstreet").val().trim();
	var billingcity 	= $("#addresscity").val().trim();
	var billingstate 	= $("#addressstate").val();
	var billingzip 		= $("#addresszip").val().trim();

	var errors 	= checkAddressValidation();
	
	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	// Send an Ajax request to update naddress
	$.ajax({
		type: "POST",
		url: "ws/webservice_old.php",
		data: "srv=update_address_by_id&format=json&addressid="+addressid+"&billingline1="+billingline1+"&billingcity="+billingcity+"&billingstate="+billingstate+"&billingzip="+billingzip,
		dataType: "json",
	})
	.done(function(data) {
		parseUpdateAddress(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}

///////////////////////////////////////////////////////////////////////////
//		Process Phone update
///////////////////////////////////////////////////////////////////////////
function processUpdatePhone()
{
	var phoneid		= $("#myphoneid").text();
	var phonearea 	= $("#phonearea").val().trim();
	var phoneline 	= $("#phoneline").val().trim();

	var errors 	= checkPhoneValidation();
	
	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	// Send an Ajax request to update phone 
	$.ajax({
		type: "POST",
		url: "ws/webservice_old.php",
		data: "srv=update_phone_by_id&format=json&phoneid="+phoneid+"&phonearea="+phonearea+"&phoneline="+phoneline,
		dataType: "json",
	})
	.done(function(data) {
		parseUpdatePhone(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}


///////////////////////////////////////////////////////////////////////////
//	Checking if the name information entered is valid
//  Returns error messages if there are any invalid information
///////////////////////////////////////////////////////////////////////////
function checkNameValidation()
{
	var errors = [];
	
	if ($("#firstname").val().trim() == "")	{
		errors.push ("Enter Your First Name");
	}

	if ($("#lastname").val().trim() == "")	{
		errors.push ("Enter Your Last Name");
	}

	return errors;	
}

///////////////////////////////////////////////////////////////////////////
//	Checking if the address information entered is valid
//  Returns error messages if there are any invalid information
///////////////////////////////////////////////////////////////////////////
function checkAddressValidation()
{
	var errors = [];
	
	// Address line validation
	var addressstreet = $("#addressstreet").val().trim();
	if ((addressstreet.length < 1))	{
		errors.push ("Enter a valid address.");
	}
	// City validation
	var addresscity = $("#addresscity").val().trim();
	if (addresscity.length < 1)	{
		errors.push ("Enter a valid city.");
	}
	// Postal code validation
	var addresszip = $("#addresszip").val().trim();
	if (addresszip.length < 1)	{
		errors.push ("Enter a valid postal code.");
	}
	
	return errors;	
}

///////////////////////////////////////////////////////////////////////////
//	Checking if the phone information entered is valid
//  Returns error messages if there are any invalid information
///////////////////////////////////////////////////////////////////////////
function checkPhoneValidation()
{
	var errors = [];
	var areano	= $("#phonearea").val().trim();
	var lineno	= $("#phoneline").val().trim();

	if (areano == "" || !checkNumber(areano))	{
		errors.push ("Enter your valid area number");
	}

	if (lineno == "" || !checkNumber(lineno))	{
		errors.push ("Enter your phone number");
	}
	
	return errors;	
}


///////////////////////////////////////////////////////////////////////////
//	Parsing User information and display to the browser
///////////////////////////////////////////////////////////////////////////
function parseGetUser(data) 
{ 
	try {
		var jsonObj = $.parseJSON(data);
	} catch(err) {
		var msg = "An error occured in parsing JSON: " + err + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("An error occured in parsing JSON: " + err);
	}
	
	if (jsonObj === false) {
		alert("Something wroing happened! Report Administrator!");
		return false;
	}
	
	var error_len = jsonObj.northland_api[1].errors.length;
	// Error handling for the request
	if (error_len > 0) 
	{
		var error_arr = jsonObj.northland_api[1].errors;
		var error_message = '';
		for (var i=0; i<error_len; i++)
			error_message += error_arr[i].number + ": " + error_arr[i].type + " - " + error_arr[i].message + "\n";
		alert (error_message);
	} 
	else 
	{
		var user = jsonObj.northland_api[2].response.users;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display user information
		else 
		{
			// Store user information into hidden DOM
			$("#mypersonid").text(user[0].PK_person);
			$("#myaddressid").text(user[0].PK_address);
			$("#myphoneid").text(user[0].PK_phone);
			$("#myemailid").text(user[0].PK_email);
			$("#mycid").text(user[0].cid);

			// Display user information
			$("#firstname").val(user[0].firstname);
			$("#lastname").val(user[0].lastname);
			$("#addressstreet").val(user[0].billingline1);
			$("#addresscity").val(user[0].billingcity);
			var state = user[0].billingstate;
			if (state == null || state == '') 
			{
				$("#addressstate").val("FL");
				$("#oldstate").text("FL");
			}
			else
			{
				$("#addressstate").val(user[0].billingstate);
				$("#oldstate").text(user[0].billingstate);
			}
			$("#addresszip").val(user[0].billingzip);
			$("#phonearea").val(user[0].phonearea);
			$("#phoneline").val(user[0].phoneline);
			$("#myprofileemail").html(user[0].email);

			// Store address info into hidden DOM 
			$("#oldstreet").text(user[0].billingline1);
			$("#oldcity").text(user[0].billingcity);
			$("#oldzip").text(user[0].billingzip);
			$("#oldphonearea").text(user[0].phonearea);
			$("#oldphoneline").text(user[0].phoneline);
			
		}
	}
}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing User information response after updating a user in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseUpdateName(data) 
{ 
	var jsonObj = $.parseJSON(data);
	
	var error_len = jsonObj.northland_api[1].errors.length;
	// Error handling for the request
	if (error_len > 0) 
	{
		var error_arr = jsonObj.northland_api[1].errors;
		var error_message = '';
		for (var i=0; i<error_len; i++)
			error_message += error_arr[i].number + ": " + error_arr[i].type + " - " + error_arr[i].message + "\n";
		alert (error_message);
	} 
	else 
	{
		var user = jsonObj.northland_api[2].response.users;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display user information
		else 
		{
			$("#firstname").val(user[0].firstname);
			$("#lastname").val(user[0].lastname);

			// Confirms the success and disappear 3 sec later
			$("#successprofilename").show();
			$('#successprofilename').delay(3000).fadeOut('slow');
		}
	}
}


//////////////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Address information response after updating an address for the user in the system
//////////////////////////////////////////////////////////////////////////////////////////////////
function parseUpdateAddress(data) 
{ 
	var jsonObj = $.parseJSON(data);
	
	var error_len = jsonObj.northland_api[1].errors.length;
	// Error handling for the request
	if (error_len > 0) 
	{
		var error_arr = jsonObj.northland_api[1].errors;
		var error_message = '';
		for (var i=0; i<error_len; i++)
			error_message += error_arr[i].number + ": " + error_arr[i].type + " - " + error_arr[i].message + "\n";
		alert (error_message);
	} 
	else 
	{
		var user = jsonObj.northland_api[2].response.users;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display user information
		else 
		{
			$("#addressstreet").val(user[0].billingline1);
			$("#addresscity").val(user[0].billingcity);
			$("#addressstate").val(user[0].billingstate);
			$("#addresszip").val(user[0].billingzip);

			// Confirms the success and disappear 3 sec later
			$("#successprofileaddress").show();
			$('#successprofileaddress').delay(3000).fadeOut('slow');
			
			var cid	= $("#mycid").text();
			if (cid != '') {
				// Send an email notification to Finanace for address change
				sendAddressChangeNotificaction();
			}
		}
	}
}


//////////////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Phone information response after updating a phone for the user in the system
//////////////////////////////////////////////////////////////////////////////////////////////////
function parseUpdatePhone(data) 
{ 
	var jsonObj = $.parseJSON(data);
	
	var error_len = jsonObj.northland_api[1].errors.length;
	// Error handling for the request
	if (error_len > 0) 
	{
		var error_arr = jsonObj.northland_api[1].errors;
		var error_message = '';
		for (var i=0; i<error_len; i++)
			error_message += error_arr[i].number + ": " + error_arr[i].type + " - " + error_arr[i].message + "\n";
		alert (error_message);
	} 
	else 
	{
		var user = jsonObj.northland_api[2].response.users;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display user information
		else 
		{
			$("#phonearea").val(user[0].phonearea);
			$("#phoneline").val(user[0].phoneline);

			// Confirms the success and disappear 3 sec later
			$("#successprofilephone").show();
			$('#successprofilephone').delay(3000).fadeOut('slow');
			
			var cid	= $("#mycid").text();
			if (cid != '') {
				// Send an email notification to Finanace for address change
				sendPhoneChangeNotificaction();
			}
		}
	}
}


//////////////////////////////////////////////////////////////////////////////////////////////////
//	Send a notification email to Finance
//////////////////////////////////////////////////////////////////////////////////////////////////
function sendAddressChangeNotificaction() 
{ 
	var newstreet	= $("#addressstreet").val();
	var newcity		= $("#addresscity").val();
	var newstate 	= $("#addressstate").val();
	var newzip		= $("#addresszip").val();
	
	var oldstreet	= $("#oldstreet").text();
	var oldcity		= $("#oldcity").text();
	var oldstate 	= $("#oldstate").text();
	var oldzip		= $("#oldzip").text();
	
	var name		= $("#firstname").val() + " " + $("#lastname").val();
	var cid			= $("#mycid").text();
	
	
	// Sending a notification email to Finance when address changes
	if ((newstreet.toLowerCase() != oldstreet.toLowerCase()) || (newcity.toLowerCase() != oldcity.toLowerCase()))
	{
		var send_data = "";
		// Build a data for email notification to Finance
		send_data = "name=" + name + "&cid=" + cid 
				 + "&oldstreet=" + oldstreet + "&oldcity=" + oldcity + "&oldstate=" + oldstate + "&oldzip=" + oldzip
				 + "&newstreet=" + newstreet + "&newcity=" + newcity + "&newstate=" + newstate + "&newzip=" + newzip; 
		// Call web service to send an email
		$.ajax({
			type: "POST",
			url: "mail/notify_address_change.php",
			data: send_data,
		})
		.done(function(data) {
			console.log("A notification for Address sent");
		})
		.fail(function(jqXHR, textStatus) {
			console.log("Error: " + textStatus + "\nPlease contact us at giving@northlandchurch.net");
		})
		.always(function() { });
	}

	$("#oldstreet").text(newstreet);
	$("#oldcity").text(newcity);
	$("#oldstate").text(newstate);
	$("#oldzip").text(newzip);
}


//////////////////////////////////////////////////////////////////////////////////////////////////
//	Send a notification email to Finance
//////////////////////////////////////////////////////////////////////////////////////////////////
function sendPhoneChangeNotificaction() 
{ 
	var newphonearea	= $("#phonearea").val();
	var newphoneline	= $("#phoneline").val();
	
	var oldphonearea	= $("#oldphonearea").text();
	var oldphoneline	= $("#oldphoneline").text();
	
	var name		= $("#firstname").val() + " " + $("#lastname").val();
	var cid			= $("#mycid").text();
	
	
	// Sending a notification email to Finance when phone number changes
	if ((newphonearea != oldphonearea) || (newphoneline != oldphoneline))
	{
		var oldphone = oldphonearea + " " + oldphoneline;
		var newphone = newphonearea + " " + newphoneline;
		
		var send_data = "";
		// Build a data for email notification to Finance
		send_data = "name=" + name + "&cid=" + cid 
				 + "&oldphone=" + oldphone + "&newphone=" + newphone; 
		// Call web service to send an email
		$.ajax({
			type: "POST",
			url: "mail/notify_phone_change.php",
			data: send_data,
		})
		.done(function(data) {
			console.log("A notification for Phone sent");
		})
		.fail(function(jqXHR, textStatus) {
			console.log("Error: " + textStatus + "\nPlease contact us at giving@northlandchurch.net");
		})
		.always(function() { });
	}

	$("#oldphonearea").text(newphonearea);
	$("#oldphoneline").text(newphoneline);
}


function checkNumber(value) 
{
	// Check that the number is numeric
	var valueexp = /^[0-9]{1,19}$/;
	if (!valueexp.exec(value))  {
		return false; 
	}

	return true;
}


</script>


<?php endif; ?>

</body>

</html>
