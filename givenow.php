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
	<H2 class="heading-large">GIVE NOW</H2>
	<hr>

	<div id="rsErrorDiv" class="alert alert-danger" role="alert" style="display:none">
		Message for immediate attention.
	</div>	

	<?php if ($logged_in) : ?>
	<!-- Hidden fields -->
	<div id="mypersonid" hidden></div>
	<div id="myaddressid" hidden></div>
	<div id="oldstreet" hidden></div>
	<div id="oldcity" hidden></div>
	<div id="oldstate" hidden></div>
	<div id="oldzip" hidden></div>
	<div id="mycid" hidden></div>
	<div id="firstname" hidden></div>
	<div id="lastname" hidden></div>
	<div id="myemail" hidden><?php echo $_SESSION['email'] ?></div>
	<div id="myscreenname" hidden><?php echo $_SESSION['screen_name'] ?></div>


	<input type="hidden" id="recurringid" name="recurringid" value="0">

	<div class="alert alert-warning" role="alert">
		All tithes and offerings go into one fund to resource ongoing ministry efforts, eliminate our building debt and fund church network expansion. <BR />
	</div>	
	<div class="alert alert-success" role="alert">
		Want to support High school students Christmas Camp this year? <BR />
		Click <a href="https://giving.northlandchurch.net/camp.php">HERE</a> to support! Then, select 'Christmas Camp' in Gift Type. <BR />
		Click <a href="https://www.northlandchurch.net/christmascamp" target="_blank">HERE</a> to learn more!
	</div>	


	<!-- Table for Scheduled Givings -->
	<div class="panel panel-info table-responsive">
		<div class="panel-heading">
			<H3 class="panel-title">Scheduled Givings</H3>
		</div>
		
<!--		<div class="panel-body">	-->
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Next Gift Date</th>
				<th>Amount</th>
				<th>Frequency</th>
				<th>Payment Type</th>
<!--				<th>Gift Type</th>	-->
				<th>Status</th>
				<th></th>
			</tr>
			</thead>
			<tbody id="recurrings">
			</tbody>
		</table>
<!--		</div>	-->
		<div class="alert alert-warning" role="alert" style="display:block">
			Click 'Edit' button to update/cancel your scheduled giving. Your giving displays below section. Click 'Save' button after you're done.
			<br>
			You can delete your scheduled giving by clikcing 'Cancel Recurring' button next to 'Save' button. 
		</div>	
	</div>	
	
	<a id="newGiving1" href="#" title="Click here to create a new giving" style="display:none">Click HERE to Create a new One-time or Scheduled Giving</a>
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<H3 class="panel-title">General Giving</H3>
		</div>
		
		<div class="panel-body">

			<form id="givenow" method="get" action="#" class="form-horizontal">

				<div class="form-group">				
					<label for="gifttype" class="col-sm-2 control-label">Gift Type</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="gifttype" 	name="gifttype" value="Tithes & Offerings" readonly>
						<br>
<!--						<span style="display:block">Click to support <a href="./give-disaster.php">Disaster Response</a></span>		-->
						<span>Click to support <a href="./mission.php">Short Term Mission Trips</a></span>
					</div>
				</div>

				<div class="form-group">				
					<label for="fund1amount" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fund1amount" 	name="fund1amount" placeholder="0.00" maxlength="10" >
						<input type="hidden" 					id="fund1id" 		name="fund1id" 		value="">
						<input type="hidden" 					id="fund1type" 		name="fund1type" 	value="GEN">
					</div>
					<label for="empty" class="col-sm-2 control-label"></label>
					<div class="col-sm-10"><span id="amount1HelpBlock" class="help-block">Type amount without $ sign (e.g. 10 or 10.50).</span></div>
				</div>
				<div id="errorfund1amount" 	class="alert alert-warning" role="alert" style="display:none">Please enter valid amount.</div>
				<div id="error1fund1amount" class="alert alert-warning" role="alert" style="display:none">Please enter more than $1.00.</div>
			
				<div class="form-group" style="display:none">				
					<label for="fund2amount" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fund2amount" name="fund2amount" placeholder="0.00" maxlength="10" >
						<input type="hidden" 					id="fund2id" 	name="fund2id" 		value="">
						<input type="hidden" 					id="fund2type" name="fund2type" 	value="MIS">
					</div>
				</div>
				<div id="errorfund2amount" 	class="alert alert-warning" role="alert" style="display:none">Please enter valid amount.</div>
				<div id="error1fund2amount" class="alert alert-warning" role="alert" style="display:none">Please enter more than $1.00.</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Total</label>
					<div class="col-sm-10">
						<p class="form-control-static">$ <span id="totalamount">0.00</span></p>
					</div>
				</div>	

				<div class="form-group">				
					<label for="frequency" class="col-sm-2 control-label">Frequency</label>
					<div class="col-sm-10">
						<select id="frequency" name="frequency" class="form-control">
							<option value="ONETIME">One-Time</option>
							<option value="WEEKLY">Weekly</option>
							<option value="BIWEEKLY">Bi-Weekly</option>
							<option value="MONTHLY">Monthly</option>
						</select>
					</div>
				</div>

				<div class="form-group" id="scheduler" style="display:none">				
					<label for="startdate" class="col-sm-2 control-label">Start Date?</label>
					<div class="col-sm-10">
						<input type="text" id="datepicker" class="form-control required">
					</div>
				</div>
				<div id="errordatepicker" class="alert alert-warning" role="alert" style="display:none">Please choose your start date of your recurring.</div>


				<!-- Beginning of Payment Information -->
				<div class="form-group">				
					<label for="paymenttype" class="col-sm-2 control-label">Payment Type</label>
					<div class="col-sm-10">
						<select id="paymenttype" name="paymenttype" class="form-control" title="Select your payment">
							<option value="ADD_CC">Add a new Credit Card</option>
							<option value="ADD_BA">Add a new Bank Account</option>
						</select>
					</div>
				</div>

				
				<!-- Beginning of Adding Credit Card Section -->
				<div id="addcreditcard" style="display:none">
					<div class="panel panel-success">
						<div class="panel-heading">
							<H3 class="panel-title">Credit Card</H3>
						</div>
						<div class="panel-body">
							<!-- Form of Credit Card -->
							<div class="form-group">				
								<label for="creditcardtype" class="col-sm-2 control-label">Card Type</label>
								<div class="col-sm-10">
									<select id="creditcardtype" name="creditcardtype" class="form-control required">
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
									<input type="text"  class="form-control required-creditcard" id="cardnumber" name="cardnumber" placeholder="Card Number" maxlength="20" >
								</div>
							</div>
							<div id="errorcardnumber" class="alert alert-warning" role="alert" style="display:none">Please enter valid credit card number.</div>

							<div class="form-group">				
								<label for="nameoncard" class="col-sm-2 control-label">Name on Card</label>
								<div class="col-sm-10">
									<input type="text"  class="form-control required" id="nameoncard" name="nameoncard" placeholder="Name on Card" maxlength="40" >
								</div>
							</div>
							<div id="errornameoncard" class="alert alert-warning" role="alert" style="display:none">Please enter card holder name.</div>

							<div class="form-group">				
								<label for="cardexpiration" class="col-sm-2 control-label">Expiration Date</label>
								<div class="col-sm-5">
									<select id="cardexpmonth" name="cardexpmonth" class="form-control required" >
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
									<select id="cardexpyear" name="cardexpyear" class="form-control required" ></select> 
								</div>
							</div>
							<div id="errorcardexpmonth" class="alert alert-warning" role="alert" style="display:none">Please select expiration month of your credit card.</div>
							<div id="errorcardexpyear" 	class="alert alert-warning" role="alert" style="display:none">Please select expiration year of your credit card.</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button id='addCardButton' type="button" class="btn btn-success">Save Credit Card</button> 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Adding Credit Card Section -->

				<!-- Beginning of Adding Bank Account Section -->
				<div id="addbankaccount" style="display:none">
					<div class="panel panel-success">
						<div class="panel-heading">
							<H3 class="panel-title">Bank Account</H3>
						</div>
						<div class="panel-body">
							<!-- Form of Credit Card -->
							<div class="form-group">				
								<div class="col-sm-offset-2 col-sm-10">
									<img src="./images/check-info.png">
								</div>
							</div>
								
							<div class="form-group">				
								<label for="bankname" class="col-sm-2 control-label">Bank Name</label>
								<div class="col-sm-10">
									<input type="text"  class="form-control required" id="bankname" name="bankname" placeholder="Bank Name" maxlength="20" >
								</div>
							</div>
							<div id="errorbankname" class="alert alert-warning" role="alert" style="display:none">Please enter your bank name.</div>

							<div class="form-group">				
								<label for="bankrtnumber" class="col-sm-2 control-label">Routing Number</label>
								<div class="col-sm-10">
									<input type="text"  class="form-control required-number" id="bankrtnumber" name="bankrtnumber" placeholder="Routing Number" maxlength="10" >
								</div>
							</div>
							<div id="errorbankrtnumber" class="alert alert-warning" role="alert" style="display:none">Please enter valid bank routing number.</div>

							<div class="form-group">				
								<label for="bankacctnumber" class="col-sm-2 control-label">Account Number</label>
								<div class="col-sm-10">
									<input type="text"  class="form-control required-number" id="bankacctnumber" name="bankacctnumber" placeholder="Account Number" maxlength="20" >
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
									<button id='addBankButton' type="button" class="btn btn-success">Save Bank Account</button> 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Adding Bank Account Section -->

				<!-- Beginning of My billing address Section -->
				<div id="billingaddress" style="display:block">
					<div class="panel panel-success">
						<div class="panel-heading">
							<H3 class="panel-title">Billing Address</H3>
						</div>
						<div class="panel-body">
						
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
						
						</div>
					</div>

				</div>
				<!-- End of My billing address Section -->
				
				<div class="form-group">				
					<label for="place" class="col-sm-2 control-label">Place of Worship</label>
					<div class="col-sm-10">
						<select id="place" name="place" class="form-control required" required>
						</select>
					</div>
				</div>
				<div id="errorplace" class="alert alert-warning" role="alert" style="display:none">Please select your place of worship.</div>

				<div class="form-group">				
					<label for="comments" class="col-sm-2 control-label">Comments</label>
					<div class="col-sm-10">
						<textarea id="comments" name="comments" class="form-control" maxlength="200"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" id="newgive" 		class="btn btn-primary">GIVE</button>
						<button type="submit" id="updategive" 	class="btn btn-primary" style="display:none">Save</button>
						<button type="button" id='cancel' 		class="btn btn-default" style="display:none">Cancel Recurring</button>
					</div>
				</div>
			
			</form>
		</div>
	</div>

	
	<a id="newGiving" href="#" title="Click here to create a new giving" style="display:none">Click HERE to Create a new One-time or Scheduled Giving</a>
	<p></p>


	<div id="result" class="alert alert-danger" role="alert" style="display:none">
		<p id="message"></p>
	</div>	
	
	<div id="resultsuccess" class="alert alert-success" role="alert" style="display:none">
		<p id="messagesuccess"></p>
	</div>	
	


	<div class="alert alert-warning" role="alert">
		Please add an email address <a href='mailto:giving@northlandchurch.net'>giving@northlandchurch.net</a> into your email list to avoid spam. 
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
var payments 	= [];
// Recurring Gifts
var recurrings 	= [];
// Expiration Year Drop-down menu
var expYearMenu = "";
var message		= "";

$(document).ready(function () {
	$('#navbar-give').addClass('active');
	
	var myemail 		= $("#myemail").text();
	var myscreenname 	= $("#myscreenname").text();

	// Adding Year drop-down menu dynamically
	expYearMenu = populateExpirationYearMenu();
	$("#cardexpyear").html(expYearMenu);

	// Adding Place of Worship drop-down menu 
	var place = populatePlaceOfWorship();
	$("#place").html(place);

	// Adding State drop-down menu
	var state = populateState();
	$("#addressstate").html(state);

	
	// Get User information by starting up
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=get_user_by_email&format=json&email="+myemail+"&screen_name="+myscreenname,
		dataType: "json",
	})
	.done(function(data) {
		parseGetUser(data);
		
		getPaymentsAndRecurrings();
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
	
/*
	// Get all Payments by starting up
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


	// Get all Recurring Gifts by starting up
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=get_recurring_giving&format=json&email="+myemail,
		dataType: "json",
	})
	.done(function(data) {
		parseGetRecurrings(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
*/
	
	// Show/Hide a date picker when giving frequency changes to 'Weekly / Bi-Weekly / Monthly'
	$("#frequency").change(function() {
		var freq 	= $("#frequency").val();
		if (freq == "WEEKLY" || freq == "BIWEEKLY" || freq == "MONTHLY")
		{
			$("#scheduler").show();
			$("#datepicker").datepicker({
				minDate: 0
			});
		}
		else 
		{
			$("#scheduler").hide();
			$("#errordatepicker").hide();
		}
	});

	// Show/Hide a bank account or credit card section
	$("#paymenttype").change(function() {
		var type 	= $("#paymenttype").val();

		if (type == "ADD_CC")
		{
			$("#addbankaccount").hide();
			$("#addcreditcard").show();
		}
		else if (type == "ADD_BA")
		{
			$("#addcreditcard").hide();
			$("#addbankaccount").show();
		}
		else {
			$("#addcreditcard").hide();
			$("#addbankaccount").hide();
		}
	});


	// Process adding a new credit card when clicked 'Add Credit Card' button
	$("#addCardButton").click(function() {
		// Check credit card validation
		var errors = checkPaymentValidation('ADD_CC');

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
			alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
		})
		.always(function() { });
	});
	
	// Process adding a new bank account when clicked 'Add Bank Account' button
	$("#addBankButton").click(function() {
		// Check bank account validation
		var errors = checkPaymentValidation('ADD_BA');

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
			alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
		})
		.always(function() { });

	});

	$("#newGiving").click(function() {
		
		clearGivingSection();
		
		return false;
	});

	$("#newGiving1").click(function() {
		
		clearGivingSection();
		
		return false;
	});
	
	// Trigger proper method based on the form clicked
	$("form").submit(function(event) {
		event.preventDefault();

		// Hide result messages
		$("#result").hide();
		$("#resultsuccess").hide();
		
		
		var frequency	= $("#frequency").val();
		switch($("#frequency").val()) {
			case "ONETIME":
				$("#newgive").prop('disabled', true);
				processOnetimeGiving();
				break;
			case "WEEKLY":
				processRecurringGiving();
				break;
			case "BIWEEKLY":
				processRecurringGiving();
				break;
			case "MONTHLY":
				processRecurringGiving();
				break;
			default:
				break;
		}
	});
	
	
	// Process to delete a Recurring giving when clicked 'Cancel Recurring' button
	$("#cancel").click(function() {
		// Hide result messages
		$("#result").hide();
		$("#resultsuccess").hide();
		
		var personid 	= $("#mypersonid").text();
		var comments	= $("#comments").val().trim();
		var recurringid = $("#recurringid").val();

		// Display confirmation pop-up
		var msg = "You selected to cancel your recurring.\nThis will remove your schedule from the system."
				+ "\nDo you want to proceed?";
			
		if (confirm(msg) != true) {
			return false;
		}

		// Build a data to be sent to delete a Recurring giving
		var send_data = "srv=delete_recurring_giving&format=json&recurringid=" + recurringid 
				+ "&personid=" + personid + "&comments=" + comments;
		// Call a web service to add a Recurring giving
		$.ajax({
			type: "POST",
			url: "ws/webservice.php",
			data: send_data,
			dataType: "json",
		})
		.done(function(data) {
			parseDeleteRecurringGiving(data);
		})
		.fail(function(jqXHR, textStatus) {
			var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
			$("#result").html(msg);
			$("#result").show();
//			alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
		})
		.always(function() { });
	});

	
});		// End for $(document).ready(


function getPaymentsAndRecurrings()
{
	var myemail 		= $("#myemail").text();

	// Get all Payments by starting up
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
	
	
	// Get all Recurring Gifts by starting up
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: "srv=get_recurring_giving&format=json&email="+myemail,
		dataType: "json",
	})
	.done(function(data) {
		parseGetRecurrings(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#rsErrorDiv").html(msg);
		$("#rsErrorDiv").show();
//		alert("Request failed: " + textStatus);
	})
	.always(function() { });
}

/////////////////////////////////////////////////////////////////////
//	Process Onetime Giving Transaction when clicked 'GIVE' 
/////////////////////////////////////////////////////////////////////
function processOnetimeGiving()
{
	// Validation checking for input variables
	var errors 	= checkGiveNowValidation();
	
	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		$("#newgive").prop('disabled', false);

		return false;
	}

	var myemail 	= $("#myemail").text();
	var personid 	= $("#mypersonid").text();
	var firstname 	= $("#firstname").text();
	var lastname	= $("#lastname").text();
	var paymentid	= $("#paymenttype").val();
	var totalamount	= parseFloat($("#totalamount").text()).toFixed(2);
	var amountGEN	= parseFloat($("#fund1amount").val());
	if (isNaN(amountGEN))
		amountGEN = 0;
	var amountMIS	= parseFloat($("#fund2amount").val());
	if (isNaN(amountMIS))
		amountMIS = 0;
	var comments	= $("#comments").val().trim();


	//////////////////////////////////////////
	// 		Process Onetime Giving			//
	//////////////////////////////////////////
	// Display confirmation pop-up
	var msg = "You selected to give now onetime with amount, $" + totalamount + "." 
			+ "\nDo you want to proceed?";

	if (confirm(msg) != true) {
		$("#newgive").prop('disabled', false);
		return false;
	}
	
	// Retrieve billing address information
	var addressid 	= $("#myaddressid").text();
	var street 		= $("#addressstreet").val().trim();
	var city 		= $("#addresscity").val().trim();
	var postal 		= $("#addresszip").val().trim();

	// Build a data to be sent for an Onetime giving
	var send_data = "";
	send_data = "srv=onetime_online_giving&format=json&email=" + myemail + "&paymentid=" + paymentid
			+ "&firstname=" + firstname + "&lastname=" + lastname + "&personid=" + personid
			+ "&amount=" + totalamount + "&fundcount=2" + "&fundtype0=GEN" + "&fundamount0=" + amountGEN
			+ "&fundtype1=MIS" + "&fundamount1=" + amountMIS
			+ "&addressid=" + addressid + "&locationstreet=" + street + "&locationcity=" + city
			+ "&locationstate=" + $("#addressstate").val() + "&locationzip=" + postal
			+ "&worshipplace=" + $("#place").val() + "&comments=" + comments;

	// Call a web service for an Onetime Giving
	$.ajax({
		type: "POST",
		url: "ws/webservice.php",
		data: send_data,
		dataType: "json",
	})
	.done(function(data) {
		parseOnetimeOnlineGiving(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#result").html(msg);
		$("#result").show();
//		alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
	})
	.always(function() { });
}


////////////////////////////////////////////////////////////////////////////////////////
//	Process Recurring Giving when clicked 'GIVE' or 'Save' button
////////////////////////////////////////////////////////////////////////////////////////
function processRecurringGiving()
{
	// Validation checking for input variables
	var errors 	= checkGiveNowValidation();
	
	// Display errors when exist from validation process
	if (errors != null && errors != '') {
		// Display errors for Payment Validation
		alert (errors.join("\r\n"));
		return false;
	}

	var personid 	= $("#mypersonid").text();
	var firstname 	= $("#firstname").text();
	var lastname	= $("#lastname").text();
	// Collecting Giving information
	var paymentid	= $("#paymenttype").val();
	var totalamount	= parseFloat($("#totalamount").text()).toFixed(2);
	var amountGEN	= parseFloat($("#fund1amount").val());
	if (isNaN(amountGEN))
		amountGEN = 0;
	var amountMIS	= parseFloat($("#fund2amount").val());
	if (isNaN(amountMIS))
		amountMIS = 0;
	var comments	= $("#comments").val().trim();

	// Collecting address information
	var addressid 		= $("#myaddressid").text();
	var billingline1 	= $("#addressstreet").val().trim();
	var billingcity 	= $("#addresscity").val().trim();
	var billingstate 	= $("#addressstate").val();
	var billingzip 		= $("#addresszip").val().trim();
	
	// Get frequency 
	var frequency	= $("#frequency").val();
	
	//////////////////////////////////////////
	// 		Process Recurring Giving		//
	//////////////////////////////////////////
	// Date.getFullYear:	Returns the year (four digits)
	// Date.getMonth(): 	Returns the month (from 0-11)
	// Date.getDate():		Returns the day of the month (from 1-31)
	// Date.getDay(): 		Returns the day of the week (from 0-6)
	var now			= new Date();
	var nowday		= now.getDay()+1;
	var nowdate		= now.getDate();
	var nowmonth	= now.getMonth()+1;
	var nowyear		= now.getFullYear();
	var selected 	= new Date($("#datepicker").val());
	var selday		= selected.getDay()+1;			// Add 1 in order to apply with recurring schedule (from 1-7)
	var seldate		= selected.getDate();
	var selmonth	= selected.getMonth()+1;
	var selyear		= selected.getFullYear();
	// Get this value to send in Web service
	var nextexecdate= selected.toJSON(); 
	
	// Display confirmation pop-up
	var msg = "You selected to schedule a gift $" + totalamount + " " + returnFrequency(frequency) + "."
			+ "\nYour gift will start on " + selmonth + "/" + seldate + "/" + selyear + "."
			+ "\nDo you want to proceed?";
	if (nowdate == seldate && nowmonth == selmonth && nowyear == selyear)
		msg += "\nIf your gift starts today, it will be processed tonight.";

/*
	$("#recurringmsg").html(msg);
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
*/

	if (confirm(msg) != true) {
		return false;
	}
	
	var recurringid = $("#recurringid").val();
	// Finding the payment info for this recurring from global payments array
	for(var i=0; i<payments.length; i++) {
		if (payments[i].PK_pmtmethod == paymentid)
			break;
	}
	// Store the payment type for this recurring (i.e. creditcard/bankaccount)
	var paymenttype = payments[i].paymenttype;
	
	var send_data = "";
	// Create a new recurring
	if (recurringid == 0) 
	{
		// Build a data to be sent to add a Recurring giving
		send_data = "srv=add_recurring_giving&format=json&personid=" + personid	+ "&paymentid=" + paymentid 
				+ "&paymenttype=" + paymenttype	+ "&amount=" + totalamount + "&fundcount=2" 
				+ "&fundtype0=GEN" + "&fundamount0=" + amountGEN
				+ "&fundtype1=MIS" + "&fundamount1=" + amountMIS 
				+ "&frequency=" + frequency + "&nextexecdate=" + nextexecdate + "&dayofmonth=" + seldate + "&dayofweek=" + selday 
				+ "&addressid=" + addressid + "&billingline1=" + billingline1 + "&billingcity=" + billingcity 
				+ "&billingstate=" + billingstate + "&billingzip=" + billingzip
				+ "&worshipplace=" + $("#place").val() + "&comments=" + comments;
				
		// Call a web service to add a Recurring giving
		$.ajax({
			type: "POST",
			url: "ws/webservice.php",
			data: send_data,
			dataType: "json",
		})
		.done(function(data) {
			parseAddRecurringGiving(data);
		})
		.fail(function(jqXHR, textStatus) {
			var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
			$("#result").html(msg);
			$("#result").show();
//			alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
		})
		.always(function() { });

	}
	// Update a recurring
	else 
	{
		var fund1id = $("#fund1id").val();
		var fund2id = $("#fund2id").val();
		// Build a data to be sent to update a Recurring giving
		send_data = "srv=update_recurring_giving&format=json&recurringid=" + recurringid + "&personid=" + personid
				+ "&paymentid=" + paymentid	+ "&paymenttype=" + paymenttype + "&amount=" + totalamount + "&fundcount=2" 
				+ "&fundid0=" + fund1id + "&fundtype0=GEN" + "&fundamount0=" + amountGEN
				+ "&fundid1=" + fund2id + "&fundtype1=MIS" + "&fundamount1=" + amountMIS 
				+ "&frequency=" + frequency + "&nextexecdate=" + nextexecdate + "&dayofmonth=" + seldate + "&dayofweek=" + selday 
				+ "&addressid=" + addressid + "&billingline1=" + billingline1 + "&billingcity=" + billingcity 
				+ "&billingstate=" + billingstate + "&billingzip=" + billingzip
				+ "&worshipplace=" + $("#place").val() + "&comments=" + comments;
				
		// Call a web service to update a Recurring giving
		$.ajax({
			type: "POST",
			url: "ws/webservice.php",
			data: send_data,
			dataType: "json",
		})
		.done(function(data) {
			parseUpdateRecurringGiving(data);
		})
		.fail(function(jqXHR, textStatus) {
			var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
			$("#result").html(msg);
			$("#result").show();
//			alert("Error: Please contact us at giving@northlandchurch.net\n" + textStatus);
		})
		.always(function() { });

	}

}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Transaction response after making Onetime Online giving in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseOnetimeOnlineGiving(data) 
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

		alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
	} 
	else 
	{
		var transactions = jsonObj.northland_api[2].response.transactions;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr = jsonObj.northland_api[2].response.error;
			var error_message = error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
		} 
		else 
		{
			var cid	= $("#mycid").text();
			if (cid != '') {
				// Send an email notification to Finanace for address change
				sendAddressChangeNotificaction();
			}
			
			
			if (transactions[0].statuscode == 'G') {
				message = "Thank you for giving $ " + transactions[0].amount + ".\nYour reference number is " + transactions[0].reference
					
				var email 		= $("#myemail").text();
				var firstname 	= $("#firstname").text();
				var lastname 	= $("#lastname").text();
				var amount 		= transactions[0].amount;
				var refno		= transactions[0].reference;

				var send_data = "";
				// Build a data to be sent 
				send_data = "firstname=" + firstname + "&lastname=" + lastname + "&email=" + email
						+ "&amount=" + amount + "&refno=" + refno;
						
				// Call web service to send an email
				$.ajax({
					type: "POST",
					url: "mail/thankyou_onetime.php",
					data: send_data,
				})
				.done(function(data) {
					alert(message);
					location.assign("myhistory.php");
				})
				.fail(function(jqXHR, textStatus) {
					alert("Error: " + textStatus + "\nPlease contact us at giving@northlandchurch.net");
				})
				.always(function() { });
				
			} 
			else 
			{
				var error_code = (transactions[0].response).trim();
//				console.log("ERROR:" + error_code + ".");
				if (error_code == 'INVALID C_RTE')
				{
					message = "Your giving has not been successful due to invalid routing number.<BR />"
						+ "Please check the routing number and try again.";
				}
				else if (error_code == 'EXPIRED CARD')
				{
					message = "Your giving has not been successful because of the expiration date.<BR />"
						+ "Please check the expiration date and try again.";
				}
				else if ((error_code == 'CARD NO. ERROR') || (error_code == 'INVALID C_CARDNUMBER'))
				{
					message = "Your giving has not been successful because of the invalid card number.<BR />"
						+ "Please check the card number and try again.<BR />"
						+ "Check your credit card provider if this error keeps happening.</span>";
				}
				else 
				{
					message = "Your giving has not been successful.<BR />"
						+ "Please check your bank or credit card company and try again.";
				}

				$("#message").html(message);
				$("#result").show();
				$("#newgive").prop('disabled', false);
			}

		}
	}
}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Recurring response after adding a recurring giving in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseAddRecurringGiving(data) 
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

		alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
	} 
	else 
	{
		var data = jsonObj.northland_api[2].response.recurrings;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr 		= jsonObj.northland_api[2].response.error;
			var error_message 	= error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
		} 
		// Display recurring information
		else 
		{
			// Add a new recurring into a global recurrings array
			recurrings[recurrings.length] = data[0];
			
			// Display this added recurring into the table
			displayRecurringInformation(data);
			
			
			var cid	= $("#mycid").text();
			if (cid != '') {
				// Send an email notification to Finanace for address change
				sendAddressChangeNotificaction();
			}
			
			
			// Add variables to send a confirmation email
			var email 		= $("#myemail").text();
			var firstname 	= $("#firstname").text();
			var lastname 	= $("#lastname").text();
			var amount 		= data[0].amount;
			var frequency	= returnFrequency(data[0].frequency);
			var date		= data[0].nextexecdate;
			var nextdate	= date.substring(5, 7) + "/" + date.substring(8, 10) + "/" + date.substring(0, 4);

			message 	= "Thank you for scheduling $ " + amount + " " + frequency + ".";

			var send_data = "";
			// Build a data to be sent to update a Recurring giving
			send_data = "firstname=" + firstname + "&lastname=" + lastname + "&email=" + email
					+ "&amount=" + amount + "&frequency=" + frequency + "&nextexecdate=" + nextdate;
					
			// Call web service to send an email
			$.ajax({
				type: "POST",
				url: "mail/thankyou_recurring.php",
				data: send_data,
			})
			.done(function(data) {
				alert(message);
				location.assign("myhistory.php");
			})
			.fail(function(jqXHR, textStatus) {
				alert("Error: " + textStatus + "\nPlease contact us at giving@northlandchurch.net");
			})
			.always(function() { });
			
		}

	}
}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Recurring response after updating a recurring giving in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseUpdateRecurringGiving(data) 
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

		alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
	} 
	else 
	{
		var data = jsonObj.northland_api[2].response.recurrings;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr 		= jsonObj.northland_api[2].response.error;
			var error_message 	= error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
		} 
		// Display recurring information
		else 
		{
			// Finding a recurring to update
			for (var i=0; i<recurrings.length; i++) 
			{
				if (recurrings[i].PK_recurringtxn == data[0].PK_recurringtxn)
					break;
			}
			// Remove an old recurring and add a just updated one 
			recurrings.splice(i, 1, data[0]);

			var recurringid = data[0].PK_recurringtxn;
			var totalamount	= data[0].amount;
			var frequency	= returnFrequency(data[0].frequency);
			var date		= data[0].nextexecdate;
			// Make next exec date for display (i.e. MM/DD/YYYY)
			var nextdate	= date.substring(5, 7) + "/" + date.substring(8, 10) + "/" + date.substring(0, 4);

			// Make Payment type for display (i.e. Visa xxxx)
			if (data[0].paymenttype == "creditcard") 
			{
				var cardname 	= returnCardType(data[0].cardtype);
				var paymentinfo = cardname + " " + data[0].cardlast4;
			} 
			else 
			{
				var paymentinfo = data[0].bankname + " " + data[0].banklast4;
			}

			// Get the updated recurring text
			var html = $("#recurring" + recurringid).html();

			// Assemble one recurring in a table
			html = "<td >" + nextdate + "</td>"
				+ "<td >$ " + totalamount + "</td>"
				+ "<td >" + frequency + "</td>"
				+ "<td >" + paymentinfo + "</td>"
				+ "<td >" + data[0].status + "</td>"
				+ "<td><button id='" + recurringid + "' type='button' onclick='fillRecurring(this);' class='btn btn-info'>Edit</button></td>";

			// Update the recurring text
			$("#recurring" + recurringid).html(html);

			// Add more variables to send a confirmation email
			var email 		= $("#myemail").text();
			var firstname 	= $("#firstname").text();
			var lastname 	= $("#lastname").text();

//			alert("Successfully Updated!\nThank you for scheduling $ " + totalamount + " " + frequency + ".");
			var message = "Successfully Updated!<BR />Thank you for scheduling $ " + totalamount + " " + frequency + ".";
			$("#messagesuccess").html(message);
			$("#resultsuccess").show();
			
			
			var cid	= $("#mycid").text();
			if (cid != '') {
				// Send an email notification to Finanace for address change
				sendAddressChangeNotificaction();
			}
			
			
			var send_data = "";
			// Build a data to send an email to update a Recurring giving
			send_data = "firstname=" + firstname + "&lastname=" + lastname + "&email=" + email
					+ "&amount=" + totalamount + "&frequency=" + frequency + "&nextexecdate=" + nextdate;
					
			// Call web service to send an email
			$.ajax({
				type: "POST",
				url: "mail/thankyou_recurring.php",
				data: send_data,
			})
			.done(function(data) {
				console.log(data);
			})
			.fail(function(jqXHR, textStatus) {
				alert("Error: " + textStatus + "\nPlease contact us at giving@northlandchurch.net");
			})
			.always(function() { });

			clearGivingSection();
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Recurring response after deleting a recurring giving in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseDeleteRecurringGiving(data) 
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

		alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
	} 
	else 
	{
		var data = jsonObj.northland_api[2].response.recurrings;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr 		= jsonObj.northland_api[2].response.error;
			var error_message 	= error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert("Error: Please contact us at giving@northlandchurch.net\n" + error_message);
		} 
		// Display recurring information
		else 
		{
			var recurringid = data[0].PK_recurringtxn;

			// Finding a recurring to update
			for (var i=0; i<recurrings.length; i++) 
			{
				if (recurrings[i].PK_recurringtxn == recurringid)
					break;
			}

			var totalamount	= recurrings[i].amount;
			var frequency	= returnFrequency(recurrings[i].frequency);

			// Show success message to the browser
			var message = "Your " + frequency + " recurring gift, $ " + totalamount + " successfully cancelled.";
			$("#messagesuccess").html(message);
			$("#resultsuccess").show();

			// Remove an old recurring from the global recurrings array
			recurrings.splice(i, 1);

			// Remove the updated recurring text
			$("#recurring" + recurringid).html("");

			clearGivingSection();
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
	
	var name		= $("#firstname").text() + " " + $("#lastname").text();
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
			console.log("A notification sent");
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


function clearGivingSection(_)
{
	// Hide 'Cancel Recurring' and 'Save' buttons
	$("#cancel").hide();
	$("#updategive").toggle();
	// Hide 'Create a New Giving' link
	$("#newGiving").toggle();
	$("#newGiving1").toggle();
	// Show 'GIVE' button
	$("#newgive").toggle();

	// Reset all fields
	$("#recurringid").val(0);
	$("#fund1id").val(0);
	$("#fund1amount").val(0);
	$("#fund2id").val(0);
	$("#fund2amount").val(0);
	calculateTotalAmount();
	$("#frequency").val("ONETIME");
	$("#datepicker").datepicker('setDate', null);
	$("#scheduler").toggle();
	$("#paymenttype").prop('selectedIndex', 0);
	$("#comments").val("");
	
}


///////////////////////////////////////////////////////////////////////////
//	Parsing Recurring gifts and display on the browser
///////////////////////////////////////////////////////////////////////////
function parseGetRecurrings(data) 
{ 
	var jsonObj 	= $.parseJSON(data);
	
	var error_len 	= jsonObj.northland_api[1].errors.length;
	// Error handling for the request
	if (error_len > 0) 
	{
		var error_arr 		= jsonObj.northland_api[1].errors;
		var error_message 	= '';
		for (var i=0; i<error_len; i++)
			error_message  += error_arr[i].number + ": " + error_arr[i].type + " - " + error_arr[i].message + "\n";
		alert (error_message);
	} 
	else 
	{
		recurrings = jsonObj.northland_api[2].response.recurrings;

		// Error handling
		if (jsonObj.northland_api[2].response.error != null) 
		{
			var error_arr 		= jsonObj.northland_api[2].response.error;
			var error_message 	= error_arr.number + ": " + error_arr.type + " - " + error_arr.message ;
			alert (error_message);
		} 
		// Display recurring information
		else 
		{
			// Display this recurring gifts into the table
			displayRecurringInformation(recurrings);
		}

	}
}


///////////////////////////////////////////////////////////////////
// 		Display recurring information into the table
///////////////////////////////////////////////////////////////////
function displayRecurringInformation(data)
{
	// Get recurring information in the table
	var html = $("#recurrings").html();

	for(var i=0; i<data.length; i++) 
	{
		var recurringid = data[i].PK_recurringtxn;
		var totalamount	= data[i].amount;
		var frequency	= returnFrequency(data[i].frequency);
		var date		= data[i].nextexecdate;
		// Make next exec date for display (i.e. MM/DD/YYYY)
		var nextdate	= date.substring(5, 7) + "/" + date.substring(8, 10) + "/" + date.substring(0, 4);

		// Make Payment type for display
		if (data[i].paymenttype == "creditcard") 
		{
			// i.e. Visa xxxx
			var cardname 	= returnCardType(data[i].cardtype);
			var paymentinfo = cardname + " " + data[i].cardlast4;
		} 
		else 
		{
			// i.e. BoA xxxx
			var paymentinfo = data[i].bankname + " " + data[i].banklast4;
		}

		
		// Assemble one recurring in a table
		html += "<tr id='recurring" + recurringid +"'>"
			+ "<td >" + nextdate + "</td>"
			+ "<td >$ " + totalamount + "</td>"
			+ "<td >" + frequency + "</td>"
			+ "<td >" + paymentinfo + "</td>"
			+ "<td >" + data[i].status + "</td>"
			+ "<td><button id='" + recurringid + "' type='button' onclick='fillRecurring(this);' class='btn btn-info'>Edit</button></td>"
			+ "</tr>";

	}
	
	// Display recurring information in the table
	$("#recurrings").html(html);
}


///////////////////////////////////////////////////////////////////////////
// Fill the recurring information into the input section 
// when user clicks 'Edit' button from each recurring
///////////////////////////////////////////////////////////////////////////
function fillRecurring(el)
{
	// Hide result messages
	$("#result").hide();
	$("#resultsuccess").hide();
	
	// Hide 'GIVE' button
	$("#newgive").hide();
	// Show 'Create a New Giving' link
	$("#newGiving").show();
	$("#newGiving1").show();
	// Show 'Save' button
	$("#updategive").show();
	// Show 'Cancel Recurring' button
	$("#cancel").show();
	
	var recurringid = $(el).attr('id');
	$("#recurringid").val(recurringid);

	// Finding a referred recurring from global recurring givings
	for (var i=0; i<recurrings.length; i++)
	{
		if (recurringid == recurrings[i].PK_recurringtxn)
			break;
	}
			
	// Assign Payment in the drop-down menu
	$("#paymenttype").val(recurrings[i].FK_pmtmethod);

	var dists = recurrings[i].dists;
	// Display each distribution
	for (var j=0; j<dists.length; j++)
	{
		var fundtype = dists[j].fundtype;

		switch(fundtype) {
			case "GEN":
				$("#fund1id").val(dists[j].PK_dist);
				$("#fund1amount").val(dists[j].amount);
				break;
			case "MIS":
				$("#fund2id").val(dists[j].PK_dist);
				$("#fund2amount").val(dists[j].amount);
				break;
			default:
				break;
		}
	}
	
	// Calculate total amount and display it
	calculateTotalAmount();
	// Assign Recurring frequency in the drop-down menu
	var frequency = recurrings[i].frequency;
	$("#frequency").val(frequency);

	var date		= recurrings[i].nextexecdate;
	// Make next exec date for display (i.e. MM/DD/YYYY)
	var nextdate	= date.substring(5, 7) + "/" + date.substring(8, 10) + "/" + date.substring(0, 4);
	// Show date picker and assign the next giving date 
	$("#scheduler").show();
	$("#datepicker").datepicker({
		minDate: 0
	});
	$("#datepicker").datepicker('setDate', nextdate);

	// Assign Place of worship in the drop-down menu
	$("#place").val(recurrings[i].placeofworship);
	$("#comments").val(recurrings[i].comments);

}


///////////////////////////////////////////////////////////////////////////
//	Parsing User information and display on the browser
///////////////////////////////////////////////////////////////////////////
function parseGetUser(data) 
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
			// Store user information into hidden DOM for future use
			$("#mypersonid").text(user[0].PK_person);
			$("#myaddressid").text(user[0].PK_address);
			$("#firstname").text(user[0].firstname);
			$("#lastname").text(user[0].lastname);
			$("#mycid").text(user[0].cid);

			$("#addressstreet").val(user[0].billingline1);
			$("#addresscity").val(user[0].billingcity);
			$("#addresszip").val(user[0].billingzip);
//			$("#addressstate").val(user[0].billingstate);
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

			// Store address info into hidden DOM 
			$("#oldstreet").text(user[0].billingline1);
			$("#oldcity").text(user[0].billingcity);
			$("#oldzip").text(user[0].billingzip);
			
/*			
			// If the address is not long enough, then show the address fields
			var addressstreet = $("#addressstreet").val().toUpperCase();
			if ((addressstreet == "NA") || (addressstreet.length < 5))	{
//				console.log("Address info needed");
				$("#billingaddress").toggle();
			}
*/			
		}
	}
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
			} 
			else 
			{
				// clear all fields in addcreditcard DIV
				clearAddCreditCardFields();
				// hide addcreditcard DIV
				$("#addcreditcard").toggle();

			}
		}
	}		

}


////////////////////////////////////////////////////////////////////////////////////////
//	Parse payment information and prepend in the "Payment Method" drop-down menu
////////////////////////////////////////////////////////////////////////////////////////
function displayPaymentInformation(payments)
{
	var htmlEntity	= "";

	for(var i=0; i<payments.length; i++) {
		htmlEntity +=  '<option value="' + payments[i].PK_pmtmethod+ '">';

		if (payments[i].paymenttype == 'bankaccount') 
		{
			var bankname	= payments[i].bankname;
			if ((!bankname) || (bankname.trim() == ""))
				bankname = "Bank Account";
			
			htmlEntity +=  bankname + " - " + payments[i].acctnumlast4 + "</option>";
		} 
		else 
		{
			// Get Full credit card name
			var cardtype = payments[i].creditcardtype;
			var carddesc = returnCardType(cardtype);
			htmlEntity 	+= carddesc + " " + payments[i].creditcardlast4 + " - " + payments[i].expirationmonth + "/" + payments[i].expirationyear + "</option>";
		}
	}

	$("#paymenttype").prepend(htmlEntity);
	$("#paymenttype").prop('selectedIndex', 0);
	
	// If there is no payment, then show credit card section as a default
	if ($("#paymenttype").val() == "ADD_CC")
	{
		$("#addcreditcard").show();
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


///////////////////////////////////////////////////////////////////////////
//  	Calculate total amount and display it
///////////////////////////////////////////////////////////////////////////
function calculateTotalAmount()
{
	var titheAmt	= $("input[name=fund1amount]").val();
	var generalAmt	= $("input[name=fund2amount]").val();

	if (titheAmt == "") 
		titheAmt = 0;
	
	if (generalAmt == "")
		generalAmt = 0;

	// Convert the amount to float number with 2 decimal points
	titheAmt	= parseFloat(parseFloat(titheAmt).toFixed(2));
	generalAmt	= parseFloat(parseFloat(generalAmt).toFixed(2));
	
	var tatalAmount	= titheAmt + generalAmt;

	$("#totalamount").html(tatalAmount.toFixed(2));
}


////////////////////////////////////////////////////////////////////////////////////////
//	Checking if the credit card or bank account information entered is valid
//  Returns error messages if there are any invalid information
////////////////////////////////////////////////////////////////////////////////////////
function checkGiveNowValidation()
{
	var errors = [];

	// Start date validation in case it's a recurring giving
	if ($("#frequency").val() != "ONETIME") {
		var nextdate = $("#datepicker").val();
		if (nextdate == null || nextdate == '')
			errors.push ("Select Start date of the gift");
	}
	
	// Payment validation
	var paymentid 	= $("#paymenttype").val();
	if (paymentid == null || paymentid == '' || paymentid == 0) {
		errors.push ("Select Payment Method");
	}
	
	if (paymentid == "ADD_CC") {
		errors.push ("Save Your Credit Card information First!");
	}
	if (paymentid == "ADD_BA") {
		errors.push ("Save Your Bank Account information First!");
	}
	
	// Place of Worship vlidation
	var place		= $("#place").val();
	if (place == null || place == '') {
		errors.push ("Select Place of Worship");
	}

	// Total amount validation
	var total		= parseFloat($("#totalamount").text()).toFixed(2);
	if (total == 0.00) {
		errors.push ("Enter at least $1 in the Distribution");
	}
	
	// Address line validation
	var addressstreet = $("#addressstreet").val().trim();
	if (addressstreet.length < 5)	{
		errors.push ("Enter a valid address");
	}

	// City validation
	var addresscity = $("#addresscity").val().trim();
	if (addresscity.length < 3)	{
		errors.push ("Enter a valid city");
	}

	// Postal code validation
	var addresszip = $("#addresszip").val().trim();
	if (addresszip.length < 3)	{
		errors.push ("Enter a valid postal code");
	}
	
	return errors;	
}


///////////////////////////////////////////////////////////////////////////
//	Checking if the credit card or bank account information entered is valid
//  Returns error messages if there are any invalid information
///////////////////////////////////////////////////////////////////////////
function checkPaymentValidation(paymenttype)
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
	else 
	{
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
ccErrors[6] = "Enter valid number format";

</script>

<?php endif; ?>


</body>

</html>
