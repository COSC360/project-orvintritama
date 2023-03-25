<?php
    include("../db.php");

    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $hashPassword = md5($password);

        if($_FILES['profile-picture']['name'] !== "") {
            // echo "reached here";
            $imageData = file_get_contents($_FILES['profile-picture']['tmp_name']);
            // echo "reached here";
            $imageName = $_FILES['profile-picture']['name'];
            $insertQuery = "INSERT INTO user(fullName, username, password, email, imageName, imageData) 
            VALUES(?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("sssssb", $fullname, $username, $hashPassword, $email, $imageName, $imageData);

        } else {

            $insertQuery = "INSERT INTO user(fullName, username, password, email) 
            VALUES(?, ?, ?, ?)";

            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("ssss", $fullname, $username, $hashPassword, $email);

        } 

        

        if($stmt->execute()) {
            // echo "Created new user";
            header("Location: http://localhost/project-orvintritama/login.php");
        } else {
            echo "Fail to create new user";
        };
    }
?>