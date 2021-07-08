<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
  require_once('config/config.php');
  require_once('config/db.php');

  $_SESSION['log_in'] = false;
  unset($_SESSION['userUid']);
  unset($_SESSION['userId']);
  header('Location: '.ROOT_URL);
  exit();
?>


