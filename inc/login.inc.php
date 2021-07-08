<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
    //Connection
    require_once('../config/config.php');
    require_once('../config/db.php');
    require_once('functions.inc.php');

    //Message Vars
    $_SESSION['msg'] = '';
    $_SESSION['msgClass'] = '';
   
    //Check for submit
    if(!filter_has_var(INPUT_POST, 'submit')) {
        //Access to page without submitting
        $_SESSION['via'] = 'log_in'; 
        header('Location: '.ROOT_URL);
        exit();
    } else {
        //Proper way to access
        //Get for data
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        
        //Check required fields
        if (emptyfieldsLogin($username, $password)) {
            redirectWithAlert('Please fill in all fields.', 'log_in');
            exit();
        }

        loginUser($conn, $username, $password);

        }