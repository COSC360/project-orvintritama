<?php
    include("../db.php");

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $hashPassword = md5($password);
        $values = '(\'' . $fullname . '\',\'' . $username . '\',\'' . $hashPassword . '\',\'' . $email .'\')';
        $insertQuery = "INSERT INTO user(fullName, username, password, email) VALUES" . $values;

        if(mysqli_query($con, $insertQuery)) {
            // echo "Created new user";
            header("Location: http://localhost/project-orvintritama/login.php");
        } else {
            echo "Fail to create new user";
        };
    }
?>