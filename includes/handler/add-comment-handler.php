<?php
    include("../db.php");

    session_start();

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $commentContent = $_POST['comment-content'];
        $postId = $_GET['postId'];
        $userId = $_GET['userId'];

        $query = "INSERT into comment(postId, commentContent, userId) VALUES('$postId', '$commentContent', '$userId')";
        if(mysqli_query($con, $query)) {
            // echo "Updated post";
            header("Location: http://localhost/project-orvintritama/post.php?postId=" . $postId . "&userId=" . $userId);
        } else {
            echo "fail to update";
        };
    }
?>