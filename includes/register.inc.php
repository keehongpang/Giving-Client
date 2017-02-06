<?php
include_once 'db_connect.php';
include_once 'config.php';

$error_msg = "";

if (isset($_POST['email'], $_POST['p'], $_POST['firstname'], $_POST['lastname'])) {
	// Sanitize and validate the data passed in
	$email 		= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$email 		= filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Not a valid email
		$error_msg .= '<p class="error">The email address you entered is not valid</p>';
	}

	$password 	= filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	$firstname 	= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$lastname 	= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
/*
	if (strlen($password) != 128) {
		// The hashed pwd should be 128 characters long.
		// If it's not, something really odd has happened
		$error_msg .= '<p class="error">Invalid password configuration.</p>';
	}
*/
	// Username validity and password validity have been checked client side.
	// This should be adequate as nobody gains any advantage from breaking these rules.

	$query 	= "SELECT member_id FROM exp_members WHERE email = ? LIMIT 1";
	$stmt 	= $mysqli->prepare($query);

	// check existing email  
	if ($stmt) {
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows == 1) {
			// A user with this email address already exists
			$error_msg .= '<p class="error">A user with this email address already exists.</p>';
//			echo $error_msg;
			$stmt->close();
		}
//		$stmt->close();
	} else {
		$error_msg .= '<p class="error">Database error in checking duplicate emails.</p>';
//		echo $error_msg;
	}


    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

	if (empty($error_msg)) 
	{
		// Create a random salt
		$random_salt 	= hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		// Create salted password 
		$password 		= hash('sha512', $random_salt.$password);

		// Make default value for EE registration. 
		$group_id 		= 5;
		$username 		= str_replace("@", "_", $email);
		$screen_name 	= $firstname . " " . $lastname;
		$date 			= time();
		
		// Insert the new user at exp_members table into the database 
		$query = "INSERT INTO exp_members (group_id, username, screen_name, password, email, salt, join_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

		if (($stmt=$mysqli->prepare($query)) === false) {
			header('Location: ../error.php?err=Registration failure at Prepare for members - ' . htmlspecialchars($mysqli->error));
		}
		$rc = $stmt->bind_param('isssssd', $group_id, $username, $screen_name, $password, $email, $random_salt, $date);
		if ($rc === false) {
			header('Location: ../error.php?err=Registration failure at Bind_param for members - ' . htmlspecialchars($stmt->error));
		}
		$rc = $stmt->execute();
		if ($rc === false) {
			header('Location: ../error.php?err=Registration failure at Insert for members - ' . htmlspecialchars($stmt->error));
		}
		
		$member_id = $stmt->insert_id;
		// Insert the new user at exp_member_data table into the database 
		$query = "INSERT INTO exp_member_data (member_id, m_field_id_1) VALUES (?, ?)";
		if (($stmt=$mysqli->prepare($query)) === false) {
			header('Location: ../error.php?err=Registration failure at Prepare for member_data - ' . htmlspecialchars($mysqli->error));
		}
		$rc = $stmt->bind_param('is', $member_id, $screen_name);
		if ($rc === false) {
			header('Location: ../error.php?err=Registration failure at Bind_param for member_data - ' . htmlspecialchars($stmt->error));
		}
		$rc = $stmt->execute();
		if ($rc === false) {
			header('Location: ../error.php?err=Registration failure at Insert for member_data - ' . htmlspecialchars($stmt->error));
		}

		header('Location: ./index.php?success=Registration Successful! Please Sign in.');
	}

}