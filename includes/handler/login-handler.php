<?php
    include("../db.php");

    session_start();

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $username = $_POST['username'];
        // echo $username;
        $password = $_POST['password'];
        // echo $password;
        $query = "SELECT * FROM user WHERE username= ? AND password = ?";

        $stmt = $con->prepare($query); 
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if(!is_null($row)) {
            // start session sending $userId 
            $_SESSION['userLoggedIn'] = $row['userId'];
            // echo $row['fullName'];
            header("Location: http://localhost/project-orvintritama/index.php");
        } else {
            echo "user not found";
            // header("Location: http://localhost/project-orvintritama/index.php");
        }
    }
?>