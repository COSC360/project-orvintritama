<?php
    include("../db.php");

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $username = $_POST['username'];
        // echo $username;
        $password = $_POST['password'];
        // echo $password;
        $query = "SELECT COUNT(*)  AS `count` FROM user WHERE username= ? AND password = ?";

        $stmt = $con->prepare($query); 
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        // $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if($row['count'] == 1) {
            header("Location: http://localhost/project-orvintritama/static/index-login.html");
        } else {
            echo "user not found";
        }
    }
?>