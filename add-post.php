<?php 
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
    session_start();
    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }
?> 

<!DOCTYPE html>    
<html>    
<head>    

    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/add-post.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </head>    

<body>
  
    <?php include("includes/shared/navigation-bar.php") ?>

    <!-- Body Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Left Padding Container -->
            <div class="col-2">
            </div>

            <!-- Main Container -->
            <div class="col-8 main-container">
                <div class="card posts-container">
                    <h4 class="card-header d-flex justify-content-between align-items-center">
                        Add a post!
                    </h4>

                    <form id="add-post-form" method="post" action="includes/handler/add-post-handler.php">  

                        <div class="card">
                            <div class="form-group">
                                <h5 class="card-header">Title</h5>
                                <input class ="form-control" type="text" name="title" id="title" placeholder="Add a title"> 
                            </div>
                        </div>
                        <div class="card">
                            <div class="form-group">
                                <h5 class="card-header">Content</h5>
                                
                                <textarea class ="form-control" type="text" name="content" id="content" row="3">Add content</textarea>
                            </div>
                        </div>

                        <div class="card">
                            <div class="form-group">
                                <h5 class="card-header">Category</h5>
                                
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option value='8' selected>Select a Category: Default = "Others"</option>
                                <?php
                                    $categoryQuery = mysqli_query($con, "SELECT * FROM category");
                                    while($row = mysqli_fetch_array($categoryQuery)) {
                                        echo "<option value=". $row['categoryId'] .">". $row['categoryDescription'] ."</option>";
                                    }   
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer add-post-container ">
                            <button class="btn btn-primary" type="submit" name="add-post" id="add-post">Add Post</button>     
                        </div>
                    </form>     
                </div>
            </div>

            <!-- Right Padding Container -->
            <div class="col-2">
            </div>
        </div>
    
</body>    
</html>     