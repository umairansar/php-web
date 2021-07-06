<?php session_start(); ?>

<?php

//Connection
require_once('config/config.php');
require_once('config/db.php');

//check for delete
if(isset($_POST['delete'])){
    //Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    //q
    $query = "DELETE FROM posts WHERE id = {$delete_id}";

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
            <h1>Posts</h1>
            <div class="card border-primary mb-3" style="max-width: auto;">
                <div class="card-header container-fluid" style="padding-left:0"><a href = "<?php ROOT_URL ?>index.php"><button class="btn btn-default btn-sm" ><i class='fas fa-angle-left' style='font-size:24px'></i></button></a> by <?php echo $post['author'] ?></div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $post['title'] ?></h3>
                    <small class="card-text">Created on: <?php echo $post['created_at'] ?><br><br></small>
                    <p class="card-text"><?php echo $post['body'] ?></p>
                    
                </div>
            </div>

            <div style="width:auto;">  
                <div style="float: left; width: 130px"> 
                    <span class="align-left">
                            <a href="<?php echo ROOT_URL; ?>editPost.php?id=<?php echo $post['id']; ?>"><button class = "btn btn-light btn-sm">Edit</button></a>                   
                    </span>
                </div>        
                <div style="float: right; width: 225px"> 
                    <form align="right"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm col mr-auto" >
                    </form>
                </div>
            </div>

        </div>
<?php include('inc/footer.php'); ?>

