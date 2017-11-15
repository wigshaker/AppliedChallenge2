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

   $('#notification-enabled').click(
      setTimeout(
         function() {
            $('#motion_options').submit()
         }, 500)
      )
      //       onchange="$('#motion_options').submit()"
</script>


<div role="main" class="ui-content">

   <form id="motion_options" action="index.php?action=show_motion_log" method="post">
      <input type="hidden" name="notification-enabled" value="false">
      <label for="notification-enabled">Motion notifications:</label>
      <input type="checkbox" data-role="flipswitch"
         name="notification-enabled" id="notification-enabled" value="true"
         data-on-text="On" data-off-text="Off"
         <?php if ($_SESSION[notification-enabled] == true) {echo 'checked';} ?>>
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
