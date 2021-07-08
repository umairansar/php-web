<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
print_r($_SESSION);
if (isset($_SESSION['log_in']) and $_SESSION['log_in'] == true and isset($_SESSION['userUid']) and isset($_SESSION['userUid'])) {
    echo "-3";
    include('home.php');
    exit();
} elseif (isset($_SESSION['via'])) {
    if ($_SESSION['via'] == 'sign_up') {
        echo "-2";
        unset($_SESSION['via']);
        include('login.php');
        print_r($_SESSION);
        exit();
    } elseif ($_SESSION['via'] == 'log_in') {
        echo "-1";
        unset($_SESSION['via']);
        include('signup.php');
        print_r($_SESSION);
        exit();
    }
} else {
    if (!isset($_SESSION['sign_up']) or $_SESSION['sign_up'] == false) {
        # from is introduced inside functions.inc.php since SAME function is used to redirect
        # both from sign up and login page. 
        if (isset($_SESSION['from']) and $_SESSION['from'] == 'sign_up') {
            //from functions.inc.php
            echo "1";
            include('signup.php');
            exit();
        } elseif (isset($_SESSION['from']) and $_SESSION['from'] == 'log_in') {
            //from functions.inc.php
            echo "2";

            include('login.php');
            exit();
        } else {
            echo "3";
            //regular condition
            include('signup.php');
            exit();
        }
    } elseif (!isset($_SESSION['log_in']) or $_SESSION['log_in'] == false) { 
        echo "4";

        include('login.php');
        exit();
    } else {
        echo "5";

        include('home.php');
        exit();
    }
}