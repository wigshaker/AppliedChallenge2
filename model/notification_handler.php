<?php
session_start();

$script_message = <<<'MESSAGE'
<!--SSE triggers Motion Vibration-->
<script type="text/javascript">
   var source = new EventSource("model/msg_generator.php");
   source.onmessage = function(event) {
      navigator.vibrate(300);
   };
</script>
MESSAGE;

if $_SESSION['notification-enabled'] === '1' {
   echo $script_message;
}

?>
