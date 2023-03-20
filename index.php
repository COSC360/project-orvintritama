<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
?>

<!DOCTYPE html>    
<html>    
<head>    

    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="../css/reset.css">  
    <link rel="stylesheet" type="text/css" href="../css/index.css"> 
 </head>    

<body>
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

        <ul class="navbar-nav me-2" id="login-register-button">
          <li class="nav-item">
            <a class="nav-link" href="./login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.html">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <!-- Body Container -->
  <div class="container-fluid">
    <div class="row">

      
      <!-- Left Filter Container -->    
      <div class="col-3 filter-container">
        <div class="card">
          <h4 class="card-header"> Topics</h4>
          <ul class="list-group list-group-flush">
            <?php
                $categoryQuery = mysqli_query($con, "SELECT * FROM category");
                while($row = mysqli_fetch_array($categoryQuery)) {
                    echo "<a href='#' class='list-group-item list-group-item-action'>"
                            . $row['categoryDescription'] . "</a>";
                }
            ?>
          </ul>
        </div>
      </div>

      <!-- Main Container -->
      <div class="col-9 main-container">
        <div class="card">
          <h4 class="card-header">Sort by:</h4>
          <div class="card-body">
            <button type="button" class="btn btn-outline-primary">Popularity</button>
            <button type="button" class="btn btn-outline-secondary">Newest</button>
          </div>
        </div>

        <div class="card posts-container">
          <h4 class="card-header">Posts</h4>
          <ul class="list-group list-group-flush">
            <?php
                $postsQuery = mysqli_query($con, "SELECT * FROM post");
                while($row = mysqli_fetch_array($postsQuery)) {
                    $user = new User($con, $row['userId']);
                    $category = new Category($con, $row['categoryId']);
                    echo "<li class='list-group-item'> 
                        <div class='card-body'>";
                    
                        if( $user->getType() == 1) {
                            echo "<h6 class='font-weight-bold'>Posted by: " . $user -> getUsername() . "\t";
                        } else if($user->getType() == 0) {
                            echo "<h6 class='font-weight-bold'><b>Announcement By: " . $user -> getUsername() . "</b>\t";
                        }
                        
                        echo "<small class='text-muted'>Date: " . $row['postDate'] . "</small>
                        </h6>
                        <p class='lead'>" . $row['postTitle'] . "</p>
                        <p>" . $row['postContent'] . "</p>
                        <p><small><em>Category: " . $category -> getCategoryDescription() . "</em></small></p>
                        </div>
                        </li>";

                }
            ?>
            
    
            <!-- <li class="list-group-item">
              <div class="card-body">
                <h6 class="font-weight-bold">Posted by: Person 2
                  <small class="text-muted">Date: 20th February 2023</small>
                </h6>
                <p class="lead"> This is the title of the post 2. </p>
                <p> This is the content of the post 2</p>
                <p><small><em>Category: Cooking</em></small></p>
              </div>
            </li>

            <li class="list-group-item">
              <div class="card-body">
                <h6 class="font-weight-bold"><b>Announcement by: [Admin 1]</b>
                  <small class="text-muted">Date: 19th March 2017</small>
                </h6>
                <p class="lead"> This is the title of the post 3. </p>
                <p> This is the content of the post 3</p>
                <p><small><em>Category: <b>Announcement</b></em></small></p>
              </div>
            </li>

            <li class="list-group-item">
              <div class="card-body">
                <h6 class="font-weight-bold">Posted by: Person 3
                  <small class="text-muted">Date: 19th March 2017</small>
                </h6>
                <p class="lead"> This is the title of the post 3. </p>
                <p> This is the content of the post 3</p>
                <p><small><em>Category: Video Game</em></small></p>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
    
</body>    
</html>     