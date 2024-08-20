<?php
require_once 'database.php';
require_once 'post.php';


$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = '$id';";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title=$row['title'];
$auther=$row['auther'];
$content=$row['content'];
$created_at = $row['created_at']; 
$updated_at = $row['updated_at'];

$post = new Post($id,$title,$auther,$content,$created_at,$updated_at);


$record = $post->readPost($id);

// التحقق من وجود السجل الذي طلبته
if ($record) {
    $title = $post->title;
    $auther = $post->auther;
    $content = $post->content;
    $created_at = $post->created_at;
    $updated_at = $post->updated_at;
} else {
    echo "No record found with ID $id.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>View Post</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">View Post</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title"><?php echo htmlspecialchars($title); ?></h2>
                <h4 class="card-subtitle mb-2 text-muted">By: <?php echo htmlspecialchars($auther); ?></h4>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($content)); ?></p>
                <p class="card-text">
                    <small class="text-muted">Created at: <?php echo htmlspecialchars($created_at); ?></small><br>
                    <?php if ($updated_at) { ?>
                        <small class="text-muted">Updated at: <?php echo htmlspecialchars($updated_at); ?></small>
                    <?php } ?>
                </p>
            </div>
        </div>
        <a href="list_post.php" class="btn btn-primary mt-3">Back to Posts</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>