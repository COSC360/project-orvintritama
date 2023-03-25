<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
    // session_start();
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/index.css"> 
 </head>    

<body>
  
  <!-- produce navigation bar based on Session (logged in or not) -->
  <?php include("./includes/shared/navigation-bar.php")?>

  
  <!-- Body Container -->
  <div class="container-fluid">
    <div class="row">

      
      


        <?php include("./includes/shared/index-post-list.php")?>
      
    </div>
  </div>
    
</body>    
</html>     