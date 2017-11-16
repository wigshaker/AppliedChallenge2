<?php
include 'view/header.php';
require_once('model/db.php');
require_once('model/user_db.php');
 ?>

<div role="main" class="ui-content">
   <h1>Add new User</h1>

   <form action="." method="post" id="add_user_form">
      <input type="hidden" name="action" value="add_user">

      <label>New Username:</label><br>
      <input type="text" name="user_add" autofocus
         <?php if (isset($user_add)) {echo 'value="' . $user_add . '"';} ?>>
      <br>

      <label>New Password:</label><br>
      <input type="password" name="pass_add">
      <br>

      <label>Confirm New Password:</label><br>
      <input type="password" name="pass_add_2">
      <br>

      <input type="submit" value="Welcome">
   </form>

   <span class="error_message"><?php echo $add_message; ?></span>


</div>

<?php include 'view/footer.php'; ?>
