<?php

// Start session management and include necessary functions
session_start();
require_once('model/db.php');
require_once('model/user_db.php');
// include('model/notification_handler.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'show_home';
	}
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
	$action = 'login';
}

// Perform the specified action
switch($action) {
	case 'login':
		$username = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
		if (is_valid_user_login($username, $password)) {
		   $_SESSION['is_valid_user'] = true;
		   include('view/home.php');
		} else {
		   include('view/login.php');
		}
		break;

	case 'show_home':
		include('view/home.php');
		break;

	case 'show_live_view':
		include('view/live_view.php');
		break;

	case 'show_motion_log':
		if (isset($_POST['notification-enabled'])) {
			$_SESSION['notification-enabled'] = filter_input((INPUT_POST, 'notification-enabled'));
		}
		// if ($_POST['notification-enabled'] = true) {
		// 	 $_SESSION['notification-enabled'] = true;
		//  } elseif ($_POST['notification-enabled'] = false) {
		//  	$_SESSION['notification-enabled'] = false;
		//  }
		include('view/motion_log.php');
		break;

	case 'logout':
		$_SESSION = array();   // Clear all session data from memory
		// session_write_close();
		session_destroy();     // Clean up the session ID
		include('view/login.php');
		break;
}

 ?>
