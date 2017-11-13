<?php include 'view/header.php'; ?>

<div role="main" class="ui-content">
   <h1>Login</h1>

   <form action="." method="post" id="login_form">
       <input type="hidden" name="action" value="login">

       <label>Username:</label><br>
       <input type="text" name="username" autofocus>
       <br>

       <label>Password:</label><br>
       <input type="password" name="password">
       <br>

       <input type="submit" value="Login">
   </form>
</div>

<?php include 'view/footer.php'; ?>
