<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
  require_once('config/config.php');
  require_once('config/db.php');

  $_SESSION['logged_in'] = false;
  session_destroy();
  header('Location: '.ROOT_URL);
  exit();
?>


