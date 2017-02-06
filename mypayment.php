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
	<H2 class="heading-large">PAYMENT ACCOUNTS</H2>
	<hr>

	<?php if ($logged_in) : ?>
	<!-- Hidden fields -->
	<div id="myemail" hidden><?php echo $_SESSION['email'] ?></div>

	
	<div id="rsErrorDiv" class="alert alert-danger" role="alert" style="display:none">
		Message for immediate attention.
	</div>	
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<H3 class="panel-title">Bank Accounts</H3>
		</div>
		<div class="panel-body">
			<div>
				<a id="addBankLink" href="#" class="btn btn-default" role="button" title="Click here to add a bank account">
					<img src="./images/plus-expand-box-icon.png"> Add a new Bank Account
				</a>
			</div>
			<p></p>
			
			<div id="successaddbankaccount" class="alert alert-success" role="alert" style="display:none">
				Your bank account successfully created!
			</div>	

			<div id="successeditbankaccount" class="alert alert-success" role="alert" style="display:none">
				Your bank account successfully updated!
			</div>	

			<!-- Beginning of Adding Bank Account Section -->
			<form id="addbankaccount" method="get" action="#" style="display:none" class="form-horizontal">
				<div class="form-group">				
					<div class="col-sm-offset-2 col-sm-10">
						<img src="./images/check-info.png">
					</div>
				</div>
					
				<div class="form-group">				
					<label for="bankname" class="col-sm-2 control-label">Bank Name</label>
					<div class="col-sm-10">
						<input type="text" required class="form-control required" id="bankname" name="bankname" placeholder="Bank Name" maxlength="20" >
					</div>
				</div>
				<div id="errorbankname" class="alert alert-warning" role="alert" style="display:none">Please enter your bank name.</div>

				<div class="form-group">				
					<label for="bankrtnumber" class="col-sm-2 control-label">Routing Number</label>
					<div class="col-sm-10">
						<input type="text" required class="form-control required-number" id="bankrtnumber" name="bankrtnumber" placeholder="Routing Number" maxlength="10" >
					</div>
				</div>
				<div id="errorbankrtnumber" class="alert alert-warning" role="alert" style="display:none">Please enter valid bank routing number.</div>

				<div class="form-group">				
					<label for="bankacctnumber" class="col-sm-2 control-label">Account Number</label>
					<div class="col-sm-10">
						<input type="text" required class="form-control required-number" id="bankacctnumber" name="bankacctnumber" placeholder="Account Number" maxlength="20" >
					</div>
				</div>
				<div id="errorbankacctnumber" class="alert alert-warning" role="alert" style="display:none">Please enter valid bank account number.</div>

				<div class="form-group">				
					<label for="bankaccttype" class="col-sm-2 control-label">Account Type</label>
					<div class="col-sm-10">
						<select id="bankaccttype" name="bankaccttype" class="form-control">
							<option value="CHECKING">Checking</option>
							<option value="SAVINGS">Savings</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Save Bank Account</button>
						<button type="button" id='cancelBankButton' class="btn btn-default">Cancel</button>
					</div>
				</div>

			</form>
			<!-- End of Adding Bank Account Section -->
			
			<!-- Section for my Bank Accounts -->
			<div id="bankaccounts"></div>
		</div>
	</div>



	<div class="panel panel-info">
		<div class="panel-heading">
			<H3 class="panel-title">Credit Cards</H3>
		</div>
		<div class="panel-body">
			<div>
				<a id="addCardLink" href="#" class="btn btn-default" role="button" title="Click here to add a credit card">
					<img src="./images/plus-expand-box-icon.png"> Add a new Credit Card
				</a>
			</div>
			<p></p>

			<div id="successaddcreditcard" class="alert alert-success" role="alert" style="display:none">
				Your credit card successfully created!
			</div>	

			<div id="successeditcreditcard" class="alert alert-success" role="alert" style="display:none">
				Your credit card successfully updated!
			</div>	

			<!-- Beginning of Adding Credit Card Section -->
			<form id="addcreditcard" method="get" action="#" style="display:none" class="form-horizontal">
				<div class="form-group">				
					<label for="creditcardtype" class="col-sm-2 control-label">Card Type</label>
					<div class="col-sm-10">
						<select id="creditcardtype" name="creditcardtype" class="form-control required" required>
							<option value="">Select One</option>
							<option value="VISA">Visa</option>
							<option value="MC">MasterCard</option>
							<option value="AMEX">American Express</option>
							<option value="DISCOVER">Discover</option>
						</select>
					</div>
				</div>
				<div id="errorcreditcardtype" class="alert alert-warning" role="alert" style="display:none">Please select credit card type.</div>

				<div class="form-group">				
					<label for="cardnumber" class="col-sm-2 control-label">Card Number</label>
					<div class="col-sm-10">
						<input type="text" required class="form-control required-creditcard" id="cardnumber" name="cardnumber" placeholder="Card Number" maxlength="20" >
					</div>
				</div>
				<div id="errorcardnumber" class="alert alert-warning" role="alert" style="display:none">Please enter valid credit card number.</div>

				<div class="form-group">				
					<label for="nameoncard" class="col-sm-2 control-label">Name on Card</label>
					<div class="col-sm-10">
						<input type="text" required class="form-control required" id="nameoncard" name="nameoncard" placeholder="Name on Card" maxlength="40" >
					</div>
				</div>
				<div id="errornameoncard" class="alert alert-warning" role="alert" style="display:none">Please enter card holder name.</div>

				<div class="form-group">				
					<label for="cardexpiration" class="col-sm-2 control-label">Expiration Date</label>
					<div class="col-sm-5">
						<select id="cardexpmonth" name="cardexpmonth" class="form-control required" required>
							<option value="">Month</option>
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					<div class="col-sm-5">
						<select id="cardexpyear" name="cardexpyear" class="form-control required" required></select> 
					</div>
				</div>
				<div id="errorcardexpmonth" class="alert alert-warning" role="alert" style="display:none">Please select expiration month of your credit card.</div>
				<div id="errorcardexpyear" 	class="alert alert-warning" role="alert" style="display:none">Please select expiration year of your credit card.</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Save Credit Card</button>
						<button type="button" id='cancelCardButton' class="btn btn-default">Cancel</button>
					</div>
				</div>

			</form>
			<!-- End of Adding Credit Card Section -->

			<!-- Section for my Credit Cards -->
			<div id="creditcards"></div>
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

<script>
'use strict';

///////////////////////////////////////////////////////////////////////
// 					Global variables
///////////////////////////////////////////////////////////////////////
// Payments
var payments = [];
// Expiration Year Drop-down menu
var expYearMenu = "";

$(document).ready(function () {
	
	$('#navbar-accounts').addClass('active');
	
	var myemail 		= $("#myemail").text();
	var myscreenname 	= $("#myscreenname").text();
	
	// Adding Year drop-down menu dynamically
	expYearMenu = populateExpirationYearMenu();
	$("#cardexpyear").html(expYearMenu);

	// Get all payments by starting up
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=get_payments_by_email&format=json&email="+myemail,
		dataType: "json",
	})
	.done(function(data) {
		parseGetPayments(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });

	
	// Show/Hide a new bank account DIV when clicked 'Add A New Bank Account' link
	$("#addBankLink").click(function() {
		$("#addbankaccount").toggle();
		return false;
	});
	
	// Hide a new bank account DIV when clicked 'Cancel' button
	$("#cancelBankButton").click(function() {
		$("#addbankaccount").toggle();
	});
	
	// Show/Hide a new credit card DIV when clicked 'Add A New Credit Card' link
	$("#addCardLink").click(function() {
		$("#addcreditcard").toggle();
		return false;
	});
	
	// Hide a new credit card DIV when clicked 'Cancel' button
	$("#cancelCardButton").click(function() {
		$("#addcreditcard").toggle();
	});


	// Trigger proper method based on the form clicked
	$("form").submit(function(event) {
		event.preventDefault();

		switch(event.target.id) {
			case "addbankaccount":
				processAddBankAccount();
				break;
			case "addcreditcard":
				processAddCreditCard();
				break;
			default:
				break;
		}

	});
	
});		// End for $(document).ready(


///////////////////////////////////////////////////////////////////////////////
// Process adding a new bank account when clicked 'Add Bank Account' button
///////////////////////////////////////////////////////////////////////////////
function processAddBankAccount()
{
	var myemail 	= $("#myemail").text();

	// Check bank account validation
	var errors = checkPaymentValidation('ADD_BA', null);

	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	// Call a web service to Add a Bank Account
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=add_payment&format=json&email=" + myemail + "&paymenttype=bankaccount"+"&bankname="+$("#bankname").val()
			+"&bankrtnumber="+$("#bankrtnumber").val()+"&bankacctnumber="+$("#bankacctnumber").val()+"&bankaccttype="+$("#bankaccttype").val(),
		dataType: "json",
	})
	.done(function(data) {
		parseAddPayment(data);
	})
	.fail(function(jqXHR, textStatus) {
		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}
	
///////////////////////////////////////////////////////////////////////////////
// Process adding a new credit card when clicked 'Add Credit Card' button
///////////////////////////////////////////////////////////////////////////////
function processAddCreditCard()
{
	var myemail 	= $("#myemail").text();

	// Check credit card validation
	var errors = checkPaymentValidation('ADD_CC', null);

	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	// Call a web service to Add a Credit Card 
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=add_payment&format=json&email=" + myemail + "&paymenttype=creditcard"+"&cardtype="+$("#creditcardtype").val()
			+"&cardname="+$("#nameoncard").val()+"&cardnumber="+$("#cardnumber").val()+"&cardexpmonth="+$("#cardexpmonth").val()+"&cardexpyear="+$("#cardexpyear").val(),
		dataType: "json",
	})
	.done(function(data) {
		parseAddPayment(data);
	})
	.fail(function(jqXHR, textStatus) {
		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}


///////////////////////////////////////////////////////////////////////////
//	Parsing Payment information and display to the browser
///////////////////////////////////////////////////////////////////////////
function parseGetPayments(data) 
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
		payments = jsonObj.northland_api[2].response.payments;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		else 
		{
			// Display payment information
			displayPaymentInformation(payments);

			// Assign right expiration date for credit card in select option
			assignCreditCardExpirationDate();
		}
	}
}


////////////////////////////////////////////////////////////////////////////////////////
//	Assign Credit Card Expiration Date from global payments variable
////////////////////////////////////////////////////////////////////////////////////////
function assignCreditCardExpirationDate()
{
	// Assign expiration date to each credit card
	for(var i=0; i<payments.length; i++) 
	{
		if (payments[i].paymenttype == 'creditcard') 
		{
			var paymentid 	= payments[i].PK_pmtmethod;
			$('#cardexpmonth'+paymentid+' option[value='+payments[i].expirationmonth+']').prop('selected', true);
			$('#cardexpyear'+paymentid+' option[value='+payments[i].expirationyear+']').prop('selected', true);
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Payment information response after adding a payment in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseAddPayment(data) 
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
		var temp_payments = [];
		temp_payments = jsonObj.northland_api[2].response.payments;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display payment information
		else 
		{
			// Display payment information into the Bank/Creditcard section
			displayPaymentInformation(temp_payments);
			
			// Add a new payment into a global payments array
			payments[payments.length] = temp_payments[0];
			
			if (temp_payments[0].paymenttype == "bankaccount") 
			{
				// clear all fields in addbankaccount DIV
				clearAddBankAccountFields();
				// hide addbankaccount DIV
				$("#addbankaccount").toggle();
				
				// Confirms the success and disappear 3 sec later
				$("#successaddbankaccount").show();
				$('#successaddbankaccount').delay(3000).fadeOut('slow');
			} 
			else 
			{
				// Assign right expiration date for credit card in select option
				assignCreditCardExpirationDate();

				// clear all fields in addcreditcard DIV
				clearAddCreditCardFields();
				// hide addcreditcard DIV
				$("#addcreditcard").toggle();

				// Confirms the success and disappear 3 sec later
				$("#successaddcreditcard").show();
				$('#successaddcreditcard').delay(3000).fadeOut('slow');
			}
		}
	}		

}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Payment information response after updating a payment in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseUpdatePayment(data) 
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
		var temp_payments = [];
		temp_payments = jsonObj.northland_api[2].response.payments;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display payment information
		else 
		{
			// For Bank Account
			if (temp_payments[0].paymenttype == "bankaccount") 
			{
				var paymentid 	= temp_payments[0].PK_pmtmethod;
				var acctlast4	= temp_payments[0].acctnumlast4;
				var acctnumber	= "********" + temp_payments[0].acctnumlast4;
				var bankname 	= temp_payments[0].bankname;

				// Updating the name of the payment link
				var contents = '<img src="./images/bank-account-icon.png">' 
						+ '<button type="button" class="btn btn-link">'
						+ bankname + " ending in " + acctlast4
						+ '</button>';
						
				$('#paymentlink'+paymentid).html(contents);

				// Updating account number
				$('#bankacctnumber'+paymentid).val(acctnumber);
	
				// Confirms the success and disappear 3 sec later
				$("#successeditbankaccount").show();
				$('#successeditbankaccount').delay(3000).fadeOut('slow');
		} 
			// For Credit Card
			else
			{
				var paymentid 	= temp_payments[0].PK_pmtmethod;
				var last4		= temp_payments[0].creditcardlast4;
				var cardtype 	= temp_payments[0].creditcardtype;
				// Get Full credit card name
				var carddesc 	= returnCardType(cardtype);
				var expmonth 	= temp_payments[0].expirationmonth;
				var expyear 	= temp_payments[0].expirationyear;

				// Updating the name of the payment link
				var contents = '<img src="./images/card-' + cardtype + '.png">' 
						+ '<button type="button" class="btn btn-link">'
						+ carddesc + " ending in " + last4 + ' expiring ' + expmonth + '/' + expyear
						+ '</button>';

				$('#paymentlink'+paymentid).html(contents);
				
				// Confirms the success and disappear 3 sec later
				$("#successeditcreditcard").show();
				$('#successeditcreditcard').delay(3000).fadeOut('slow');
			}
		}
	}		

}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Payment information response after deleting a payment in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseDeletePayment(data) 
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
		var temp_payments = [];
		temp_payments = jsonObj.northland_api[2].response.payments;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display payment information
		else 
		{
			var paymentid 	= temp_payments[0].PK_pmtmethod;
			// Hide the payment link
			$('#paymentlink'+paymentid).toggle();
			// Hide the payment detail section
			$('#payment'+paymentid).toggle();
		}
	}		

}



////////////////////////////////////////////////////////////////////////////////////////
//		Clear all fields in 'addcreditcard' DIV
////////////////////////////////////////////////////////////////////////////////////////
function clearAddCreditCardFields()
{
	$("#cardtype").prop('selectedIndex', 0);
	$("#cardnumber").val("");
	$("#nameoncard").val("");
	$("#cardexpmonth").prop('selectedIndex', 0);
	$("#cardexpyear").prop('selectedIndex', 0);
}

////////////////////////////////////////////////////////////////////////////////////////
//		Clear all fields in 'addbankaccount' DIV
////////////////////////////////////////////////////////////////////////////////////////
function clearAddBankAccountFields()
{
	$("#bankname").val("");
	$("#bankrtnumber").val("");
	$("#bankacctnumber").val("");
}

////////////////////////////////////////////////////////////////////////////////////////
//	Parse payment information and display in the Bank/CreditCard section respectively
//  Adding handlers for links and buttons to the each payment information 
////////////////////////////////////////////////////////////////////////////////////////
function displayPaymentInformation(payments)
{
	for (var i=0; i<payments.length; i++)
	{
		// For bank account
		if (payments[i].paymenttype == 'bankaccount') 
		{
			var htmlBank	= $("#bankaccounts").html();
			var paymentid 	= payments[i].PK_pmtmethod;
			var bankname 	= payments[i].bankname;
			var rtnumber	= payments[i].routingnumber;
			var accttype	= payments[i].bankaccounttype;
			var acctnumber	= '********' + payments[i].acctnumlast4;
			
			if ((!bankname) || bankname.trim() == "")
				bankname = "Bank Account";

			
			// Link section
			htmlBank += '<div id="paymentlink' + paymentid + '" class="paymentlink"><img src="./images/bank-account-icon.png">'
					+	'<button type="button" class="btn btn-link">'
					+	bankname + ' ending in ' + payments[i].acctnumlast4 
					+ 	'</button>'
					+	'</div>';

			// Input section - Appears when click the link above
			htmlBank += '<form id="payment' + paymentid + '" method="get" action="#" style="display:none" class="form-horizontal">';

			htmlBank += '<div class="form-group">';
			htmlBank += '	<label for="bankname" class="col-sm-2 control-label">Bank Name</label> ';
			htmlBank += '	<div class="col-sm-10">';
			htmlBank += '		<input type="text" id="bankname' + paymentid + '" name="bankname' + paymentid + '" value="' + bankname + '" maxlength="20" required class="form-control required">';
			htmlBank += '	</div>';
			htmlBank += '</div>';
			htmlBank += '<div id="errorbankname' + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please enter your bank name.</div>';

			htmlBank += '<div class="form-group">';
			htmlBank += '	<label for="bankrtnumber" class="col-sm-2 control-label">Routing Number</label> ';
			htmlBank += '	<div class="col-sm-10">';
			htmlBank += '		<input type="text" id="bankrtnumber' + paymentid + '" name="bankrtnumber' + paymentid + '" value="' + rtnumber + '" maxlength="10" required class="form-control required-number">';
			htmlBank += '	</div>';
			htmlBank += '</div>';
			htmlBank += '<div id="errorbankrtnumber' + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please enter valid bank routing number.</div>';

			htmlBank += '<div class="form-group">';
			htmlBank += '	<label for="bankacctnumber" class="col-sm-2 control-label">Account Number</label> ';
			htmlBank += '	<div class="col-sm-10">';
			htmlBank += '		<input type="text" id="bankacctnumber' + paymentid + '" name="bankacctnumber' + paymentid + '" value="' + acctnumber + '" maxlength="20" required class="form-control required-number">';
			htmlBank += '	</div>';
			htmlBank += '</div>';
			htmlBank += '<div id="errorbankacctnumber' + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please enter valid bank account number.</div>';

			htmlBank += '<div class="form-group">';
			htmlBank += '	<label for="bankaccttype" class="col-sm-2 control-label">Account Type</label> ';
			htmlBank += '	<div class="col-sm-10">';
			htmlBank += '		<input type="text" id="bankaccttype' + paymentid + '" name="bankaccttype' + paymentid + '" value="' + accttype + '" maxlength="20" required class="form-control" disabled>';
			htmlBank += '	</div>';
			htmlBank += '</div>';
			
			htmlBank += '<input type="hidden" id="paymenttype' + paymentid + '" value="bankaccount">';

			htmlBank += '<div class="form-group">';
			htmlBank += '	<div class="col-sm-offset-2 col-sm-10">';
			htmlBank += '<button id="' + paymentid + '" type="submit" class="savebutton btn btn-primary">Update</button> ';
			htmlBank += '<button id="' + paymentid + '" type="button" class="deletebutton btn btn-warning">Delete</button> ';
			htmlBank += '<button id="' + paymentid + '" type="button" class="cancelbutton btn btn-default">Cancel</button>';
			htmlBank += '	</div>';
			htmlBank += '</div>';

			htmlBank += '</form>';
			
			// Add the contents into the elements
			$("#bankaccounts").html(htmlBank);
		} 
		// For credit card
		else 
		{
			var htmlCard	= $("#creditcards").html();
			var paymentid 	= payments[i].PK_pmtmethod;
			var nameoncard 	= payments[i].nameoncard;
			var expmonth	= payments[i].expirationmonth;
			var expyear		= payments[i].expirationyear;
			var cardtype	= payments[i].creditcardtype;
			// Get Full credit card name
			var carddesc	= returnCardType(cardtype);


			// Link section
			htmlCard += '<div id="paymentlink' + paymentid + '" class="paymentlink">'
					+	'<img src="./images/card-' + cardtype + '.png">' 
					+	'<button type="button" class="btn btn-link">'
					+	carddesc + " ending in " + payments[i].creditcardlast4 + ' expiring ' + expmonth + '/' + expyear
					+ 	'</button>'
					+	'</div>';
					
			// Input section - Appears when click the link above
			htmlCard += '<form id="payment' + paymentid + '" method="get" action="#" style="display:none" class="form-horizontal">';

			htmlCard += '<div class="form-group">';
			htmlCard += '	<label for="nameoncard" class="col-sm-2 control-label">Name on Card</label> ';
			htmlCard += '	<div class="col-sm-10">';
			htmlCard += '		<input type="text" id="nameoncard' + paymentid + '" name="nameoncard' + paymentid + '" value="' + nameoncard + '" maxlength="40" required class="form-control required">';
			htmlCard += '	</div>';
			htmlCard += '</div>';
			htmlCard += '<div id="errornameoncard' + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please enter card holder name.</div>';

			htmlCard += '<div class="form-group">';
			htmlCard += '	<label for="cardexpiration" class="col-sm-2 control-label">Expiration Date</label> ';
			htmlCard += '	<div class="col-sm-5">';
			htmlCard += '		<select id="cardexpmonth' + paymentid + '" name="cardexpmonth' + paymentid + '" class="form-control required" required >' +
						'		<option value="">Month</option>' +
						'		<option value="01">1</option>'	+
						'		<option value="02">2</option>' 	+
						'		<option value="03">3</option>' 	+
						'		<option value="04">4</option>' 	+
						'		<option value="05">5</option>' 	+
						'		<option value="06">6</option>' 	+
						'		<option value="07">7</option>' 	+
						'		<option value="08">8</option>' 	+
						'		<option value="09">9</option>' 	+
						'		<option value="10">10</option>'	+
						'		<option value="11">11</option>'	+
						'		<option value="12">12</option>'	+
						'		</select>'					;
			htmlCard += '	</div>';
			htmlCard += '	<div class="col-sm-5">';
			htmlCard += '		<select id="cardexpyear' + paymentid + '" name="cardexpyear' + paymentid + '" class="form-control required" required >' 
					 +			expYearMenu 
					 +	'		</select>'					;
			htmlCard += '	</div>';
			htmlCard += '</div>';
			htmlCard += '<div id="errorcardexpmonth' + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please select expiration month of your credit card.</div>';
			htmlCard += '<div id="errorcardexpyear'  + paymentid + '" class="alert alert-warning" role="alert" style="display:none">Please select expiration year of your credit card.</div>';

			htmlCard += '<input type="hidden" id="paymenttype' + paymentid + '" value="creditcard">';

			htmlCard += '<div class="form-group">';
			htmlCard += '	<div class="col-sm-offset-2 col-sm-10">';
			htmlCard += '<button id="' + paymentid + '" type="submit" class="savebutton btn btn-primary">Update</button> ';
			htmlCard += '<button id="' + paymentid + '" type="button" class="deletebutton btn btn-warning">Delete</button> ';
			htmlCard += '<button id="' + paymentid + '" type="button" class="cancelbutton btn btn-default">Cancel</button>';
			htmlCard += '	</div>';
			htmlCard += '</div>';
			
			htmlCard += '</form>';

			// Add the contents into the elements
			$("#creditcards").html(htmlCard);
		}
	}

	// Unbind all text fields handler and bind them again
	bindingTextFields();

	$('.paymentlink').unbind("click");
	// Add a handler to show/hide a detailed payment information when clicked each payment
	$('.paymentlink').click(function() {

		var clickid = $(this).attr('id').substr(11);
		$('#payment'+clickid).toggle();

		return false;
	});

	$('.savebutton').unbind("click");
	// Add a handler to update a payment information when clicked 'Save' button
	$('.savebutton').click(function(event) {
		var clickid = $(this).attr('id');

		// Data variable for AJAX call 
		var send_data = "";
		// For bank account
		if (($('#paymenttype'+ clickid).val()) == "bankaccount") 
		{
			send_data = "srv=update_payment&format=json&paymentid=" + clickid + "&paymenttype=bankaccount"
					+ "&bankname=" + $('#bankname'+clickid).val() + "&bankrtnumber=" + $('#bankrtnumber'+clickid).val()
					+ "&bankacctnumber=" + $('#bankacctnumber'+clickid).val() + "&bankaccttype=" + $('#bankaccttype'+clickid).val();

			// Check bank account validation
			var errors = checkPaymentValidation('UPD_BANK', clickid);
		} 
		// For Credit Card
		else 
		{
			send_data = "srv=update_payment&format=json&paymentid=" + clickid + "&paymenttype=creditcard"
					+ "&cardname=" + $('#nameoncard'+clickid).val() + "&cardexpmonth=" + $('#cardexpmonth'+clickid).val()
					+ "&cardexpyear=" + $('#cardexpyear'+clickid).val();
					
			// Check credit card validation
			var errors = checkPaymentValidation('UPD_CC', clickid);
		}

		// Display errors when exist from validation process
		if (errors != null && errors != '') {
			// Display errors for Payment Validation
			alert (errors.join("\r\n"));
			return false;
		}

		// Call a web service to Update Bank Account or Credit Card
		$.ajax({
			type: "POST",
			url: "ws/webservice.php",
			data: send_data,
			dataType: "json",
		})
		.done(function(data) {
			parseUpdatePayment(data);
		})
		.fail(function(jqXHR, textStatus) {
			var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
			$("#rsErrorDiv").html(msg);
			$("#rsErrorDiv").show();
//			alert("Request failed: " + textStatus);
		})
		.always(function() { });

		return false;
	});

	$('.deletebutton').unbind("click");
	// Add a handler to delete a payment information when clicked 'Delete' button
	$('.deletebutton').click(function() {
		var clickid = $(this).attr('id');

		// Display confirmation pop-up
		var msg = "You selected to delete a payment, " + $("#paymentlink"+clickid).text() + "." 
				+ "\nDo you want to proceed?";
		if (confirm(msg) != true) {
			return false;
		}

		// Request data for AJAX call 
		var send_data = "srv=delete_payment&format=json&paymentid=" + clickid + "&status=deleted";

		// Call a web service to Update Bank Account or Credit Card
		$.ajax({
			type: "POST",
			url: "ws/webservice.php",
			data: send_data,
			dataType: "json",
		})
		.done(function(data) {
			parseDeletePayment(data);
		})
		.fail(function(jqXHR, textStatus) {
			var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
			$("#rsErrorDiv").html(msg);
			$("#rsErrorDiv").show();
//			alert("Request failed: " + textStatus);
		})
		.always(function() { });

		return false;
	});

	$('.cancelbutton').unbind("click");
	// Add a handler to hide a detailed payment information when clicked 'Cancel' button
	$('.cancelbutton').click(function() {
		var clickid = $(this).attr('id');
		$('#payment'+clickid).toggle();

		return false;
	});

	
}


/////////////////////////////////////////////////////////////////////////////////
//	Checking if the credit card or bank account information entered is valid
//  Returns error messages if there are any invalid information
/////////////////////////////////////////////////////////////////////////////////
function checkPaymentValidation(paymenttype, paymentid)
{
	var errors = [];

	// Check validation for Adding Credit Card
	if (paymenttype == "ADD_CC") 
	{
		var cardtype 	= $("#creditcardtype").val();
		var cardnumber 	= $("#cardnumber").val().trim();
		var nameoncard 	= $("#nameoncard").val().trim();

		if (cardtype == null || cardtype == '') {
			errors.push ("Select Credit Card Type");
		}
		if (cardnumber == null || cardnumber == '') {
			errors.push ("Enter Credit Card Number");
		} 

		if (cardtype != null && cardtype != '' && cardnumber != null && cardnumber != '') 
		{
			// Checking if the credit card information is valid with number and card type
			if (!checkCreditCard(cardnumber, cardtype)) {
				errors.push (ccErrors[ccErrorNo]);
			}
		}

		if (nameoncard == null || nameoncard == '') {
			errors.push ("Enter Credit Card Holder Name");
		}
		if ($("#cardexpmonth").val() == null || $("#cardexpmonth").val() == '') {
			errors.push ("Select Credit Card Expiration Month");
		}
		if ($("#cardexpyear").val() == null || $("#cardexpyear").val() == '') {
			errors.push ("Select Credit Card Expiration Year");
		}
	} 
	// Check validation for Adding Bank Account
	else if (paymenttype == "ADD_BA")  
	{
		var bankname	= $("#bankname").val().trim();
		var rtnumber	= $("#bankrtnumber").val().trim();
		var acctnumber	= $("#bankacctnumber").val().trim();
		
		if (bankname == null || bankname == '') {
			errors.push ("Enter Bank Name");
		}
		if (rtnumber == null || rtnumber == '') {
			errors.push ("Enter Routing Number");
		} else {
			// Checking if the bank routing information is valid with number 
			if (!checkNumber(rtnumber)) 
				errors.push (ccErrors[ccErrorNo]);
		}
		if (acctnumber == null || acctnumber == '') {
			errors.push ("Enter Account Number");
		} else {
			// Checking if the bank account information is valid with number 
			if (!checkBankAccount(acctnumber)) 
				errors.push (ccErrors[ccErrorNo]);
		}
		if ($("#bankaccttype").val() == null || $("#bankaccttype").val() == '') {
			errors.push ("Select Account Type");
		}
	} 
	// Check validation for Updating Bank Account or Credit Card
	else 
	{
		// Check validation for credit card
		if (paymenttype == "UPD_CC") 
		{
			var nameoncard 		= $("#nameoncard"+paymentid).val().trim();
			var cardexpmonth 	= $("#cardexpmonth"+paymentid).val();
			var cardexpyear 	= $("#cardexpyear"+paymentid).val();
			
			if (nameoncard == null || nameoncard == '') {
				errors.push ("Enter Credit Card Holder Name");
			}
			if (cardexpmonth == null || cardexpmonth == '') {
				errors.push ("Select Credit Card Expiration Month");
			}
			if (cardexpyear == null || cardexpyear == '') {
				errors.push ("Select Credit Card Expiration Year");
			}
		} 
		// Check validation for bank account
		else 
		{	
			var bankname 		= $("#bankname"+paymentid).val().trim();
			var bankrtnumber 	= $("#bankrtnumber"+paymentid).val().trim();
			var bankacctnumber 	= $("#bankacctnumber"+paymentid).val().trim();
			var bankaccttype	= $("#bankaccttype").val();
			
			if (bankname == null || bankname == '') {
				errors.push ("Enter Bank Name");
			}
			if (bankrtnumber == null || bankrtnumber == '') {
				errors.push ("Enter Routing Number");
			} else {
				// Checking if the bank routing information is valid with number 
				if (!checkNumber(bankrtnumber)) 
					errors.push (ccErrors[ccErrorNo]);
			}
			if (bankacctnumber == null || bankacctnumber == '') {
				errors.push ("Enter Account Number");
			} else {
				// Checking if the bank account information is valid with number 
				if (!checkBankAccount(bankacctnumber)) 
					errors.push (ccErrors[ccErrorNo]);
			}
			if (bankaccttype == null || bankaccttype == '') {
				errors.push ("Select Account Type");
			}
		}
	}
	
	return errors;	
}


var ccErrorNo = 0;
var ccErrors = [];
ccErrors[0] = "Unknown card type";
ccErrors[1] = "No card number provided";
ccErrors[2] = "Credit card number is in invalid format";
ccErrors[3] = "Credit card number is invalid";
ccErrors[4] = "Credit card number has an inappropriate number of digits";
ccErrors[5] = "Bank account number is in invalid format";
ccErrors[6] = "Bank routing number is in invalid format";

</script>

<?php endif; ?>


</body>

</html>
