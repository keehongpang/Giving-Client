<?php
require_once '/var/www/html/giving/mail/swiftmailer/swiftmailer-5.x/lib/swift_required.php';
require_once 'config.php';


$input = array();
// Process POST variables
foreach($_POST as $name => $value) {
	$input[$name]	= $value;
}


if (isset($input['email']))
{

	$email 		= $input['email'];
	$firstname 	= $input['firstname'];
	$lastname 	= $input['lastname'];
	$amount 	= $input['amount'];
/*
	$email 		= array('keehong.pang@cfl.rr.com','keehong.pangpangpanggmail.com' =>'Kee Gmail');
	$firstname 	= "Keehong";
	$lastname 	= "Pang";
	$amount		= 100.50;
*/
	// Create the Transport
	$transport = Swift_SmtpTransport::newInstance(EMAILSERVER, EMAILPORT, 'tls')
		->setUsername(EMAILUSER)
		->setPassword(EMAILPASSWORD);
		
	// Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);

	try {
		// Create a message
		$message = Swift_Message::newInstance(GIVINGSUBJECT)
			->setFrom(GIVINGEMAIL)
			->setTo($email);
	} catch (Swift_RfcComplianceException $SRe) {
		echo $SRe->getMessage() . PHP_EOL;
		return false;
	}

	$message->setBody(returnHtmlBody($firstname, $lastname, $amount), 'text/html');

	// Add alternative parts with addPart()
	$message->addPart(returnTextBody($firstname, $lastname, $amount), 'text/plain');

	try {
		// Send the message
		$result = $mailer->send($message);
		echo "Email Sent! " . $result . PHP_EOL;
	} catch	(Swift_TransportException $STe) {
		echo "Error: " . $STe->getMessage() . PHP_EOL;
		return false;
	} catch (Exception $e) {
		echo "Error: " . $e->getMessage() . PHP_EOL;
		return false;
	}

}
else
{
	echo 'Email is not provided!' . PHP_EOL;
	return false;
}


function returnHtmlBody($firstname, $lastname, $amount)
{
	$htmlBody = "						
		<p style='font-family:Calibri;'>
		Dear " . $firstname . " " . $lastname . ", 
		<br><br>

		 Thank you for your support of Northland Church. 
		 Your prayers, financial involvement and time are critical components 
		 in helping bring people to maturity in Christ.
		 <br><br>

			Your gift of $" . $amount . "  has been received and designated as you selected.<br><br>
			You can view your history online anytime at 
			<a target=_blank href='http://giving.northlandchurch.net'>Northland Tithes and Offerings</a>.
			There will be a delay in viewing your transaction in some cases as we reconcile the transaction. 
			<br><br>

		Thank you,<br>
		Northland, A Church Distributed <br><br>
		</p>

		<p style='font-family:Calibri;font-size:12px;'>
		No goods or services were provided in exchange for your contribution(s).
		<br><br>
		</p>
	";

	return $htmlBody;
}

function returnTextBody($firstname, $lastname, $amount)
{
	$textBody = "
		Dear " . $firstname . " " . $lastname . ",

		Thank you for your support of Northland Church. Your prayers, financial involvement and time are critical components in helping bring people to maturity in Christ.

		Your gift of $" . $amount . " has been received and designated as you selected.

		You can view your history online anytime at Northland Tithes and Offerings (http://giving.northlandchurch.net). There will be a delay in viewing your transaction in some cases as we reconcile the transaction.

		Thank you,
		Northland, A Church Distributed

		No goods or services were provided in exchange for your contribution(s). 
	";
	
	return $textBody;
}

?>
