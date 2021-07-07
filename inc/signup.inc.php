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
        header('Location: '.ROOT_URL);
        exit();
    } else {
        //Proper way to access
        //Get for data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $passwordCnf = htmlspecialchars($_POST['passwordCnf']);
        
        //Check required fields
        if (emptyfields($name, $email, $username, $password, $passwordCnf)) {
            redirectWithAlert('Please fill in all fields.');
            exit();
        }

        if (invalidUsername($email)) {
            redirectWithAlert('Please enter valid username.');
            exit();
        }

        if (invalidEmail($email)) {
            redirectWithAlert('Please enter valid email.');
            exit();
        }

        if (notSamePwd($password, $passwordCnf)) {
            redirectWithAlert('Password not consistent.');
            exit();
        }

        if (usernameTaken($conn, $username)) {
            redirectWithAlert('Username taken. Try another?');
            exit();
        }

        if (emailTaken($conn, $email)) {
            redirectWithAlert('Email taken. Try another?');
            exit();
        }

        createUser($conn, $name, $email, $usernamme, $password);

        if (!empty($email) && !empty($name) && !empty($password)){
            //Passed
            //Check Email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                //Failed
                $_SESSION['msg'] = 'Please enter valid email.';
                $_SESSION['msgClass'] = 'alert-danger';
                $_SESSION['POST'] = $_POST;
                header('Location: '.ROOT_URL);
                exit();
            } else {
                //Passed
                //Recepient Email
                $_SESSION["logged_in"] = true; 
                echo $_SESSION["logged_in"];
                header('Location: '.ROOT_URL);
                exit();         
            }
            
        } else {
            //Failed
            $_SESSION['msg'] = 'Please fill in all fields.';
            $_SESSION['msgClass'] = 'alert-danger';
            $_SESSION['POST'] = $_POST;
            header('Location: '.ROOT_URL);
            exit();
        }
    } 

?>