<?php 
    include("includes/db.php");
    session_start();

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }

    function isLoggedIn() {
      if(isset($_SESSION['userLoggedIn'])) {
        return true;
      } else {
        return false;
      }
    }
?> 
 
 <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">

      <a class="navbar-brand me-5" href="#">My Discussion Forum</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="mynavbar">
        <form class="d-flex w-50 me-auto">
          <input class="form-control" type="text" placeholder="Search">
          <button class="btn btn-primary ms-2" type="button">Search</button>
        </form>

        <?php if(!isLoggedIn()) {
          echo '
          <ul class="navbar-nav me-2" id="login-register-button">
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        </ul>';
        }?>

        <?php if(isLoggedIn()) {
          echo '
          <ul class="navbar-nav me-2" id="login-register-button">
            <li class="nav-item">
                <a class="nav-link" href="./my-account.html">' . $user->getFullName() . '- My Account </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./includes/handler/logout-handler.php">Logout</a>
            </li>
          </ul>';
        }?>
        
      </div>
    </div>
  </nav>