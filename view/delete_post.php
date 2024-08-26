<?php
include_once ("../database/database.php");
include_once ("../database/post.php");
$db = new Database();
$connection = $db->getConn();

    $id = $_GET['id'];
    $sql="DELETE FROM `posts` WHERE id = '$id'";
    $result=mysqli_query($connection,$sql);
    if ($result == true) {
        echo "you deleted post successfully";
        header("location:list_post.php");
    }