<?php
   include 'view/header.php';
   require_once('model/valid_user.php');
 ?>

<div role="main" class="ui-content">
   <ul data-role="listview" data-inset="true">
      <li><a href="?action=show_live_view">Live Cam</a></li>
      <li><a href="?action=show_options_log">Options and Logs</a></li>
      <li><a href="?action=add_user">Add a New User</a></li>
      <li><a href="?action=logout">Log Out</a></li>
   </ul>

</div>

<?php include 'view/footer.php'; ?>
