<?php

$user_add = filter_input(INPUT_POST, 'user_add');
$pass_add = filter_input(INPUT_POST, 'pass_add');
$pass_add_2 = filter_input(INPUT_POST, 'pass_add_2');

if (isset($user_add) && $pass_add === $pass_add_2) {
   try {
      add_user($user_add, $pass_add);
      $_SESSION['user_was_added'] = $user_add;
      $add_message = '';
   } catch (Exception $e) {
      $message = $e->getMessage();
   }
   include('.?action=add_user');
   // break;

} elseif ($pass_add !== $pass_add_2) {
   $add_message = 'Passwords do not match.';
   $_SESSION['user_was_added'] = '';

} elseif (!isset($user_add)) {
   $add_message = "Let's get you signed up!.";
   $_SESSION['user_was_added'] = '';

} else {
   $add_message = 'Other error encountered.';
   $_SESSION['user_was_added'] = '';
}

include 'view/header.php';
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
