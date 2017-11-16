<?php
// Start session management and include necessary functions
session_start();
require_once('model/db.php');
require_once('model/user_db.php');

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
		if ($_POST['notification-enabled'] === '1') {
				$_SESSION['notification-enabled'] = '1';
			} elseif ($_POST['notification-enabled'] == '0') {
				$_SESSION['notification-enabled'] = '0';
			}
		include('view/motion_log.php');
		break;

	case 'add_user':
		// $user_add = filter_input(INPUT_POST, 'user_add');
		// $pass_add = filter_input(INPUT_POST, 'pass_add');
		// $pass_add_2 = filter_input(INPUT_POST, 'pass_add_2');
		if (isset($_SESSION['user_was_added'])) {
			unset($_SESSION['user_was_added']);
			include('view/home.php');
			break;
		} else {
			$add_message = 'Hit index, came back.';
			include('view/add_user.php');
			break;
		}
		break;

	case 'logout':
		$_SESSION = array();   // Clear all session data from memory
		// session_write_close();
		session_destroy();     // Clean up the session ID
		include('view/login.php');
		break;
}

 ?>
