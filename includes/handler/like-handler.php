<?php
    include("../db.php");
    session_start();

    if(isset($_POST['postId'])) {
        // echo $_POST['postId'];
        // echo $_POST['userId'];
        // echo "hi";
        // return $_POST['postId'];
        $postId = $_POST['postId'];
        $userId = $_POST['userId'];
    }
    $values = '(' . $postId .  ',' . $userId . ')';

    $query = "INSERT into likepost(postId, userId) VALUES" . $values;

    
    if(mysqli_query($con, $query)) {
        $countLikeQuery = mysqli_query($con, "SELECT COUNT(*) as likeCounter FROM likepost WHERE postId=" . $postId);
        $likeRow = mysqli_fetch_array($countLikeQuery);
        $likeCounter = $likeRow['likeCounter'];
        // echo "Insert a new like";
        echo $likeCounter;
    } else {
        echo "fail to insert";
    };


?>