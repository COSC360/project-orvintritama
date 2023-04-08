<?php

class Comment {
    private $mysqldata;

    public function __construct($commentId) {
        // For server
        $servername = "cosc360.ok.ubc.ca";
        $username = "85707669";
        $password = "85707669";
        $name = "db_85707669";
        
        // For localhost
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $name = "cosc360";

        // Create connection
        $con = new mysqli($servername, $username, $password, $name);
        $con -> set_charset("utf8");
        
        $query = mysqli_query($con, "SELECT * FROM comment WHERE commentId='$commentId'");
        $this-> mysqldata = mysqli_fetch_array($query);
    }


    public function getCommentContent() {
        return $this -> mysqldata['commentContent'];
    }

    public function getUserId() {
        return $this -> mysqldata['userId'];
    }

    public function getPostId() {
        return $this -> mysqldata['postId'];
    }
}
?>