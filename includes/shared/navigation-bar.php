<?php 
    include("includes/db.php");
    // session_start();

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
        // echo "logged in"; 
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

      <a class="navbar-brand me-5" href="https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/index.php">My Discussion Forum</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="mynavbar">
        <form class="d-flex w-50 me-auto" method="get" action="https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/includes/handler/search-post-handler.php">
          <input class="form-control" type="text" name="searchText" placeholder="Search by post title..">
          <button class="btn btn-primary ms-2" type="submit">Search</button>
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
            <li class="nav-item">'; 
            if($user -> getType() == 0) {
              echo "<a class='nav-link' href='./my-account-admin.php'>" . $user->getFullName() . "- My Account </a>";
            } else {
              echo "<a class='nav-link' href='./my-account.php'>" . $user->getFullName() . "- My Account </a>";
            }
            
          echo '</li>
            <li class="nav-item">
                <a class="nav-link" href="./includes/handler/logout-handler.php">Logout</a>
            </li>
          </ul>';
        }?>
        
      </div>
    </div>
  </nav>