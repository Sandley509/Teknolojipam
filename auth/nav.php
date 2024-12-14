<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="./index.php">
    <img src="../assets/img/inverse.png" alt="Logo" class="img-fluid" style="width: 150px; height: auto;">

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Akèy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./courselist.php">Kou disponib</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="courseprice.php">Pri kou yo</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white "href="contact.php" >Kontaktem</a>
        </li>
      </ul>

      <div class="d-flex">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
          <!-- Show Logout Icon if logged in -->
          <a href="logout.php" class="text-white"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        <?php else: ?>
          <!-- Show Login Button if not logged in -->
          <a href="login.php" class="btn btn-primary text-white">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>