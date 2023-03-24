<?php
    include("../db.php");
    session_start();
    
    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postTitle = $_POST['title'];    
            $postContent = $_POST['content'];
            $categoryId = (int)($_POST['category']);
            $date = date("Y-m-d");

            $values = '(' . $userId . ',CURDATE(),\'' . $postTitle . '\',\'' . $postContent . '\',' . $categoryId . ',  0)';

            $query = "INSERT INTO post(userId, postDate, postTitle, postContent, categoryId, likeCount) VALUES" . $values;
            if(mysqli_query($con, $query)) {
                // echo "Created new post";
                header("Location: http://localhost/project-orvintritama/index.php");
            } else {
                echo "fail to insert";
            };
        }
    }

    
?>