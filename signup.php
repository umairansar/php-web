<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php 
    //Connection
    require_once('config/config.php');
    require_once('config/db.php');

    //Message Vars
    $msg = '';
    $msgClass = '';
   
    //Check for submit
    if(filter_has_var(INPUT_POST, 'submit')) {
        //Get for data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
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
    }

?>


<?php include('inc/header.php'); if (isset( $_SESSION['logged_in'])) {echo $_SESSION['logged_in'];} ; ?>
    <div class="container">
        <?php if($msg != ''): ?>
            <div class = "alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" class = "form-control" 
                value = "<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>
            <div class = "form-group">
                <label>Email</label>
                <input type = "text" name = "email" class = "form-control" 
                value = "<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>
            <div class = "form-group">
                <label>Password</label>
                <textarea name = "password" class = "form-control"><?php echo isset($_POST['password']) ? $password : ''; ?></textarea>
            </div>
            <br>
            <button type = "submit" name = "submit" class = "btn btn-primary">Submit</button>
        </form>
    </div>
<?php include('inc/footer.php') ?>