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
   //    $('#log-list').load(document.URL +  ' #log-list', function() {
   //       $('#log-list').listview().listview('refresh');
   //       });
   };
   // source.onmessage = setTimeout(function(event)  {
   //    $('#log-list').listview('refresh');
   // }, 200);
</script>


<div role="main" class="ui-content">

   <form id="motion_options" action="." method="post">
      <input type="hidden" name="action" value="show_motion_log">

      <label for="notification-enabled">Motion notifications:</label>
      <input type="hidden" name="notification-enabled" value="0">
      <input type="checkbox" data-role="flipswitch"
         name="notification-enabled" id="notification-enabled"
          value="1" onchange="$('#motion_options').submit()"
         <?php if ($_SESSION['notification-enabled'] === '1') {echo 'checked';} ?>>

      <label for="ir-enabled">Infrared LEDs:</label>
      <input type="hidden" name="ir-enabled" value="0">
      <input type="checkbox" data-role="flipswitch"
         name="ir-enabled" id="ir-enabled"
          value="1" onchange="$('#motion_options').submit()"
         <?php if ($_SESSION['ir-enabled'] === '1') {echo 'checked';} ?>>
   </form>

   <ul data-role="listview" data-inset="true" id="log-list">
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
