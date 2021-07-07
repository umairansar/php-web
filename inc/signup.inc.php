<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
    //Connection
    require_once('config/config.php');
    require_once('config/db.php');

    //Message Vars
    /*$msg = '';
    $msgClass = '';
   
    //Check for submit
    if(filter_has_var(INPUT_POST, 'submit')) {
        //Get for data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $passwordCnf = htmlspecialchars($_POST['passwordCnf']);
        
        //Check required fields
        if (!empty($email) && !empty($name) && !empty($password)){
            //Passed
            //Check Email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                //Failed
                $msg = 'Please enter valid email.';
                $msgClass = 'alert-danger';
            } else {
                //Passed
                //Recepient Email
                $toEmail = "shiatsaansar60@gmail.com";   
                $_SESSION["logged_in"] = true; 
                echo $_SESSION["logged_in"];
                header('Location: home.php');
                
            }
            
        } else {
            //Failed
            $msg = 'Please fill in all fields.';
            $msgClass = 'alert-danger';
        }
    }*/

?>