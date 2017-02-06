<?php
require_once '/var/www/html/giving/mail/swiftmailer/swiftmailer-5.x/lib/swift_required.php';
require_once '/var/www/html/giving/mail/config.php';

// Create the Transport
/*	
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
	->setUsername('giving@northlandchurch.net')
	->setPassword('nacdg1v1ng');
*/

// Create the Transport
$transport = Swift_SmtpTransport::newInstance(EMAILSERVER, EMAILPORT, 'tls')
	->setUsername(EMAILUSER)
	->setPassword(EMAILPASSWORD);


// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);
// Create a message
$message = Swift_Message::newInstance('Testing email from Keehong')
	->setFrom(array('john@doe.com' => 'John Doe'))
	->setTo(array('keehong.pang@cfl.rr.com', 'keehong.pang@gmail.com' => 'Kee Gmail'))
	->setBody('Here is the message itself')
;

try {
	// Send the message
	$result = $mailer->send($message);
	echo "Result: " . $result . PHP_EOL;
} catch	(Swift_TransportException $STe) {
	echo "Error0: " . $STe->getMessage() . PHP_EOL;
} catch (Exception $e) {
	echo "Error1: " . $e->getMessage() . PHP_EOL;
}



?>
