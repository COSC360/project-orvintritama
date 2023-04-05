<?php
    include("../db.php");

    session_start();

    if($_SERVER['REQUEST_METHOD'] = 'GET') {
        // echo "yes";        
        $searchText = $_GET['searchText'];

        if($searchText == "") {
            header("Location: http://localhost/project-orvintritama/index.php");
        } else {
            header("Location: http://localhost/project-orvintritama/index.php?searchText=" . $searchText );
        }
    }
?>