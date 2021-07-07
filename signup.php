<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
    //Connection
    /*require_once('config/config.php');
    require_once('config/db.php');

    //Message Vars
    $msg = '';
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


<?php include('inc/header.php'); if (isset( $_SESSION['logged_in'])) {echo $_SESSION['logged_in'];} ; ?>
    <div class="container" style = "width: 25%;">
        
        <h2 style="text-align: center;"><br>Sign up</h2>
        <form method="post" action="<?php echo ROOT_URL; ?>inc/signup.inc.php">
            <div style="line-height: 55%;"><br></div>
            <div class="form-group">
            <div class="form-floating mb-1">
                <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name" 
                value = "<?php echo isset($_POST['name']) ? $name : ''; ?>">
                <label for="floatingName">Name</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" name="email" id="floatingInput" placeholder="Email"
                value = "<?php echo isset($_POST['email']) ? $email : ''; ?>">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username"
                value = "<?php echo isset($_POST['username']) ? $username : ''; ?>">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="pwd"
                value = "<?php echo isset($_POST['password']) ? $password : ''; ?>">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="passwordCnf" id="floatingPasswordCnf" placeholder="pwd"
                value = "<?php echo isset($_POST['passwordCnf']) ? $passwordCnf : ''; ?>">
                <label for="floatingPasswordCnf">Confirm Password</label>
            </div>
            <br>
            <?php if($msg != ''): ?>
            <div class = "alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
            <button type = "submit" name = "submit" class = "btn btn-primary" style="width: 100%;">Register</button>
            <p style="text-align: center;">Already registered? <a href="login.php" style="color: #467eb8;">Login</a></p>
            </div>
            
            
        </form>

    </div>
<?php include('inc/footer.php') ?>