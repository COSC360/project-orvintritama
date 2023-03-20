<?php
class Category {
    private $con;
    private $categoryId;
    private $categoryDescription;
    
    private $mysqldata;

    public function __construct($con, $categoryId) {
        $this -> con = $con;
        $this -> categoryId = $categoryId;

        $query = mysqli_query($this->con, "SELECT * FROM category WHERE categoryId='$this->categoryId'");

        $this-> mysqldata = mysqli_fetch_array($query);
        $this -> categoryDescription = $this -> mysqldata['categoryDescription'];
    }
    
    public function getCategoryDescription() {
        return $this -> categoryDescription;
    }
}
?>