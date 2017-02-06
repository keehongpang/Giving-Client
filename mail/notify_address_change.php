<?php
require_once '/var/www/html/giving/mail/swiftmailer/swiftmailer-5.x/lib/swift_required.php';
require_once 'config.php';


$input = array();

// Process POST variables
foreach($_POST as $name => $value) {
	$input[$name]	= $value;
}

$name		= $input['name'];
$cid		= $input['cid'];
$oldstreet	= $input['oldstreet'];
$oldcity	= $input['oldcity'];
$oldstate	= $input['oldstate'];
$oldzip		= $input['oldzip'];
$newstreet	= $input['newstreet'];
$newcity	= $input['newcity'];
$newstate	= $input['newstate'];
$newzip		= $input['newzip'];


// Create the Transport
$transport = Swift_SmtpTransport::newInstance(EMAILSERVER, EMAILPORT, 'tls')
	->setUsername(EMAILUSER)
	->setPassword(EMAILPASSWORD);
	
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

try {
	// Create a message
	$message = Swift_Message::newInstance(FINADDRESSCHANGE)
		->setFrom(GIVINGEMAIL)
		->setTo($FinanceEmail);
} catch (Swift_RfcComplianceException $SRe) {
	echo $SRe->getMessage() . PHP_EOL;
	return false;
}

$message->setBody(returnHtmlBody($name, $cid, $oldstreet, $oldcity, $oldstate, $oldzip, $newstreet, $newcity, $newstate, $newzip), 'text/html');

// Add alternative parts with addPart()
$message->addPart(returnTextBody($name, $cid, $oldstreet, $oldcity, $oldstate, $oldzip, $newstreet, $newcity, $newstate, $newzip), 'text/plain');

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



function returnHtmlBody($name, $cid, $oldstreet, $oldcity, $oldstate, $oldzip, $newstreet, $newcity, $newstate, $newzip)
{
	$htmlBody = "						
		<p style='font-family:Calibri;'>
		Address has been changed for " . $name . "<BR>
		Constituent ID: " . $cid . "
		<br><br>
		From: <BR>" 
		. $oldstreet . "<BR>" 
		. $oldcity . ", " . $oldstate . " " . $oldzip . "
		<BR><BR> 
		To: <BR>" 	
		. $newstreet . "<br>"
		. $newcity . ", " . $newstate . " " . $newzip . "
		<br><br>
		</p>
	";

	return $htmlBody;
}

function returnTextBody($name, $cid, $oldstreet, $oldcity, $oldstate, $oldzip, $newstreet, $newcity, $newstate, $newzip)
{
	$textBody = "
		Address has been changed for " . $name . "
		Constituent ID: " . $cid . "
		
		From: "
		. $oldstreet . "
		" . $oldcity . ", " . $oldstate . " " . $oldzip . "

		
		To: " 	
		. $newstreet . "
		" . $newcity . ", " . $newstate . " " . $newzip . "


	";
	
	return $textBody;
}

?>
