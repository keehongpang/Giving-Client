///////////////////////////////////////////////////////////////////////////
//			General Form Validation 
///////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
	// Required validation check when text field entered
	$("input[type='text'].required").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');
		
		if (value == '')
			$("#error"+valueid).show();
		else 
			$("#error"+valueid).hide();
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	// Required and number validation check when text field entered
//	$("input[type='text'].required-number").keyup(function() {
	$(".required-number").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if ((checkNumber(value)===true) && (value != '')){
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	// Required and number validation check when text field entered
	$("input[type='text'].required-bankaccount").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if ((checkBankAccount(value)===true) && (value != '')){
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	// Required and number validation check when text field entered
	$("input[type='text'].required-creditcard").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');
		// Retrieve credit card type
		var cardtype	= $("#creditcardtype").val();

		if ((checkCreditCard(value, cardtype)===true) && (value != '')){
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	// Required validation check when choosing select option
	$("select.required").change(function() {
		// Get the value of the select and ID
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if (value != '') {
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	});

	// Email validation check when text field entered
//	$("input[type='text'].required-email").keyup(function() {
	$(".required-email").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if (validateEmail(value) === true) {
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});

	// Process the giving amount for TITHE
	$("input[name=fund1amount]").change(function() {
		// Get the text input ID 
		var valueid 	= $(this).attr('id');

		// Replace ','(comma) to the empty string
		var str_amount 	= ($(this).val()).replace(",", "");
		// Convert the amount to float number with 2 decimal points
		var f_amount	= parseFloat(str_amount).toFixed(2);

		$("#error"+valueid).hide();
		$("#error1"+valueid).hide();
		
		// Amount validation checking
		if (isNaN(f_amount)) {
			$("#"+valueid).val("0.00");
			$("#error"+valueid).show();
			f_amount	= 0.00;
		}
		if ((f_amount < 1.00 && f_amount > 0.00) || f_amount < 0.00) {
			$("#"+valueid).val("0.00");
			$("#error1"+valueid).show();
			f_amount	= 0.00;
		}
		
		// Record formatted amount into the text field
		$(this).val(f_amount);
		
		calculateTotalAmount();
	});
	
	// Process the giving amount for GENERAL
	$("input[name=fund2amount]").change(function() {
		// Get the text input ID 
		var valueid 	= $(this).attr('id');

		// Replace ','(comma) to the empty string
		var str_amount 	= ($("input[name=fund2amount]").val()).replace(",", "");
		// Convert the amount to float number with 2 decimal points
		var f_amount	= parseFloat(str_amount).toFixed(2);

		$("#error"+valueid).hide();
		$("#error1"+valueid).hide();
		
			// Amount validation checking
		if (isNaN(f_amount)) {
			$("#"+valueid).val("0.00");
			$("#error"+valueid).show();
			f_amount	= 0.00;
		}
		if ((f_amount < 1.00 && f_amount > 0.00) || f_amount < 0.00) {
			$("#"+valueid).val("0.00");
			$("#error1"+valueid).show();
			f_amount	= 0.00;
		}

		// Record formatted amount into the text field
		$("input[name=fund2amount]").val(f_amount);

		calculateTotalAmount();
	});
	
});

///////////////////////////////////////////////////////////////////////////
//  	Unbind the input fields and bind them again 
///////////////////////////////////////////////////////////////////////////
function bindingTextFields()
{
	$("input[type='text'].required").unbind("keyup");
	// Required validation check when text field entered
	$("input[type='text'].required").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');
		
		if (value == '')
			$("#error"+valueid).show();
		else 
			$("#error"+valueid).hide();
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	$("input[type='text'].required-number").unbind("keyup");
	// Required and number validation check when text field entered
	$("input[type='text'].required-number").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if ((checkNumber(value)===true) && (value != '')){
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	$("input[type='text'].required-bankaccount").unbind("keyup");
	// Required and number validation check when text field entered
	$("input[type='text'].required-bankaccount").keyup(function() {
		// Get the value of the text input and ID 
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if ((checkBankAccount(value)===true) && (value != '')){
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	}).keydown(function(event) {
		if ( event.which == 13 ) {
			event.preventDefault();
		}
	});
	
	$("select.required").unbind("change");
	// Required validation check when choosing select option
	$("select.required").change(function() {
		// Get the value of the select and ID
		var value		= $(this).val().trim();
		var valueid 	= $(this).attr('id');

		if (value != '') {
			$("#error"+valueid).hide();
		} else {
			$("#error"+valueid).show();
		}
	});
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


///////////////////////////////////////////////////////////////////////////
//			Email validation 
///////////////////////////////////////////////////////////////////////////
function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

	return re.test(email);
}
/*
///////////////////////////////////////////////////////////////////////////
//	Keep below variables in each source code for reference
///////////////////////////////////////////////////////////////////////////
var ccErrorNo = 0;
var ccErrors = [];
ccErrors[0] = "Unknown card type";
ccErrors[1] = "No card number provided";
ccErrors[2] = "Credit card number is in invalid format";
ccErrors[3] = "Credit card number is invalid";
ccErrors[4] = "Credit card number has an inappropriate number of digits";
ccErrors[5] = "Bank account number is in invalid format";
ccErrors[6] = "Enter valid number format";
*/


///////////////////////////////////////////////////////////////////////////
//	Check if the field contains numbers
///////////////////////////////////////////////////////////////////////////
function checkNumber(value) 
{
	// Check that the number is numeric
	var valueexp = /^[0-9]{1,19}$/;
	if (!valueexp.exec(value))  {
		ccErrorNo = 6;
		return false; 
	}

	return true;
}


///////////////////////////////////////////////////////////////////////////
//	Check if the field contains bank account with at least 5 numbers
///////////////////////////////////////////////////////////////////////////
function checkBankAccount (acctnumber) 
{
	// Check that the number is numeric
	var acctNo = acctnumber;
	var acctexp = /^[0-9]{5,19}$/;
	if (!acctexp.exec(acctNo))  {
		ccErrorNo = 5;
		return false; 
	}

	return true;
}


///////////////////////////////////////////////////////////////////////////
//	Check if the credit card is valid
///////////////////////////////////////////////////////////////////////////
function checkCreditCard (cardnumber, cardname) 
{
	// Array to hold the permitted card characteristics
	var cards = [];

	// Define the cards we support. You may add additional card types.

	//  Name:      As in the selection box of the form - must be same as user's
	//  Length:    List of possible valid lengths of the card number for the card
	//  prefixes:  List of possible prefixes for the card
	//  checkdigit Boolean to say whether there is a check digit

	cards[0] = {name: "VISA", 
				length: "13,16", 
				prefixes: "4",
				checkdigit: true};
	cards[1] = {name: "MC", 
				length: "16", 
				prefixes: "51,52,53,54,55",
				checkdigit: true};
	cards[2] = {name: "DinersClub", 
				length: "14,16", 
				prefixes: "36,54,55",
				checkdigit: true};
	cards[3] = {name: "CarteBlanche", 
				length: "14", 
				prefixes: "300,301,302,303,304,305",
				checkdigit: true};
	cards[4] = {name: "AMEX", 
				length: "15", 
				prefixes: "34,37",
				checkdigit: true};
	cards[5] = {name: "DISCOVER", 
				length: "16", 
				prefixes: "6011,622,64,65",
				checkdigit: true};
	cards[6] = {name: "JCB", 
				length: "16", 
				prefixes: "35",
				checkdigit: true};
	cards[7] = {name: "enRoute", 
				length: "15", 
				prefixes: "2014,2149",
				checkdigit: true};
	cards[8] = {name: "Solo", 
				length: "16,18,19", 
				prefixes: "6334, 6767",
				checkdigit: true};
	cards[9] = {name: "Switch", 
				length: "16,18,19", 
				prefixes: "4903,4905,4911,4936,564182,633110,6333,6759",
				checkdigit: true};
	cards[10] = {name: "Maestro", 
				length: "12,13,14,15,16,18,19", 
				prefixes: "5018,5020,5038,6304,6759,6761",
				checkdigit: true};
	cards[11] = {name: "VisaElectron", 
				length: "16", 
				prefixes: "417500,4917,4913,4508,4844",
				checkdigit: true};
               
	// Establish card type
	var cardType = -1;
	for (var i=0; i<cards.length; i++) {
		// See if it is this card (ignoring the case of the string)
		if (cardname.toLowerCase () == cards[i].name.toLowerCase()) {
			cardType = i;
			break;
		}
	}
  
	// If card type not found, report an error
	if (cardType == -1) {
		ccErrorNo = 0;
		return false; 
	}
   
	// Ensure that the user has provided a credit card number
	if (cardnumber.length == 0)  {
		ccErrorNo = 1;
		return false; 
	}
    
	// Now remove any spaces from the credit card number
	cardnumber = cardnumber.replace (/\s/g, "");
  
	// Check that the number is numeric
	var cardNo = cardnumber;
	var cardexp = /^[0-9]{13,19}$/;
	if (!cardexp.exec(cardNo))  {
		ccErrorNo = 2;
		return false; 
	}
       
	// Now check the modulus 10 check digit - if required
	if (cards[cardType].checkdigit) {
		var checksum = 0;                           // running checksum total
		var mychar = "";                            // next char to process
		var j = 1;                                  // takes value of 1 or 2

		// Process each digit one by one starting at the right
		var calc;
		for (i = cardNo.length - 1; i >= 0; i--) 
		{

			// Extract the next digit and multiply by 1 or 2 on alternative digits.
			calc = Number(cardNo.charAt(i)) * j;

			// If the result is in two digits add 1 to the checksum total
			if (calc > 9) {
				checksum = checksum + 1;
				calc = calc - 10;
			}
    
			// Add the units element to the checksum total
			checksum = checksum + calc;
		
			// Switch the value of j
			if (j ==1) {j = 2} else {j = 1};
		} 
  
		// All done - if checksum is divisible by 10, it is a valid modulus 10.
		// If not, report an error.
		if (checksum % 10 != 0)  {
			ccErrorNo = 3;
			return false; 
		}
	}  

	// The following are the card-specific checks we undertake.
	var LengthValid = false;
	var PrefixValid = false; 
	var undefined; 

	// We use these for holding the valid lengths and prefixes of a card type
	var prefix = new Array ();
	var lengths = new Array ();
    
	// Load an array with the valid prefixes for this card
	prefix = cards[cardType].prefixes.split(",");

	// Now see if any of them match what we have in the card number
	for (i=0; i<prefix.length; i++) {
		var exp = new RegExp ("^" + prefix[i]);
		if (exp.test (cardNo)) PrefixValid = true;
	}
      
	// If it isn't a valid prefix there's no point at looking at the length
	if (!PrefixValid) {
		ccErrorNo = 3;
		return false; 
	}
    
	// See if the length is valid for this card
	lengths = cards[cardType].length.split(",");
	for (j=0; j<lengths.length; j++) {
		if (cardNo.length == lengths[j]) LengthValid = true;
	}
  
	// See if all is OK by seeing if the length was valid. We only check the 
	// length if all else was hunky dory.
	if (!LengthValid) {
		ccErrorNo = 4;
		return false; 
	};   
  
	// The credit card is in the required format.
	return true;
}
