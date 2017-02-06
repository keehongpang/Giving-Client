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
$oldphone	= $input['oldphone'];
$newphone	= $input['newphone'];


// Create the Transport
$transport = Swift_SmtpTransport::newInstance(EMAILSERVER, EMAILPORT, 'tls')
	->setUsername(EMAILUSER)
	->setPassword(EMAILPASSWORD);
	
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

try {
	// Create a message
	$message = Swift_Message::newInstance(FINPHONECHANGE)
		->setFrom(GIVINGEMAIL)
		->setTo($FinanceEmail);
} catch (Swift_RfcComplianceException $SRe) {
	echo $SRe->getMessage() . PHP_EOL;
	return false;
}

$message->setBody(returnHtmlBody($name, $cid, $oldphone, $newphone), 'text/html');

// Add alternative parts with addPart()
$message->addPart(returnTextBody($name, $cid, $oldphone, $newphone), 'text/plain');

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



function returnHtmlBody($name, $cid, $oldphone, $newphone)
{
	$htmlBody = "						
		<p style='font-family:Calibri;'>
		Phone number has been changed for " . $name . "<BR>
		Constituent ID: " . $cid . "
		<br><br>
		From: <BR>" 
		. $oldphone . "
		<BR><BR> 
		To: <BR>" 	
		. $newphone . "
		<br><br>
		</p>
	";

	return $htmlBody;
}

function returnTextBody($name, $cid, $oldphone, $newphone)
{
	$textBody = "
		Phone number has been changed for " . $name . "
		Constituent ID: " . $cid . "
		
		From: "
		. $oldphone . "
		
		To: " 	
		. $newphone . "


	";
	
	return $textBody;
}

?>
