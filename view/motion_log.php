<?php
   session_start();
   include 'view/header.php';
   require_once('model/valid_user.php');
 ?>

<script type="text/javascript">
   //SSE triggers Motion Vibration and Log updater
   var source = new EventSource("model/msg_generator.php");
   source.onmessage = function(event) {
      location.reload(true);
   };
</script>


<div role="main" class="ui-content">

   <form id="motion_options" action="." method="post">
      <input type="hidden" name="action" value="show_motion_log">

      <label for="notification-enabled">Motion notifications:</label>
      <select name="notification-enabled" id="notification-enabled"
         data-role="flipswitch" onchange="$('#motion_options').submit()">
         <option value="0">Off</option>
         <option value="1"
            <?php if ($_SESSION['notification-enabled'] === '1') {
               // echo 'selected="selected"';
            } ?>
            >On</option>
      </select>

      <label for="ir-enabled">Infrared LEDs:</label>
      <select name="ir-enabled" id="ir-enabled"
         data-role="flipswitch" onchange="$('#motion_options').submit()">
         <option value="0">Off</option>
         <option value="1"
            <?php if ($_SESSION['ir-enabled'] === '1') {
               echo 'selected="selected"';
            } ?>
            >On</option>
      </select>
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

<script type="text/javascript">
   $("#notification-enabled").val("1").flipswitch("refresh");
</script>

<?php include 'view/footer.php'; ?>
