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

            // get the userId from the deleted username
            $userIdQuery = mysqli_query($con, "SELECT userId FROM user WHERE username='$username'");
            $resultUserIdQuery = mysqli_fetch_array($userIdQuery);
            $userId = $resultUserIdQuery['userId'];
            echo $userId;
            
            // delete user from user table
            $query = "DELETE FROM user WHERE username='$username'";
            mysqli_query($con, $query);
                
            // insert into deleteuser table with the reason
            $values = '("' . $username . '",CURDATE(),"' . $reason . '")';
            $query = "INSERT INTO deleteuser(username, deleteDate, deleteReason) VALUES" . $values;
          
            // delete post corresponding to the user
            mysqli_query($con, "DELETE FROM post WHERE userId='$userId'");
            // delete postLikes from corresponding user
            mysqli_query($con,"DELETE FROM likepost WHERE userId='$userId'");

            if(mysqli_query($con, $query) ) {
                // echo "Created new post";
                header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/my-account-admin.php");
            } else {
                echo "fail to insert";
            };
        } else {
            header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/my-account-admin.php");
        }

       
    }
    
?>