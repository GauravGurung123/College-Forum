<?php
if(isset($_GET['p_id'])) {
   $the_post_id = $_GET['p_id'];


}

    $query = "select * from posts where post_id = $the_post_id";
    $sel_posts_by_id = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($sel_posts_by_id)) {
            $post_id = $row['post_id'];
            $post_user = $row['post_user'];
            $post_title = $row['post_title'];
            $post_cat_id = $row['post_cat_id'];
            $post_status = $row['post_status'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

          }

          if(isset($_POST['update_post'])) { 
            $post_user = $_POST['post_user'];
            $post_title = $_POST['post_title'];
            $post_cat_id = $_POST['post_category'];
            $post_status = $_POST['post_status'];
            $post_content = $_POST['post_content'];
            $post_tags = $_POST['post_tags'];


            $query = "UPDATE posts SET ";
            $query .="post_title = '{$post_title}', ";
            $query .="post_cat_id = '{$post_cat_id}', ";
            $query .="post_date = now(), ";
            $query .="post_user = '{$post_user}', ";
            $query .="post_status = '{$post_status}', ";
            $query .="post_tags = '{$post_tags}', ";
            $query .="post_content= '{$post_content}' ";
            $query .="WHERE post_id = {$the_post_id} ";

            $update_post = mysqli_query($connection, $query);
            confirm($update_post);

            echo "<p class='bg-success'>Post Updated Successfully! &nbsp; <a href='../post.php?p_id={$the_post_id}'>View Post</a>
            &nbsp;||&nbsp; <a href='posts.php'>Edit Other Posts</a></p>";

          }
?>


<form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
<select name="post_category" id="post_category">
<?php

$query = "SELECT * from faculty";
$sel_categories = mysqli_query($connection, $query);
confirm($sel_categories);
while($row = mysqli_fetch_assoc($sel_categories)) {
    $fac_id = $row['fac_id'];
    $fac_name = $row['fac_name'];

    echo "<option value='{$fac_id}'>{$fac_name}</option>";

}


?>

</select>
    </div>
    <div class="form-group">
         <label for="users">Post User</label>
          <input value="<?php echo $post_user ?>" type="text" class="form-control" name="post_user">
    </div>

    <div class="form-group">
    <select name="post_status" id="">
        <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
        <?php
        if($post_status == 'draft'){
            echo "<option value='published'>Publish</option>";
        } else {
            echo "<option value='draft'>Draft</option>";
        }

        ?>

    </select>
    </div>

    <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
         <label for="post_content">Post Content</label>
          <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content ?>
          
          </textarea>
    </div>
    <div class="form-group">
          <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>


</form> 