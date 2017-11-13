<?php
	$dsn = 'mysql:host=localhost;dbname=cam';
	$username = 'camuser';
	$password = '41817';

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		 $error_message = $e->getMessage();
		 include('../view/error.php');
		 exit();
	}
?>
