<?php
    include("includes/db.php");
    include("includes/classes/Category.php");
    include("includes/classes/User.php");
    include("includes/classes/Post.php");
    session_start();

    if(isset($_SESSION['userLoggedIn'])) {
      $userId = $_SESSION['userLoggedIn'];
      $user = new User($con, $userId);
      $isAdmin = ($user -> getType()) == 0;
    }
    
    function isLoggedIndex() {
      if(isset($_SESSION['userLoggedIn'])) {
        return true;
      } else {
        return false;
      }
    }
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
    <link rel="stylesheet" type="text/css" href="css/index.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <?php if(isLoggedIndex()) echo "
    <script>
    window.onload = function() {
    // get all buttons with like-button class name
    let btn = document.getElementsByClassName('like-button');
    
    // Adding event listener to each button
    // Ajax call -> insert into like post and return the total likes of current post and update accordingly
    for(let i =0;i<btn.length; i++) {
      btn[i].addEventListener('click', () => {
          // Fetching Button value which is the postId
          let btnValue = btn[i].value;
          console.log(btnValue);
          
          $.ajax({
              type: 'POST',
              url: './includes/handler/like-handler.php',
              data: { postId: btnValue, userId:" . $userId. " },
              success: function (result) {
                // each paragraph has id of likeCounter-postId, when like button is clicked, update by the value of count 
                  let p = document.getElementById('likeCounter-' + btnValue);
                  p.innerHTML = 'Love Counter: ' + result;
              }
        });
      });
      }
    }
  </script>"
  ?>
 </head>    

<body>
  
  <!-- produce navigation bar based on Session (logged in or not) -->
  <?php include("./includes/shared/navigation-bar.php")?>

  
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
                $postsQuery = mysqli_query($con, "SELECT * FROM post WHERE categoryId='$categoryId' ORDER by postDate DESC");
            } else if(isset($_GET['searchText'])) {
                $postsQuery = mysqli_query($con, "SELECT * FROM post WHERE postContent LIKE '%" . $_GET['searchText'] . "%' ORDER by postDate DESC");
            } else {
                $postsQuery = mysqli_query($con, "SELECT * FROM post ORDER by postDate DESC");
            }

            
            while($row = mysqli_fetch_array($postsQuery)) {
                $user = new User($con, $row['userId']);
                $category = new Category($con, $row['categoryId']);

                $isCurrentUserPost; 
                // check if the post is created by the current logged in User or if the user is admin
                if( isLoggedIn()) {
                    $isCurrentUserPost = ($row['userId'] == $userId);
                
                  // get the like Counter using the current post ID from likePost table when the page loaded
                  $countLikeQuery = mysqli_query($con, "SELECT COUNT(*) as likeCounter FROM likepost WHERE postId=" . $row['postId']);
                  $likeRow = mysqli_fetch_array($countLikeQuery);
                  $likeCounter = $likeRow['likeCounter'];
                  
                  $userLikedQuery = mysqli_query($con, "SELECT COUNT(*) as hasLiked FROM likepost WHERE postId=" . $row['postId'] . " AND userId=" . $userId);
                  $likeRow = mysqli_fetch_array($userLikedQuery);
                  $userLikeCounter = $likeRow['hasLiked'];
                  
                  $hasCurrentUserLiked = ($userLikeCounter == 1);
                }
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
                    <p>Content: " . $row['postContent'] . "</p>
                    <p><small><em>Category: " . $category -> getCategoryDescription() . "</em></small></p>
                    </div>";
                    
                    if(isLoggedIn()) {
                        echo "<div class='card-footer'>" . 
                        // (!$isCurrentUserPost? "<button class='btn btn-primary btn-sm' disabled>Edit</button>": "<button class='btn btn-primary btn-sm'>Edit</button>" )
                        (($isCurrentUserPost || $isAdmin )? "<a href='http://localhost/project-orvintritama/includes/handler/delete-post-handler.php?postId=". $row['postId'] . "'><button class='btn btn-danger btn-sm'>Delete</button></a>": "<button class='btn btn-danger btn-sm' disabled>Delete</button>" )
                        . "<a href='http://localhost/project-orvintritama/post.php?postId=". $row['postId'] . "&userId=". $userId . "'><button class='btn btn-primary btn-sm comment-button'>Comment</button></a>
                        <button class='btn btn-primary btn-sm like-button'  value='". $row['postId'] ."'>Love this post!</button>
                        <p id='likeCounter-" . $row['postId'] ."'>Love Counter: " . $likeCounter . "</p>
                        </div>
                        </li>";
                    }
            }
        ?>
        </ul>
    </div>
</div>
      
    </div>
  </div>
    
</body>    
</html>     