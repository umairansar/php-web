<?php session_start(); ?>

<?php

//Connection
require_once('config/config.php');
require_once('config/db.php');

//Check for Submit
if(isset($_POST['submit'])){
    //Get form data
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    //q
    $query = "UPDATE posts SET 
             title = '$title',
             author = '$author', 
             body = '$body'
             WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL);
        exit();
    } else {
        echo 'Error: '.mysqli_error($conn);
    }
}

//Get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

//Create Query
$query = 'SELECT * from posts WHERE id = '.$id;

//Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$post = mysqli_fetch_assoc($result);

//Free Result
mysqli_free_result($result);

//Close Connection
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class = "container">
        <small><br></small>
        <h1>Add Post</h1>
        <form method='POST' action="<?php $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
            </div>
            <br>
            <input type="hidden" name="update_id" value="<?php echo $post['id'] ?>">
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?>

