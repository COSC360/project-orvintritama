<?php
    include("../db.php");
    session_start();
    
    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $postId = $_GET['postId'];    
       
            $query = "DELETE FROM post WHERE postId='$postId'";

            if(mysqli_query($con, $query)) {
                // echo "Deleted post";
                header("Location: http://localhost/project-orvintritama/index.php");
            } else {
                echo "fail to delete";
            };
        }
    }

    
?>