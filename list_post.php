<?php
require_once 'database.php';
require_once 'post.php';

$post = new post(null, null, null, null, null, null);//هنا عند انشاء كائن من post وضعنا قيم null حتى لا نضطر الى تعيين خصائص محددة عند تلك النقطة
$result1 = $post->listAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Show list of posts</title>
</head>
<body>
 <div class="container">
<a href="create_post.php" class="btn btn-secondary" style="width: 100%;font-size:20px;margin-top:20px;">Add Post</a>
<table class="table table-striped"  style="width:1500px;margin:auto;font-size:20px;">
            <thead>
                <tr>
                    <th scope="col">#</th>  
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Auther</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                if ($result1 == true) {
                    $rows = mysqli_num_rows($result1);
                    if ($rows > 0) {
                        while ($rows = mysqli_fetch_assoc($result1)) {
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $auther = $rows['auther'];
                            $content = $rows['content'];
                            $created_at = $rows['created_at'];
                            $updated_at = $rows['updated_at'];
                            ?>
                            <tr>
                            <th scope="row"><?php echo $i++;?></th>
                            <td style="text-align:center;"><?php echo $title;?></td>
                            <td style="text-align:center;"><?php echo $auther;?></td>
                            <td style="text-align:center;"><?php echo $content;?></td>
                            <td style="text-align:center;"><?php echo $created_at;?></td>
                            <td style="text-align:center;"><?php echo $updated_at;?></td>
                            <td>
                                <a href="edit_post.php?id=<?php echo $id;?>" class="btn btn-success">Edit</a>
                                <a href="delete_post.php?id=<?php echo $id;?>" class="btn btn-dark">Delete</a>
                                <a href="view_post.php?id=<?php echo $id;?>" class="btn btn-info">Read</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
