<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
    // session_start();

    if($_SERVER['REQUEST_METHOD'] = 'GET') {
        $postId = $_GET['postId'];
        $currentUserId = $_GET['userId'];
        $post = new Post($con, $postId);
    }
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/post.css"> 
 </head>    

<body>
    
<?php include("./includes/shared/navigation-bar.php")?>
    <?php 
        $query = "SELECT userId,categoryId from post WHERE postId = '$postId'";
        $resultQuery = mysqli_query($con, $query);
        $result = mysqli_fetch_array($resultQuery);
        $categoryId = $result['categoryId'];
        $userId = $result['userId'];
        $user = new User($con, $userId);
        $category = new Category($con, $categoryId);
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Padding Container -->
            <div class="col-2">
            </div>

            <!-- Main Container -->
            <div class="col-8 main-container">
                <div class="card posts-container">
                    <h4 class="card-header">Posts</h4>
                    
                    <div class="card-body">
                        <h6 class="font-weight-bold">Posted by: <?php echo $user->getFullName(); ?>
                        <small class="text-muted">Date: <?php echo $post->getPostDate();?></small>
                        </h6>
                        <p class="lead"> <?php echo $post->getPostTitle() ?> </p>
                        <p> <?php echo $post -> getPostContent() ?></p>
                        <p><small><em>Category: <?php echo $category->getCategoryDescription()?></em></small></p>
                    </div>
                </div>

                <div class="comments-container">
                    <div class="card">
                        <?php echo "<form id='comment-form' method='post' action='./includes/handler/add-comment-handler.php?postId=" . $postId . "&userId=". $currentUserId ."'>" ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="comment"><b>Add comment:</b></label>   
                                    <textarea class="form-control" id="comment-text-area" name="comment-content" rows="3" placeholder="..."></textarea>
                                    <br>
                                    <button class="btn btn-primary btn-sm" type="submit" name="add-comment" id="add-comment">Add comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                    <?php 
                        $query = mysqli_query($con,"SELECT * FROM comment WHERE postId='$postId'");
                        while($row = mysqli_fetch_array($query)) {
                            $userId = $row['userId'];
                            $user = new User($con, $userId);
                            echo " <div class='card'>
                            <div class='card-body'>
                            <h6 class='font-weight-bold'> Commented by:" . $user -> getFullName() . "
                            </h6>
                            <p class='lead'> Comment:" . $row['commentContent'] . "</p>
                                </div>
                        </div>";
                        } 
                    ?>
                        
                </div>
            </div>

            <!-- Right Padding Container -->
            <div class="col-2">
            </div>
        </div>
</body>    
</html>     