<?php 
    include("includes/db.php");
    // session_start();

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];
        $user = new User($con, $userId);
    }

    // function isLoggedIn() {
    //   if(isset($_SESSION['userLoggedIn'])) {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
?> 
<!-- Left Filter Container -->    
<div class="col-3 filter-container">
        <div class="card">
          <h4 class="card-header"> Topics</h4>
          <ul class="list-group list-group-flush">
            <?php
                $categoryQuery = mysqli_query($con, "SELECT * FROM category");
                while($row = mysqli_fetch_array($categoryQuery)) {
                    echo "<a href='./index.php?categoryId=". $row['categoryId'] ."' class='list-group-item list-group-item-action'>"
                            . $row['categoryDescription'] . "</a>";
                }
            ?>
          </ul>
        </div>
      </div>

<!-- Main Container -->
<div class="col-9 main-container">
    <div class="card posts-container">
        <?php if(isLoggedIn()) {
        echo "<h4 class='card-header'>Posts
            <button class='btn btn-primary'>
                <a href='./add-post.php' class='link-light add-post-link'>Add Post</a>
            </button>
        </h4>";
        }
        ?>

        <?php if(!isLoggedIn()) {
            echo "<h4 class='card-header'>Posts</h4>
            <ul class='list-group list-group-flush'>";
        }
        ?>

        <?php
            if(isset($_GET['categoryId'])) {
                $categoryId = $_GET['categoryId'];
                $category = new Category($con, $categoryId);
                $postsQuery = mysqli_query($con, "SELECT * FROM post WHERE categoryId='$categoryId'");
            } else if(isset($_GET['searchText'])) {
                $postsQuery = mysqli_query($con, "SELECT * FROM post WHERE postContent LIKE '%" . $_GET['searchText'] . "%'");
            } else {
                $postsQuery = mysqli_query($con, "SELECT * FROM post");
            }

            
            while($row = mysqli_fetch_array($postsQuery)) {
                $user = new User($con, $row['userId']);
                $category = new Category($con, $row['categoryId']);

                $isCurrentUserPost; 
                // check if the post is created by the current logged in User
                if( isLoggedIn()) {
                    $isCurrentUserPost = ($row['userId'] == $userId);
                }
                // get the like Counter using the current post ID from likePost table
                $countLikeQuery = mysqli_query($con, "SELECT COUNT(*) as likeCounter FROM likepost WHERE postId=" . $row['postId']);
                $likeRow = mysqli_fetch_array($countLikeQuery);
                $likeCounter = $likeRow['likeCounter'];

                echo "<li class='list-group-item'> 
                    <div class='card-body'>";
                
                    if( $user->getType() == 1) {
                        echo "<h6 class='font-weight-bold'>Posted by: " . $user -> getUsername() . "\t";
                    } else if($user->getType() == 0) {
                        echo "<h6 class='font-weight-bold'><b>Announcement By: " . $user -> getUsername() . "</b>\t";
                    }
                    
                    echo "<small class='text-muted'>Date: " . $row['postDate'] . "</small>
                    </h6>
                    <p class='lead'>Title: " . $row['postTitle'] . "</p>
                    <p>" . $row['postContent'] . "</p>
                    <p><small><em>Category: " . $category -> getCategoryDescription() . "</em></small></p>
                    </div>";
                    
                    if(isLoggedIn()) {
                        echo "<div class='card-footer'>" . 
                        (!$isCurrentUserPost? "<button class='btn btn-primary btn-sm' disabled>Edit</button>": "<button class='btn btn-primary btn-sm'>Edit</button>" )
                        .    (!$isCurrentUserPost ? "<button class='btn btn-danger btn-sm' disabled>Delete</button>": "<button class='btn btn-danger btn-sm'>Delete</button>" )
                        . "<a href='http://localhost/project-orvintritama/post.php?postId=". $row['postId'] . "&userId=". $userId . "'><button class='btn btn-primary btn-sm comment-button'>Comment</button></a>
                            <button class='btn btn-primary btn-sm'>Like</button>
                            <p>Like counter: " . $likeCounter . "</p>
                        </div>
                        </li>";
                    }
            }
        ?>
        </ul>
    </div>
</div>