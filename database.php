<?php
class Database{
    public $conn;
    public $servername='localhost';
    public $username='root';
    public $password='';
    public $dbasename='blog_db';
    function __construct()
    {
        $this->conn=mysqli_connect('localhost','root','','blog_db');
        if(mysqli_connect_error()){
           die("connection is faild");
        }
    }
     public function getConn(){
        return $this->conn;
    }

    public function addPostTable() {
        $sql="CREATE TABLE IF NOT EXISTS `posts` (
            id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                auther VARCHAR(100) ,
                content TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }
}
$db = new Database();
$db->addPostTable();
 
?>