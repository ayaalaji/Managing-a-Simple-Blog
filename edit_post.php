<?php
require_once 'database.php';
require_once 'post.php';

$db = new Database();
$connection = $db->getConn();



    $id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id = '$id';";

    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $title=$row['title'];
    $auther=$row['auther'];
    $content=$row['content'];
    $created_at = $row['created_at']; //هنا القيمة هي نفسها عندما انشاناها
    $updated_at = date('Y-m-d H:i:s');//تعيين الوقت الحالي المعدل تلقائيًا

    ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>Editing Posts</title>
</head>
<body>
  <div class="container">
      <form method="POST">
    <div class="form-floating mb-3" style="margin-top:5%;">
    <label for="floatingInput">Title</label>
      <input type="text" class="form-control" name="title" id="floatingInput" placeholder="Title" value="<?php echo $title;?>">
    </div>
    <div class="form-floating">
      <label for="floatingPassword">Auther</label>
      <input type="text" class="form-control" name="auther" id="floatingPassword" placeholder="Auther" value="<?php echo $auther;?>" >
    </div><br>
    <div class="form-floating">
      <label for="floatingPassword">Content</label>
      <input type="text" class="form-control" name="content" id="floatingPassword" placeholder="Content" value="<?php echo $content;?>">
    </div><br>
        <button type="submit" class="btn btn-warning" name="submit">Save</button>
      </form>

      <a href="list_post.php" class="btn btn-primary mt-3">Back to Posts</a>
    </div>

<?php
         if($_SERVER['REQUEST_METHOD']=='POST'){ 
             $new_title=$_POST['title'];
             $new_auther=$_POST['auther'];
             $new_content=$_POST['content'];
             $new_created_at = NULL;//هنا نجعل هذه القيمة فارغة
             $new_updated_at = date('Y-m-d H:i:s');  // تعيين الوقت الحالي للتعديل تلقائيًا
             $updatePost=new post($id,$new_title,$new_auther,$new_content,$new_created_at,$new_updated_at);
             if ($updatePost->updatePost($id)) {
                echo "Post updated successfully!";
            } else {
                echo "Failed to update post.";
            }
        }
      
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 