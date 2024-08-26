<?php
include_once ("../database/database.php");
$db = new Database();
$connection = $db->getConn();

class post{
    public $id;
    public $title;
    public $auther;
    public $content;
    public $created_at;
    public $updated_at;

    public function __construct($id,$title , $auther,$content ,$created_at ,$updated_at){
        $this->id = $id;
        $this->title = $title;
        $this->auther = $auther;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    public function createPost() {
        global $connection ;
        $sql = "INSERT INTO `posts` (`title`, `auther`, `content`, `created_at`, `updated_at`) VALUES ('$this->title','$this->auther','$this->content' , '$this->created_at', '$this->updated_at');";
        
        $result=mysqli_query($connection,$sql);
        if ($result == true){
            echo "You added book Successfully";
            header("location:list_post.php");
        }
    }
    public function updatePost($id){
        global $connection;
        $this->updated_at = date('Y-m-d H:i:s');  // تحديث الوقت الحالي

        $sql = "UPDATE `posts` SET 
            `title` = '$this->title',
            `auther` = '$this->auther',
            `content` = '$this->content',
            `updated_at` = '$this->updated_at'
            WHERE `id` = '$id'";

        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "Post updated successfully.";
            header("Location: list_post.php");
        } else {
            echo "Failed to update post: " . mysqli_error($connection);
        }
    }
    public function deletePost($id){
        global $connection;

        $sql = "DELETE FROM `posts` WHERE `id` = '$id'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "Post deleted successfully.";
            header("Location: list_post.php");
        } else {
            echo "Failed to delete post: " . mysqli_error($connection);
        }
    }
    public function readPost($id) {
        global $connection;

        $sql = "SELECT * FROM `posts` WHERE `id` = '$id'";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->auther = $row['auther'];
            $this->content = $row['content'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
            return $row;
        } else {
            echo "No post found with ID $id.";
            return null;
        }
    }
    public function listAll() {
        global $connection;
        $sql = "SELECT * FROM `posts`";
        return mysqli_query($connection, $sql);
    }
    
}
?>