<?php
    include("../db.php");

    session_start();

    if($_SERVER['REQUEST_METHOD'] = 'GET') {
        // echo "yes";        
        $searchText = $_GET['searchText'];

        if($searchText == "") {
            header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/index.php");
        } else {
            header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/index.php?searchText=" . $searchText );
        }
    }
?>