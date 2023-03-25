<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }
?>

<!DOCTYPE html>    
<html>    
<head>    

    <title>My Account - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <script src="../javascript/my-account.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/my-account-admin.css"> 
 </head>    

<body>
    <?php include("./includes/shared/navigation-bar.php")?>

    <!-- Body Container -->
  <div class="container-fluid">
    <div class="row">

      
    <div class="col-3">
    </div>
      <!-- Left Filter Container -->
      <div class="col-6 statistics-container">
        <div class="card">
          <h4 class="card-header">Admin Statistics</h4>
          <ul class="list-group list-group-flush">
            <a href="#" class="list-group-item">Current date: 23rd February 2023</a>
            <a href="#" class="list-group-item">Total User Registered: 10</a>
            <a href="#" class="list-group-item">Current User Logged In: 5</a>
            <a href="#" class="list-group-item">Total User Banned: 2</a>
          </ul>
        </div>
      </div>
      <div class="col-3">
    </div>
    </div>
  </div>
    
</body>    
</html>     