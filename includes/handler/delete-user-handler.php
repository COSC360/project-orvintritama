<?php
    include("../db.php");

    session_start();
    
    if($_SERVER['REQUEST_METHOD'] = 'POST') {
        $username = $_POST['username'];
        $reason = $_POST['reason'];
        $date = date("Y-m-d");
        
        $findUserQuery = mysqli_query($con, "SELECT COUNT(*) as userCount FROM user WHERE username='$username'");
        $result = mysqli_fetch_array($findUserQuery);

        if($result['userCount'] > 0) {

            // delete user from user table
            $query = "DELETE FROM user WHERE username='$username'";
            mysqli_query($con, $query);
                
            // insert into deleteuser table with the reason
            $values = '("' . $username . '",CURDATE(),"' . $reason . '")';
            $query = "INSERT INTO deleteuser(username, deleteDate, deleteReason) VALUES" . $values;

            if(mysqli_query($con, $query)) {
            //     // echo "Created new post";
                header("Location: http://localhost/project-orvintritama/my-account-admin.php");
            } else {
                echo "fail to insert";
            };
        } else {
            header("Location: http://localhost/project-orvintritama/my-account-admin.php");
        }

       
    }
?>