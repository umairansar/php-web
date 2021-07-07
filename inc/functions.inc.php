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
function redirectWithAlert($alert) {
    $_SESSION['msg'] = $alert;
    $_SESSION['msgClass'] = 'alert-danger';
    $_SESSION['POST'] = $_POST;
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

function usernameTaken($conn, $username) {
    $sql = "SELECT * from users WHERE userUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.');
        exit();
    } 
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function emailTaken($conn, $email) {
    $sql = "SELECT * from users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.');
        exit();
    } 
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt); 
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) values (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectWithAlert('Prepared Stmt Failed.');
        exit();
    } 
    $hashpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashpwd);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt); 
    $_SESSION["logged_in"] = true; 
    header('Location: '.ROOT_URL);
    exit();  
}
?>