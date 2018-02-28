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
			It will be back on 03:00 PM EST. <BR />
			Thanks for your patience while we continue to expand to better serve you!
		</h4>
	</div>
</div>


<div class="container" style="display:block">	
	<H2 class="heading-large">GIVE WITHOUT AN ACCOUNT</H2>
	<hr>

	<div id="rsErrorDiv" class="alert alert-danger" role="alert" style="display:none">
		Message for immediate attention.
	</div>	

	<?php if (!$logged_in) : ?>

	<input type="hidden" id="recurringid" name="recurringid" value="0">
<!--
	<div class="alert alert-warning" role="alert">
		All tithes and offerings go into one fund to resource ongoing ministry efforts, eliminate our building debt and fund church network expansion over a two-year period. <BR />
		Learn more at <a href="http://tippingpoint.northlandchurch.net">tippingpoint.northlandchurch.net</a>!
	</div>	
-->	
	<div class="alert alert-warning" role="alert">
		All tithes and offerings go into one fund to resource ongoing ministry efforts, eliminate our building debt and fund church network expansion. <BR />
	</div>	
	<div class="alert alert-success" role="alert" style="display:none">
		Want to support High school students Christmas Camp this year? <BR />
		Click <a href="https://giving.northlandchurch.net/donate/camp.php">HERE</a> to support! <BR />
		Click <a href="https://www.northlandchurch.net/christmascamp" target="_blank">HERE</a> to learn more!
	</div>	


	<div class="panel panel-info" style="display:block">
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
<!--						<span style="display:block">Click to support <a href="./donate-disaster.php">Disaster Response</a></span>	-->
						<span>Click to support <a href="./donate.php">Short Term Mission Trips</a></span><BR />
					</div>
				</div>

				<div class="form-group">				
					<label for="fund1amount" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fund1amount" 	name="fund1amount" placeholder="0.00" maxlength="10" aria-describedby="amount1HelpBlock">
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
					<label for="comments" class="col-sm-2 control-label">Comments</label>
					<div class="col-sm-10">
						<textarea id="comments" name="comments" class="form-control" maxlength="200"></textarea>
					</div>
				</div>

				<div class="form-group">				
					<label for="recaptch" class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
						<div class="g-recaptcha" data-sitekey="6LcS8xsTAAAAAGJAjisYd25WL0gVIHJheoJJgdBZ"></div>
					</div>
				</div>
	
				<div id="result-danger" class="alert alert-danger" role="alert" style="display:none">
					<p id="message-danger"></p>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" id="newgive" 		class="btn btn-primary">GIVE</button>
					</div>
				</div>
			
			</form>
		</div>
	</div>



	<div id="result" class="alert alert-success" role="alert" style="display:none">
		<p id="message"></p>
		<a href="./givenologin.php" id="gobacktogive" class="heading heading-l">Go Back to GIVE</a>
	</div>	
	
	
	<div class="alert alert-warning" role="alert">
		Please add an email address <a href='mailto:giving@northlandchurch.net'>giving@northlandchurch.net</a> into your email list to avoid spam. 
	</div>



	<?php else : ?>
	<!-- ////////////////////////////////////////////////////// -->
	<!-- 		Section for logged in user 					-->
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
// Recurring Gifts
var recurrings 	= [];
// Expiration Year Drop-down menu
var expYearMenu = "";
var message		= "";

$(document).ready(function () {

	// Adding Year drop-down menu dynamically
	expYearMenu = populateExpirationYearMenu();
	$("#cardexpyear").html(expYearMenu);

	// Adding Place of Worship drop-down menu 
	var place = populatePlaceOfWorship();
	$("#place").html(place);

	// Adding State drop-down menu
	var state = populateState();
	$("#addressstate").html(state);

	
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
//		console.log("Form submitted");

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


function clearGivingSection(_)
{
	// Reset all fields
	$("#fund1id").val(0);
	$("#fund1amount").val(0);
	$("#fund2id").val(0);
	$("#fund2amount").val(0);
	calculateTotalAmount();
	$("#frequency").val("ONETIME");
	$("#datepicker").datepicker('setDate', null);
	$("#scheduler").hide();
	$("#paymenttype").val("0");
	$("#comments").val("");
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
