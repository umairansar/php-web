<?php session_start(); ?>

<?php

//Connection
require_once('config/config.php');
require_once('config/db.php');

//Create Query
$query = 'SELECT * from posts';

//Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Free Result
mysqli_free_result($result);

//Close Connection
mysqli_close($conn);
?>

<?php include('inc/header.php'); echo $_SESSION['logged_in']; print_r($_SESSION);?>
    <div class = "container">
        <small><br></small>
        <h1>Posts</h1>
        <?php foreach($posts as $post) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: auto;">
            <div class="card-header">by <?php echo $post['author'] ?> </div>
            <div class="card-body">
                <h3 class="card-title"><?php echo $post['title'] ?></h3>
                <small class="card-text">Created on: <?php echo $post['created_at'] ?><br><br></small>
                <a href = "<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>"><button class="btn btn-light btn-sm" >Read More</button></a>                    
            </div>
            </div>  
        <?php endforeach; ?>
    </div>
<?php include('inc/footer.php'); ?>

