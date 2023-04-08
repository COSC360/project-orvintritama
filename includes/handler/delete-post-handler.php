<?php
    include("../db.php");
    session_start();
    
    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $postId = $_GET['postId'];    
       
            $query = "DELETE FROM post WHERE postId='$postId'";
            $query2 = "DELETE FROM likepost WHERE postId='$postId'";

            if(mysqli_query($con, $query) && mysqli_query($con, $query2)) {
                // echo "Deleted post";
                header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/index.php");
            } else {
                echo "fail to delete";
            };
        }
    }

    
?>