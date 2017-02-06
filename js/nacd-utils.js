///////////////////////////////////////////////////////////////////////////
//	Populate Expiration Year Drop-down menu dynamically for 16 years
///////////////////////////////////////////////////////////////////////////
function populateExpirationYearMenu()
{
	var now			= new Date();
	var nowyear		= now.getFullYear();

	var expYearMenu = '<option value="">Year</option>';

	for (var i=0; i<15; i++) {
		expYearMenu += '<option value="' + (nowyear+i)  + '">' + (nowyear+i) + '</option>';
	}
	
	return expYearMenu;
}

///////////////////////////////////////////////////////////////////////////
//	Populate the place of worship Drop-down menu
///////////////////////////////////////////////////////////////////////////
function populatePlaceOfWorship()
{
	var place = '<option value="">Select Your Place of Worship</option>'
			  +	'<option value="Northland at Longwood">Northland at Longwood</option>'
			  +	'<option value="Northland at Mount Dora">Northland at Lake County</option>'
			  + '<option value="Northland at Oviedo">Northland at Oviedo</option>'
			  + '<option value="Web Worship">Online Worship</option>'
			  + '<option value="Other">Other/None</option>';

	return place;
}


///////////////////////////////////////////////////////////////////////////
//	Populate the place of worship Drop-down menu
///////////////////////////////////////////////////////////////////////////
function populateState()
{
	var state = '<option value="AL">Alabama</option>'
			  +	'<option value="AK">Alaska</option>'
			  +	'<option value="AZ">Arizona</option>'
			  + '<option value="AR">Arkansas</option>'
			  + '<option value="CA">California</option>'
			  + '<option value="CO">Colorado</option>'
			  + '<option value="CT">Connecticut</option>'
			  + '<option value="DE">Delaware</option>'
			  + '<option value="DC">District Of Columbia</option>'
			  + '<option value="FL" selected>Florida</option>'
			  + '<option value="GA">Georgia</option>'
			  + '<option value="HI">Hawaii</option>'
			  + '<option value="ID">Idaho</option>'
			  + '<option value="IL">Illinois</option>'
			  + '<option value="IN">Indiana</option>'
			  + '<option value="IA">Iowa</option>'
			  + '<option value="KS">Kansas</option>'
			  + '<option value="KY">Kentucky</option>'
			  + '<option value="LA">Louisiana</option>'
			  + '<option value="ME">Maine</option>'
			  + '<option value="MD">Maryland</option>'
			  + '<option value="MA">Massachusetts</option>'
			  + '<option value="MI">Michigan</option>'
			  + '<option value="MN">Minnesota</option>'
			  + '<option value="MS">Mississippi</option>'
			  + '<option value="MO">Missouri</option>'
			  + '<option value="MT">Montana</option>'
			  + '<option value="NE">Nebraska</option>'
			  + '<option value="NV">Nevada</option>'
			  + '<option value="NH">New Hampshire</option>'
			  + '<option value="NJ">New Jersey</option>'
			  + '<option value="NM">New Mexico</option>'
			  + '<option value="NY">New York</option>'
			  + '<option value="NC">North Carolina</option>'
			  + '<option value="ND">North Dakota</option>'
			  + '<option value="OH">Ohio</option>'
			  + '<option value="OK">Oklahoma</option>'
			  + '<option value="OR">Oregon</option>'
			  + '<option value="PA">Pennsylvania</option>'
			  + '<option value="RI">Rhode Island</option>'
			  + '<option value="SC">South Carolina</option>'
			  + '<option value="SD">South Dakota</option>'
			  + '<option value="TN">Tennessee</option>'
			  + '<option value="TX">Texas</option>'
			  + '<option value="UT">Utah</option>'
			  + '<option value="VT">Vermont</option>'
			  + '<option value="VA">Virginia</option>'
			  + '<option value="WA">Washington</option>'
			  + '<option value="WV">West Virginia</option>'
			  + '<option value="WI">Wisconsin</option>'
			  + '<option value="WY">Wyoming</option>';

	return state;
}


///////////////////////////////////////////////////////////////////////////
//  	Returns Readable Frequency name
///////////////////////////////////////////////////////////////////////////
function returnFrequency(frequency)
{
	var freqdesc	= "";
	switch(frequency) {
		case "WEEKLY":
			freqdesc = "Weekly";
			break;
		case "BIWEEKLY":
			freqdesc = "Bi-Weekly";
			break;
		case "MONTHLY":
			freqdesc = "Monthly";
			break;
		default:
			freqdesc = "NA";
			break;
	}
	
	return freqdesc;
}


///////////////////////////////////////////////////////////////////////////
//  	Returns Long Credit Card name
///////////////////////////////////////////////////////////////////////////
function returnCardType(cardtype)
{
	var carddesc	= "";
	switch(cardtype) {
		case "VISA":
			carddesc = "Visa";
			break;
		case "MC":
			carddesc = "MasterCard";
			break;
		case "AMEX":
			carddesc = "American Express";
			break;
		case "DISCOVER":
			carddesc = "Discover";
			break;
		default:
			carddesc = "NA";
			break;
	}
	
	return carddesc;
}


///////////////////////////////////////////////////////////////////////////
//  	Returns Readable Location (Transaction location)
// 		Input parameters are lower case
///////////////////////////////////////////////////////////////////////////
function returnLocation(source, fundcode)
{
	var location	= "";
	switch(source) {
		case "kiosk":
			location = "Kiosk";
			break;
		case "online":
			switch(fundcode) {
				case "form":
					location = "Online Form";
					break;
				default:
					location = "Online Portal";
					break;
			}
			break;
		case "text":
			location = "Text";
			break;
		case "offline":
			location = "Offline";
			break;
		default:
			location = "NA";
			break;
	}
	
	return location;
}


///////////////////////////////////////////////////////////////////////////
//  	Returns Distribution Name
///////////////////////////////////////////////////////////////////////////
function returnFundName(fundtype)
{
	var funddesc	= "";
	switch(fundtype) {
		case "GEN":
			funddesc = "Tithes and Offerings";
			break;
		case "MIS":
			funddesc = "Missions and Service";
			break;
		default:
			funddesc = "Other(Sites/Sharing/etc)";
			break;
	}
	
	return funddesc;
}

