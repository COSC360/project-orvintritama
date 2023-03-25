<?php
    include("../db.php");

    session_start();

    session_destroy();

    header("Location: https://cosc360.ok.ubc.ca/orvinrfc/project-orvintritama/index.php");
?>