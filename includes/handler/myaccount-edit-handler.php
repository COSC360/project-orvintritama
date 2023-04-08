<?php
    include("../db.php");

    session_start();

    if(isset($_SESSION['userLoggedIn'])) {
        $userId = $_SESSION['userLoggedIn'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            // echo $username;
            // echo $fullname;
            $query = "UPDATE user SET username='$username', fullName= '$fullname' WHERE userId='$userId'";
            if(mysqli_query($con, $query)) {
                // echo "Updated post";
                header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/my-account.php");
            } else {
                echo "fail to update";
            };
        }
    }
?>

<!-- .", fullName =" . $fullname . -->