<?php
class Post {
    private $con;
    private $postId;
    private $userId;
    private $postTitle;
    private $postDate;
    private $postContent;
    private $categoryId;
    private $likeCount;
    
    private $mysqldata;

    public function __construct($con, $postId) {
        $this -> con = $con;
        $this -> postId = $postId;

        $query = mysqli_query($this->con, "SELECT * FROM post WHERE postId='$this->postId'");

        $this-> mysqldata = mysqli_fetch_array($query);
        $this-> userId = $this-> mysqldata['userId'];
        $this-> postDate = $this-> mysqldata['postDate'];
        $this -> postTitle = $this -> mysqldata['postTitle'];
        $this-> postContent = $this-> mysqldata['postContent'];
        $this-> categoryId = $this-> mysqldata['categoryId'];
        $this-> likeCount = $this-> mysqldata['likeCount'];
    }


    public function getUser() {
        return new User($this-> con, $this->userId);
    }

    public function getCategory() {
        return new Category($this-> con, $this->categoryId);
    }

    public function getPostDate() {
        return $this->postDate;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getPostTitle() {
        return $this->postTitle;
    }

    public function getPostContent() {
        return $this->postContent;
    }

    public function getLikeCount() {
        return $this->likeCount;
    }
}
?>