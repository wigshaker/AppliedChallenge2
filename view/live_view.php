<?php
   include 'view/header.php';
   require_once('model/valid_user.php');
 ?>

<script src="js/preview_catcher.js"></script>

<div role="main" class="ui-content"  onload="setTimeout('init();', 100);">

    <img id="mjpeg_dest" src="" width="1280" height="720" alt="Monitor Image"/>

</div>

<?php include 'view/footer.php'; ?>
