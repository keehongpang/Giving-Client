<?php
/**
 * These are email server details
 */  
define("EMAILSERVER", 	"smtp.gmail.com");    				// The email server host name
define("EMAILPORT", 	587);								// The email server port number
define("EMAILUSER", 	"");   	// The email server user name
define("EMAILPASSWORD", "");    					// The email server password. 
 
define("PWRESETSUBJECT",	"Password Reset from Northland");	// Subject for Password Reset
define("GIVINGSUBJECT",		"Northland Tithes & Offerings"); 	// Subject for Tithes & Offerings
define("GIVINGEMAIL", 		"giving@northlandchurch.net");  	// Giving email address 

define("FINADDRESSCHANGE", "Giving System Address Change");
define("FINPHONECHANGE", "Giving System Phone Change");


$FinanceEmail = array(
				'keehong.pang@northlandchurch.net' => 'Kee Pang',
				'donna.gagnon@northlandchurch.net' => 'Donna Gagnon'
				);
$TestEmail = array(
				'keehong.pang@northlandchurch.net' => 'Kee Pang',
				'keehong.pang@gmail.com' => 'Keehong Pnag'
				);
