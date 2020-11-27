 //Hadil 1618880
<?php
   session_start();
   $users = $_SESSION['users'];
   session_unset();
   $_SESSION['users'] = $users;
   header("Location: login.php");
?>
