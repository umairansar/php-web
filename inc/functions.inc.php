<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
//Connection
require_once('../config/config.php');
require_once('../config/db.php');

/*All these function should return false, which means there was no error.
  THis leads signup.ini.inc to skip the if block which would otherwise 
  signify an error with a redirect to signup page.
*/
function redirectWithAlert($alert, $from) {
    $_SESSION['msg'] = $alert;
    $_SESSION['msgClass'] = 'alert-danger';
    $_SESSION['POST'] = $_POST;
    $_SESSION['from'] = $from;
    header('Location: '.ROOT_URL);
    exit();
}

function emptyfields($name, $email, $username, $password, $passwordCnf) {
    return !(!empty($name) && !empty($email) && !empty($username) && !empty($password) && !empty($passwordCnf));
}

function invalidUsername($username) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function notSamePwd($password, $passwordCnf) {
    return !($password == $passwordCnf);
}

function usernameTaken($conn, $username, $from) {
    $sql = "SELECT * from users WHERE userUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.', $from == 'sign_up'? 'sign_up' : 'log_in');
        exit();
    } 
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return true;
    }
    mysqli_free_result($resultData);
    mysqli_stmt_close($stmt);
}

function emailTaken($conn, $email, $from) {
    $sql = "SELECT * from users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.', $from == 'sign_up'? 'sign_up' : 'log_in');
        exit();
    } 
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return true;
    }
    mysqli_free_result($resultData);
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) values (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.', 'sign_up');
        exit();
    } 
    $hashpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashpwd);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt); 
    $_SESSION["sign_up"] = true; 
    header('Location: '.ROOT_URL);
    exit();  
}

function emptyfieldsLogin($username, $password) {
    return !(!empty($username) && !empty($password));
}

function loginUser($conn, $username, $password){
    $usernameExists = usernameTaken($conn, $username, 'log_in');
    $emailExists = emailTaken($conn, $username, 'log_in');
    if (!($usernameExists === true)) {
        $var = $usernameExists;
    } else {
        if (!($emailExists === true)) {
            $var = $emailExists;
        } else {
            //nothing exists
            redirectWithAlert($usernameExists.'Username/Email does not exist.', 'log_in');
            exit();
        }
    }

    $pwdHash = $var['userPwd'];
    if (password_verify($password, substr($pwdHash, 0, 60 )) === true) {
        $_SESSION["log_in"] = true;
        $_SESSION["userUid"] = $var['userUid'];
        $_SESSION["userId"] = $var['userId']; //to fetch name in profile
        header('Location: '.ROOT_URL);
        exit();  
    } else {
        redirectWithAlert('User/Password combinition is incorrect.', 'log_in');
        exit();
    }
}


?>