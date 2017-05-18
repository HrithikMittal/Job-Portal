<?php
 
include ("dbconnect.php");
 
if (isset($_GET['post_id'])) {
 
$id = $_GET['post_id'];
 
$post = mysqli_query($con,"SELECT * FROM posts WHERE post_id = $id");
 
$post_data = $post->fetch_assoc();
 
} else {
 
header("Location: dashboard.php");
 
}
 
?>
 
<!doctype html>
 
<html>
 
<head>
 
<meta charset="utf-8">
 
<title><?php echo $post_data['post_name'] ?>'s Status Update</title>
 
<link rel="stylesheet" type="text/css" href="styles.css">
 
</head>
 
 
 
<body>
 
<div class="body">
 
<a href="index.php">Home</a> | <b><?php echo $post_data['post_name'] ?>'</b>s Status Update
 
</div>
 
<div class="body">
 
<div class="post-panel">
 
<div class="post-body" style="border: none;">
 
<?php echo $post_data['post_msg'] ?>
 
</div>
 
<div class="post-footer">
 
<?php
 
$comments = mysqli_query($con,"SELECT * FROM comments WHERE post_id = $id");
 
?>
 
<b><?php echo $comments->num_rows ?></b> total comments<br><br>
 
<?php
 
while ($comment_data = $comments->fetch_assoc()) { ?>
 
<div class="post-panel">
 
<div class="post-header">
 
<b><?php echo $comment_data['user_name'] ?></b>
 
</div>
 
<div class="post-body">
 
<?php echo $comment_data['user_comment'] ?>
 
</div>
 
</div>
 
<?php }
 
?>
 
<form method="post" action="comment-action.php?post_id=<?php echo $id ?>">
 
<label>Quick Comment:</label><br>
 
<textarea name="comment" required></textarea><br>
 
<input type="text" name="uname" placeholder="enter your name here..." required /><br>
 
<input type="submit" name="post_comment" />
 
</form>
 
</div>
 
</div>
 
</div>
 
</body>
 
</html>