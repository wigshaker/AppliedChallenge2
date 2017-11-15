<?php
session_start();

if isset($_SESSION['notification-enabled']) {
   echo '<!--SSE triggers Motion Vibration-->';
   echo '<script type="text/javascript">';
   echo '   var source = new EventSource("model/msg_generator.php");';
   echo '   source.onmessage = function(event) {';
   echo '      navigator.vibrate(300);';
   echo '   };';
   echo '</script>';
} else {
   $_SESSION['notification-enabled'] = false;
   session_write_close();
}

?>
