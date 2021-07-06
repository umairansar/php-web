<?php session_start(); ?>
<?php include('inc/header.php'); ?>
<?php if (!isset($_SESSION['logged_in'])) {
    header('Location: signup.php');
    exit();
} else {
    header('Location: home.php');
    exit();
} ?>
<?php include('inc/footer.php'); ?>