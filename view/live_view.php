<?php
   include 'view/header.php';
   require_once('model/valid_user.php');
 ?>

<script src="js/preview_catcher.js"></script>
<script type="text/javascript">
   $(document).on("pageinit",".ui-content",setTimeout('init();', 100););
</script>
  <!-- onload="setTimeout('init();', 100);" -->
<div role="main" class="ui-content">

    <img id="mjpeg_dest" src="" width="1280" height="720" alt="Monitor Image"/>

</div>

<?php include 'view/footer.php'; ?>
