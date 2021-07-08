<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 

if (isset($_SESSION['log_in']) and $_SESSION['log_in'] == true and isset($_SESSION['userUid']) and isset($_SESSION['userUid'])) {
    include('home.php');
    exit();
} elseif (isset($_SESSION['via'])) {
    if ($_SESSION['via'] == 'sign_up') {
        unset($_SESSION['via']);
        include('login.php');
        exit();
    } elseif ($_SESSION['via'] == 'log_in') {
        unset($_SESSION['via']);
        include('signup.php');
        exit();
    }
} else {
    if (!isset($_SESSION['sign_up']) or $_SESSION['sign_up'] == false) {
        # from is introduced inside functions.inc.php since SAME function is used to redirect
        # both from sign up and login page. 
        if (isset($_SESSION['from']) and $_SESSION['from'] == 'sign_up') {
            //from functions.inc.php
            include('signup.php');
            exit();
        } elseif (isset($_SESSION['from']) and $_SESSION['from'] == 'log_in') {
            //from functions.inc.php
            include('login.php');
            exit();
        } else {
            //regular condition
            include('signup.php');
            exit();
        }
    } elseif (!isset($_SESSION['log_in']) or $_SESSION['log_in'] == false) { 
        include('login.php');
        exit();
    } else {
        include('home.php');
        exit();
    }
}