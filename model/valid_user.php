<?php
   // make sure the user is logged in with a valid username
   if (!isset($_SESSION['is_valid_user'])) {
      header("Location: ." );
   }
?>
