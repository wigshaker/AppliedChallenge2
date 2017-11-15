<?php
   include 'view/header.php';
   require_once('model/valid_user.php');
 ?>

<script type="text/javascript">
   var source = new EventSource("model/msg_generator.php");
   source.onmessage = function(event) {
      navigator.vibrate(300);
      location.reload(forceGet)
   };
</script>

<div role="main" class="ui-content">

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
