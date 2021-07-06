<?php session_start(); ?>
<?php if (!isset($_SESSION['logged_in']) ) {
    include('signup.php');
    exit();
} else { 
    if ($_SESSION['logged_in'] == false) {
        include('signup.php');
        exit();
    } else {
        include('home.php');
        exit();
    }
} ?>
