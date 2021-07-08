
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" 
       href="<?php echo ROOT_URL;    
             ?>">PHP Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        
        <li class="nav-item">
          <a class="nav-link"  href="<?php echo ROOT_URL?>addPost.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#">About</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search" spellcheck="false" data-ms-editor="true">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        
      </form>
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
                 
          <button class = 'button button3'>
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;<i class='fas fa-user-astronaut' style='font-size:24px'></i></a>
          <div class="dropdown-menu" style="right: 0; left: auto;">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <a type = 'submit' class="dropdown-item" href="<?php echo ROOT_URL?>/signout.php">Sign Out</a>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><?php echo $_SESSION['userUid']; ?></a>
          </div>
          </button>
          
        </li>
      </ul>
    </div>
  </div>
</nav>


