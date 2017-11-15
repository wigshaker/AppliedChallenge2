<?php
   session_start();
   include 'view/header.php';
   require_once('model/valid_user.php');

   // if (isset($_POST['notification-enabled']) = true) {
   //     $_SESSION['notification-enabled'] = true;
   //  }
 ?>

<script type="text/javascript">
   //SSE triggers Motion Vibration and Log updater
   var source = new EventSource("model/msg_generator.php");
   source.onmessage = function(event) {
      // navigator.vibrate(300);
      location.reload(true);
   };
</script>

<div role="main" class="ui-content">

   <form id="motion_options" action=".?action=show_motion_log" method="post">
      <label for="notification-enabled">Motion notifications:</label>
      <input type="checkbox" data-role="flipswitch" onchange="$('#motion_options').submit()"
         name="notification-enabled" id="notification-enabled"
         <?php if ($_SESSION[notification-enabled] = true) {echo "checked";}?>>
   </form>

   <?php echo "session:{$_SESSION[notification-enabled]}"; ?>

   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Motion Times</li>
      <?php
         try {
            $motion_array = file('../motionLog.txt');
         } catch (Exception $ex) {
            $motion_array[0] = 'Error connecting to motionLog.txt';
         }

         $motion_array_r = array_reverse($motion_array);
      ?>
      <?php for ($i=0; $i<30; $i++): ?>
         <li><?php echo $motion_array_r[$i]; ?></li>
      <?php endfor; ?>
   </ul>

</div>

<?php include 'view/footer.php'; ?>
