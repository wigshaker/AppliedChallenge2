<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// TO-DO: create code for $prev_time. Based on User, or what?
if (filemtime('http://wigshaker.ddns.net:41817/html/motionLog.txt') > $prev_time) {
	$time = filemtime('http://wigshaker.ddns.net:41817/html/motionLog.txt');
	echo "data: Most recent log activity: {$time}\n\n";
	flush();
}


// $time = date('r');
// echo "data: The server time is: {$time}\n\n";
// flush();
?>
