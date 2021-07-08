<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
    if (isset($_SESSION['via'])) {
        unset($_SESSION['via']);
    }

    
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

        <!-- Start Form -->
        <form method="post" action="<?php echo ROOT_URL; ?>inc/signup.inc.php">
            <div style="line-height: 55%;"><br></div>
            
            <!-- Form Inputs -->
            <div class="form-group">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name" 
                    value = "<?php echo isset($_SESSION['POST']['name']) ? $_SESSION['POST']['name'] : ''; ?>">
                    <label for="floatingName">Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" name="email" id="floatingInput" placeholder="Email"
                    value = "<?php echo isset($_SESSION['POST']['email']) ? $_SESSION['POST']['email'] : ''; ?>">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username"
                    value = "<?php echo isset($_SESSION['POST']['username']) ? $_SESSION['POST']['username'] : ''; ?>">
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="pwd"
                    value = "<?php echo isset($_SESSION['POST']['password']) ? $_SESSION['POST']['password'] :  ''; ?>">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="passwordCnf" id="floatingPasswordCnf" placeholder="pwd"
                    value = "<?php echo isset($_SESSION['POST']['passwordCnf']) ? $_SESSION['POST']['passwordCnf'] :  ''; ?>">
                    <label for="floatingPasswordCnf">Confirm Password</label>
                </div>
                <br>

                <!-- Checking for alerts in Session, if any-->
                <?php if(isset($_SESSION['msg']) and $_SESSION['msg'] != ''): ?>
                    <div class = "alert <?php echo $_SESSION['msgClass']; ?>"><?php echo $_SESSION['msg']; ?></div>
                    <?php unset($_SESSION['msg']); unset($_SESSION['msgClass']); ?>
                <?php endif; ?>

                <!-- UNSET SESSION[POST] for value = ..., if exists-->
                <?php if (isset($_SESSION['POST'])) {unset($_SESSION['POST']); } ?>
                
                <!-- Register Button -->
                <button type = "submit" name = "submit" class = "btn btn-primary" style="width: 100%;">Register</button>
                <p style="text-align: center;">Already registered? <a type="submit" href="<?php echo "inc/signup.inc.php"; ?>" style="color: #467eb8;">Login</a></p>
            </div>
            
            
        </form>

    </div>
<?php include('inc/footer.php') ?>