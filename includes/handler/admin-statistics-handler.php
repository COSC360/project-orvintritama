<?php
    include("../db.php");
    session_start();

    $response = [];
    
    $countUserQuery = mysqli_query($con, "SELECT COUNT(*) as userCount FROM user");     
    $countRow = mysqli_fetch_array($countUserQuery);
    $userCounter = $countRow['userCount'];
    // echo $userCounter;
    
    $countDeletedUser = mysqli_query($con, "SELECT COUNT(*) as userCount FROM deleteuser");     
    $countRow = mysqli_fetch_array($countDeletedUser);
    $deletedUserCounter = $countRow['userCount'];
    // echo $deletedUserCounter;
    array_push($response, date("M d, Y"));
    array_push($response, $userCounter);
    array_push($response, $deletedUserCounter);
    // echo $response;
    // $response[0] = $userCounter;
    // $response[1] = $deletedUserCounter;
    echo json_encode($response);
    // echo json_encode($response);
?>