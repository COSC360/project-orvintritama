<?php
class User {
    private $con;
    private $userId;
    private $fullName;
    private $username;
    private $email;
    private $type;
    
    private $mysqldata;

    public function __construct($con, $userId) {
        $this -> con = $con;
        $this -> userId = $userId;

        $query = mysqli_query($this->con, "SELECT * FROM user WHERE userId='$this->userId'");

        $this-> mysqldata = mysqli_fetch_array($query);
        $this -> fullName = $this -> mysqldata['fullName'];
        $this -> username = $this->mysqldata['username'];
        $this -> email = $this->mysqldata['email'];
        $this -> type = $this->mysqldata['type'];
    }


    public function getUsername() {
        return $this -> username;
    }

    public function getUserId() {
        return $this -> userId;
    }
    
    public function getFullName() {
        return $this -> fullName;
    }

    public function getPassword() {
        return $this -> username;
    }
    
    public function getEmail() {
        return $this -> email;
    }
    
    public function getType() {
        return $this -> type;
    }
}
?>