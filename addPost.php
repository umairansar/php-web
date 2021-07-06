<?php session_start(); ?>

<?php

//Connection
require_once('config/config.php');
require_once('config/db.php');

//Check for Submit
if(isset($_POST['submit'])){
    //Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    //q
    $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL);
        exit();
    } else {
        echo 'Error: '.mysqli_error($conn);
    }
}

?>

<?php include('inc/header.php'); ?>
    <div class = "container">
        <small><br></small>
        <h1>Add Post</h1>
        <form method='POST' action="<?php $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?>

