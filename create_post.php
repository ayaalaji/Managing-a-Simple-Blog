<?php
require_once 'database.php';
require_once 'post.php';

$db = new Database();
$connection = $db->getConn();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Create New Post</title>
</head>
<body>
    <div class="container">
      <form method="POST">
    <div class="form-floating mb-3" style="margin-top:5%;">
    <label for="floatingInput">Title</label>
      <input type="text" class="form-control" name="title" id="floatingInput" placeholder="Title">
    </div>
    <div class="form-floating">
      <label for="floatingPassword">Auther</label>
      <input type="text" class="form-control" name="auther" id="floatingPassword" placeholder="Auther">
    </div><br>
    <div class="form-floating">
      <label for="floatingPassword">Content</label>
      <input type="text" class="form-control" name="content" id="floatingPassword" placeholder="Content">
    </div><br>
    
    <button type="submit" class="btn btn-warning" name="submit">Save</button>
    </form>
    <a href="list_post.php" class="btn btn-primary mt-3">Back to Posts</a>
    </div>


   <?php
      if($_SERVER['REQUEST_METHOD']=='POST'){
      $id = null; //هنا وضعتها فارغة لان ال id هو auto increment 
      $title=$_POST['title'];
      $auther=$_POST['auther'];
      $content=$_POST['content'];
      $created_at = date('Y-m-d H:i:s');  // تعيين الوقت الحالي تلقائيًا
      $updated_at = NULL;//هنا في الانشاء نجعل هذه القيمة فارغة
      if (empty($title) || empty($content)) {
        echo "Title and Content are required fields and cannot be empty.";
      } else {
      $addNewPost=new post($id,$title,$auther,$content,$created_at,$updated_at);
      if ($addNewPost->createPost()) {
        echo "Post created successfully!";
      } else {
        echo "Failed to create post.";
      }
      }
    }
   ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>