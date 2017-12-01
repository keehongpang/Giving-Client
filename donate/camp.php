<?php
	include_once 'html_open.php';
?>

<?php
	if (isset($_GET['error'])) {
		$error = $_GET['error'];
		echo '<p><div id="loginError" class="alert alert-danger" role="alert">' . $error . '</div></p>';
	}

?> 

<div class="container" style="display:none">
	<br>
	<div class="alert alert-danger" role="alert">
		<h4>
			NOTE: The system is down for maintenance.<BR />
			It will be back on 02:00 PM EST. <BR />
			Thanks for your patience while we continue to expand to better serve you!
		</h4>
	</div>
</div>


<div class="container" style="display:block">	
	<H2 class="heading-large">SUPPORT CHRISTMAS CAMP</H2>
	<hr>

	<div id="rsErrorDiv" class="alert alert-danger" role="alert" style="display:none">
		Message for immediate attention.
	</div>	

	<?php if (!$logged_in) : ?>

<!--	<input type="hidden" id="recurringid" name="recurringid" value="0">	-->

	<div class="alert alert-warning" role="alert" style="display:none">
		All tithes and offerings go into one fund to resource ongoing ministry efforts, eliminate our building debt and fund church network expansion over a two-year period. <BR />
		Learn more at <a href="http://tippingpoint.northlandchurch.net">tippingpoint.northlandchurch.net</a>!
	</div>	


	<div class="panel panel-info">
		<div class="panel-heading">
			<H3 class="panel-title">Christmas Camp 2017</H3>
		</div>
		
		<div class="panel-body">

			<form id="givenow" method="get" action="#" class="form-horizontal">

				<div class="form-group">				
					<label for="gifttype" class="col-sm-2 control-label">Gift Type</label>
					<div class="col-sm-10">
						<select id="gifttype" name="gifttype" class="form-control">
							<option value="Camp">Christmas Camp</option>		
						</select>
						<br>
						<span>Go back to <a href="./givenologin.php">Give into General Giving</a></span>
					</div>
				</div>

				<div class="form-group" id="divcomments" style="display:none">				
					<label for="comments" class="col-sm-2 control-label">Name of person/trip</label>
					<div class="col-sm-10">
						<textarea id="comments" name="comments" class="form-control" maxlength="200">Support for Christmas Camp</textarea>
					</div>
				</div>

				<div class="form-group" style="display:none">				
					<label for="fund1amount" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fund1amount" 	name="fund1amount" placeholder="0.00" maxlength="10" >
						<input type="hidden" 					id="fund1id" 		name="fund1id" 		value="">
						<input type="hidden" 					id="fund1type" 		name="fund1type" 	value="GEN">
					</div>
				</div>
				<div id="errorfund1amount" 	class="alert alert-warning" role="alert" style="display:none">Please enter valid amount.</div>
				<div id="error1fund1amount" class="alert alert-warning" role="alert" style="display:none">Please enter more than $1.00.</div>

				<div class="form-group">				
					<label for="fund2amount" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fund2amount" 	name="fund2amount" 	placeholder="0.00" maxlength="10" >
						<input type="hidden" 					id="fund2id" 		name="fund2id" 		value="">
						<input type="hidden" 					id="fund2type" 		name="fund2type" 	value="MIS">
					</div>
					<label for="empty" class="col-sm-2 control-label"></label>
					<div class="col-sm-10"><span id="amount2HelpBlock" class="help-block">Type amount without $ sign (e.g. 10 or 10.50).</span></div>
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
<!--
							<option value="WEEKLY">Weekly</option>
							<option value="BIWEEKLY">Bi-Weekly</option>
							<option value="MONTHLY">Monthly</option>
-->
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
							<option value="creditcard">Credit Card</option>
							<option value="bankaccount">Bank Account</option>
						</select>
					</div>
				</div>

				
				<!-- Beginning of Adding Credit Card Section -->
				<div id="addcreditcard">
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
							<!-- Form of Bank Account -->
							<div class="form-group">				
								<div class="col-sm-offset-2 col-sm-10">
									<img src="../images/check-info.png">
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
				
				<!-- Beginning of My personal information Section -->
				<div id="personalinformation" style="display:block">
					<div class="panel panel-success">
						<div class="panel-heading">
							<H3 class="panel-title">Personal Information</H3>
						</div>
						
						<div class="panel-body">
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
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control required-email" id="email" name="email" placeholder="Email address" required maxlength="80">
								</div>			
							</div>
							<div id="erroremail" class="alert alert-warning" role="alert" style="display:none">Please enter valid email address.</div>

							<div class="form-group">				
								<label for="phone" class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-10">
									<input type="tel" class="form-control required-number" id="phone" name="phone" placeholder="Phone Number" required maxlength="20">
								</div>			
							</div>
							<div id="errorphone" class="alert alert-warning" role="alert" style="display:none">Please enter your valid phone number (numbers only).</div>
						</div>
					</div>

				</div>
				<!-- End of My personal information Section -->

				<div class="form-group">				
					<label for="place" class="col-sm-2 control-label">Place of Worship</label>
					<div class="col-sm-10">
						<select id="place" name="place" class="form-control required" required>
						</select>
					</div>
				</div>
				<div id="errorplace" class="alert alert-warning" role="alert" style="display:none">Please select your place of worship.</div>

				<div class="form-group">				
					<label for="recaptch" class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
						<div class="g-recaptcha" data-sitekey="6LcS8xsTAAAAAGJAjisYd25WL0gVIHJheoJJgdBZ"></div>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" id="newgive" 		class="btn btn-primary">GIVE</button>
					</div>
				</div>
			
			</form>
		</div>
	</div>

<!--	
	<a id="newGiving" href="#" title="Click here to create a new giving" style="display:none">Create a new Giving</a>
	<p></p>
-->
	<div id="result" class="alert alert-danger" role="alert" style="display:none">
		<p id="message"></p>
		<a href="./camp.php" id="gobacktogive" class="heading heading-l">Go Back to GIVE</a>
	</div>	
	
	<div id="result-danger" class="alert alert-danger" role="alert" style="display:none">
		<p id="message-danger"></p>
	</div>	

	<div class="alert alert-warning" role="alert">
		Please add an email address <a href='mailto:giving@northlandchurch.net'>giving@northlandchurch.net</a> into your email list to avoid spam. 
	</div>



	<?php else : ?>
	<!-- ////////////////////////////////////////////////////// -->
	<!-- 		Section for non-logged in user 					-->
	<!-- ////////////////////////////////////////////////////// -->
	<div class="alert alert-danger" role="alert" >
		<p>You are currently logged in Giving system. <BR />
		Please <a href="./logout.php">Logout</a> to give without an account. 
		</p>
	</div>
	
	<?php endif; ?>


</div>

<?php
	include_once 'html_footer.php';
?>

<?php if (!$logged_in) : ?>
	
<script>
'use strict';

///////////////////////////////////////////////////////////////////////
// 					Global variables
///////////////////////////////////////////////////////////////////////
// Payments
//var payments 	= [];
// Recurring Gifts
//var recurrings 	= [];
// Expiration Year Drop-down menu
var expYearMenu = "";
var message		= "";

/**
 * Get the value of a querystring
 * @param  {String} field The field to get the value of
 * @param  {String} url   The URL to get the value from (optional)
 * @return {String}       The field value
 */
var getQueryString = function ( field, url ) {
    var href = url ? url : window.location.href;
    var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
    var string = reg.exec(href);
    return string ? string[1] : null;
};

String.prototype.contains = function(it) { return this.indexOf(it) != -1; };


$(document).ready(function () {

/*
//	console.log("Search: " + window.location.search);
	if (getQueryString('name') != null)
	{
		var b_name	= getQueryString('name').toLowerCase();
		console.log("Name:" + b_name);

		if ((b_name.contains('cody') && b_name.contains('mcmurrin')) 
			|| (b_name.contains('alina') && b_name.contains('areopagita')) 
			|| (b_name.contains('emily') && b_name.contains('linton')) 
			|| (b_name.contains('bailey') && b_name.contains('mcdonald')) 
			|| (b_name.contains('alex') && b_name.contains('ramos')) 
			|| (b_name.contains('joshua') && b_name.contains('stockton')))
		{
			var html = "Thank you so much for your willingness to support this team member's mission trip to Ukraine. <BR>" +
					"This trip has been postponed and contributions to this trip have been suspended.<BR> Thank you.";
			$("#rsErrorDiv").html(html);
			$("#rsErrorDiv").show();
			$("#newgive").prop('disabled', true);
		}

	}
*/

	// Adding Year drop-down menu dynamically
	expYearMenu = populateExpirationYearMenu();
	$("#cardexpyear").html(expYearMenu);

	// Adding Place of Worship drop-down menu 
	var place = populatePlaceOfWorship();
	$("#place").html(place);

	// Adding State drop-down menu
	var state = populateState();
	$("#addressstate").html(state);

	// Change text when gift type changes to 'Missionaries / Short Term Trips / Christmas Camp'
	$("#gifttype").change(function() {
		var type 	= $("#gifttype").val();
		if (type == "Camp")
		{
			$("#comments").text("Support for Christmas Camp");
			$("#divcomments").hide();
		}
		else 
		{
			$("#comments").text("Support for ");
			$("#divcomments").show();
		}
	});

	
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

		if (type == "creditcard")
		{
			$("#addbankaccount").hide();
			$("#addcreditcard").show();
		}
		else if (type == "bankaccount")
		{
			$("#addcreditcard").hide();
			$("#addbankaccount").show();
		}
		else {
			$("#addcreditcard").hide();
			$("#addbankaccount").hide();
		}
	});

	
	// Trigger proper method based on the form clicked
	$("form").submit(function(event) {
		event.preventDefault();

		if ($("#g-recaptcha-response").val() == "")
		{
			var message = "The system can not verify that you're not a robot. <BR />Please check the checkbox to verify you're not a robot.";
			$("#message-danger").html(message);
			$("#result-danger").show();
				
			return false;
		}
			
		
		// Hide result messages
		$("#result").hide();
		$("#result-danger").hide();
		
		var frequency	= $("#frequency").val();
		switch($("#frequency").val()) {
			case "ONETIME":
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

	
});		// End for $(document).ready(


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
		return false;
	}
	
	// Distribution
	var totalamount	= parseFloat($("#totalamount").text()).toFixed(2);
	var amountGEN	= parseFloat($("#fund1amount").val());
	if (isNaN(amountGEN))
		amountGEN = 0;
	var amountMIS	= parseFloat($("#fund2amount").val());
	if (isNaN(amountMIS))
		amountMIS = 0;

	// Payment information
	var paymenttype = $("#paymenttype").val();
	var cardtype 	= "";
	var cardnumber 	= "";
	var nameoncard 	= "";
	var expmonth	= "";
	var expyear 	= "";
	var bankname	= "";
	var rtnumber	= "";
	var acctnumber	= "";
	var accttype	= "";
	if (paymenttype == "creditcard") {
		cardtype 	= $("#creditcardtype").val();
		cardnumber	= $("#cardnumber").val().trim();
		nameoncard	= $("#nameoncard").val().trim();
		expmonth	= $("#cardexpmonth").val();
		expyear		= $("#cardexpyear").val();
	}
	else 
	{
		bankname	= $("#bankname").val().trim();
		rtnumber	= $("#bankrtnumber").val().trim();
		acctnumber	= $("#bankacctnumber").val().trim();
		accttype	= $("#bankaccttype").val();
	}
	
	// Billing address
	var street 		= $("#addressstreet").val().trim();
	var city		= $("#addresscity").val().trim();
	var state		= $("#addressstate").val();
	var postal		= $("#addresszip").val().trim();
	
	// Personal information
	var firstname 	= $("#firstname").val().trim();
	var lastname	= $("#lastname").val().trim();
	var email		= $("#email").val().trim();
	var phone		= $("#phone").val().trim();
	var phonearea	= phone.substring(0,3);
	var phoneline	= phone.substring(3);
	var place		= $("#place").val();
	var comments	= $("#comments").val().trim();

	
	//////////////////////////////////////////
	// 		Process Onetime Giving			//
	//////////////////////////////////////////
	// Display confirmation pop-up
	var msg = "You selected to give now onetime with amount, $" + totalamount + "." 
			+ "\nDo you want to proceed?";

	if (confirm(msg) != true) {
		return false;
	}
	
	// Build a data to be sent for an Onetime giving
	var send_data = "";
	send_data = "srv=onetime_giving_nologin&format=json&amount=" + totalamount + "&fundcount=2" 
			+ "&fundtype0=GEN" + "&fundamount0=" + amountGEN + "&fundtype1=MIS" + "&fundamount1=" + amountMIS
			+ "&paymenttype=" + paymenttype + "&cardtype=" + cardtype  + "&cardnumber=" + cardnumber 
			+ "&nameoncard=" + nameoncard  + "&expmonth=" + expmonth  + "&expyear=" + expyear 
			+ "&bankname=" + bankname  + "&rtnumber=" + rtnumber  + "&acctnumber=" + acctnumber  + "&accttype=" + accttype 
			+ "&locationstreet=" + street + "&locationcity=" + city	+ "&locationstate=" + state + "&locationzip=" + postal
			+ "&firstname=" + firstname + "&lastname=" + lastname  + "&email=" + email  
			+ "&phonearea=" + phonearea + "&phoneline=" + phoneline
			+ "&worshipplace=" + place + "&comments=" + comments;

	// Call a web service for an Onetime Giving
	$.ajax({
		type: "POST",
		url: "../ws/webservice.php",
		data: send_data,
		dataType: "json",
	})
	.done(function(data) {
		parseOnetimeGivingNoLogin(data);
	})
	.fail(function(jqXHR, textStatus) {
		var msg = "Request failed: " + textStatus + ".<BR />Contact <a href='mailto:giving@northlandchurch.net'>Administrator</a>.";
		$("#result").html(msg);
		$("#result").show();
//			alert("Request failed: " + textStatus);
	})
	.always(function() { });

}


////////////////////////////////////////////////////////////////////////////////////////
//	Process Recurring Giving when clicked 'GIVE' or 'Save' button
////////////////////////////////////////////////////////////////////////////////////////
function processRecurringGiving()
{
	var msg = "Scheduling a gift for Mission Trip or Missionary is not supported.<BR />Contact <a href='mailto:giving@northlandchurch.net'>giving@northlandchurch.net</a>.";
	$("#result").html(msg);
	$("#result").show();

}


////////////////////////////////////////////////////////////////////////////////////////
//	Parsing Transaction response after onetime online giving in the system
////////////////////////////////////////////////////////////////////////////////////////
function parseOnetimeGivingNoLogin(data) 
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
			var message = "";
			if (transactions[0].statuscode == 'G') {
				// Add variables to send a confirmation email
				var email 		= $("#email").val();
				var firstname 	= $("#firstname").val();
				var lastname 	= $("#lastname").val();
				var amount 		= transactions[0].amount;
				var refno		= transactions[0].reference;

				var send_data = "";
				// Build a data to be sent to update a Recurring giving
				send_data = "firstname=" + firstname + "&lastname=" + lastname + "&email=" + email
						+ "&amount=" + amount + "&refno=" + refno;
						
				// Call web service to send an email
				$.ajax({
					type: "POST",
					url: "../mail/thankyou_onetime.php",
					data: send_data,
				})
				.done(function(data) {
					console.log(data);
				})
				.fail(function(jqXHR, textStatus) {
					alert("Fail: Please contact us at giving@northlandchurch.net\n" + textStatus);
				})
				.always(function() { });

				// Create a message for user
				message = "Thank you for giving $ " + amount 
					+ ".<BR />Your reference number is " + refno
					+ ".<BR />Please contact us at giving@northlandchurch.net if you have any question";
					
				$("#message").html(message);
				clearGivingSection();
				$("#givenow").hide()
				$("#result").show();
			} 
			else 
			{
				var error_code = (transactions[0].response).trim();
//				console.log("ERROR:" + error_code + ".");
				if (error_code == 'INVALID C_RTE')
				{
					message = "<span class='error'>Your giving has not been successful due to invalid routing number.<BR />"
						+ "Please check the routing number and try again.</span>";
				}
				else if (error_code == 'EXPIRED CARD')
				{
					message = "<span class='error'>Your giving has not been successful because of the expiration date.<BR />"
						+ "Please check the expiration date and try again.</span>";
				}
				else if ((error_code == 'CARD NO. ERROR') || (error_code == 'INVALID C_CARDNUMBER'))
				{
					message = "<span class='error'>Your giving has not been successful because of the invalid card number.<BR />"
						+ "Please check the card number and try again.<BR />"
						+ "Check your credit card provider if this error keeps happening.</span>";
				}
				else 
				{
					message = "<span class='error'>Your giving has not been successful.<BR />"
						+ "Please check your bank or credit card company and try again.</span>";
				}

				$("#message").html(message);
				$("#result").show();
			}

		}
	}
}



function clearGivingSection()
{
	// Hide 'Cancel Recurring' and 'Save' buttons
//	$("#cancel").hide();
//	$("#updategive").toggle();
	// Hide 'Create a New Giving' link
//	$("#newGiving").toggle();
	// Show 'GIVE' button
	$("#newgive").toggle();

	// Reset all fields
//	$("#recurringid").val(0);
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
	
	// Total amount validation
	var total	= parseFloat($("#totalamount").text()).toFixed(2);
	if (total == 0.00) {
		errors.push ("Enter at least $1.00 in the Amount");
	}
	
	// Start date validation in case it's a recurring giving
	if ($("#frequency").val() != "ONETIME") {
		var nextdate = $("#datepicker").val();
		if (nextdate == null || nextdate == '')
			errors.push ("Select Start date of the gift");
	}

	var paymenttype	= $("#paymenttype").val();
	// Check validation for Credit Card
	if (paymenttype == "creditcard") 
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
	else if (paymenttype == "bankaccount")  
	{
		var bankname	= $("#bankname").val().trim();
		var rtnumber	= $("#bankrtnumber").val().trim();
		var acctnumber	= $("#bankacctnumber").val().trim();
		
		if (bankname == null || bankname == '') {
			errors.push ("Enter bank name");
		}
		if (rtnumber == null || rtnumber == '') {
			errors.push ("Enter bank routing number");
		} else {
			// Checking if the bank routing information is valid with number 
			if (!checkNumber(rtnumber)) 
				errors.push (ccErrors[ccErrorNo]);
		}
		if (acctnumber == null || acctnumber == '') {
			errors.push ("Enter account number");
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

	// Address line validation
	var addressstreet = $("#addressstreet").val().trim();
	if ((addressstreet.length < 5))	{
		errors.push ("Enter a valid address.");
	}
	// City validation
	var addresscity = $("#addresscity").val().trim();
	if (addresscity.length < 3)	{
		errors.push ("Enter a valid city.");
	}
	// Postal code validation
	var addresszip = $("#addresszip").val().trim();
	if (addresszip.length < 3)	{
		errors.push ("Enter a valid postal code.");
	}

	var firstname	= $("#firstname").val().trim();
	var lastname	= $("#lastname").val().trim();
	var email		= $("#email").val().trim();
	var phone		= $("#phone").val().trim();
	// Name validation
	if (firstname.length < 1 || lastname.length < 1)	{
		errors.push ("Enter first and last name");
	}

	if (!validateEmail(email))
		errors.push ("Enter a valid email address");

	if (phone == "" || !checkNumber(phone))	{
		errors.push ("Enter your valid phone number");
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
