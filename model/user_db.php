<?php

function add_user($user_add, $pass_add) {
   global $db;
   $pass_add = sha1($pass_add);
   $query = 'INSERT INTO user_data (username, password, notification)
            VALUES (:username, :password, :notification)';
   $statement = $db->prepare($query);
   $statement->bindValue(':username', $user_add);
   $statement->bindValue(':password', $pass_add);
   $statement->bindValue(':notification', 0);
   $statement->execute();
   $statement->closeCursor();
}

function is_valid_user_login($username, $password) {
   global $db;
   $password = sha1($password);
   $query = 'SELECT userID FROM user_data
            WHERE username = :username AND password = :password';
   $statement = $db->prepare($query);
   $statement->bindValue(':username', $username);
   $statement->bindValue(':password', $password);
   $statement->execute();
   $valid = ($statement->rowCount() == 1);
   $statement->closeCursor();
   return $valid;
}

?>
