<?php
require_once 'database.php';
require_once 'post.php';

$db = new Database();
$connection = $db->getConn();

    $id = $_GET['id'];
    $sql="DELETE FROM `posts` WHERE id = '$id'";
    $result=mysqli_query($connection,$sql);
    if ($result == true) {
        echo "you deleted post successfully";
        header("location:list_post.php");
    }