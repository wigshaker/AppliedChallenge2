<?php
session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$file_path = '../../motionLog.txt';
$last_time = max(filemtime($file_path), $_SESSION('last_time'));
$motion_time = 0

while (true) {
	if ($motion_time > $last_time) {
		echo "data: Most recent log activity: {$motion_time}\n\n";
		ob_flush();
		flush();

		$last_time = $motion_time;
		$_SESSION('last_time') = $motion_time;
	} else {
		$last_time = time();
		$motion_time = filemtime($file_path);

		//FOR TESTING ONLY!!!!!!!!!!!!!!!!!!!
		echo "data: no activity.\n\n";
		ob_flush();
		flush();
	}

	sleep(10);  //Poll every 10 secs
}
?>






<!-- <?php ////////////////////////////////////////////////////////////////
session_start();
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$file_path = $_SESSION['file_path']

session_write_close();

$prev = '';

while(1)
{
    $s = file_get_contents($file_path);
    if($s != $prev){
        echo "data:{$s}\n\n";
        @ob_flush();@flush();
    }
    sleep(5);   //Poll every 5 secs
} -->
