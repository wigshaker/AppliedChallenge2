<?php
// session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$file_path = '../../motionLog.txt';
$motion_time = filemtime($file_path);
$last_time = $motion_time;

while (true) {
	if ($motion_time != $last_time) {
		echo "data: Most recent log activity: {$motion_time}\n\n";
		ob_flush();
		flush();

		$last_time = $motion_time;
		// $_SESSION["last_time"] = $motion_time;
		// session_write_close();

	}
		// $last_time = time();
		$motion_time = filemtime($file_path);

	clearstatcache();
	sleep(5);  //Poll every 5 secs
}
?>
