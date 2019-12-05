<script src="../js/script.js"></script>

<?php
if(isset($_POST['create_post'])){
    $post_cat_id = $_POST['post_category'];
    $post_title = escape($_POST['post_title']);
    $post_user = $_SESSION['username'];
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_status = escape($_POST['post_status']);

    $post_date = date('y-m-d');

    
    $query = "INSERT INTO posts(post_cat_id,post_title,post_user,post_date,post_content,post_tags,post_status)
    VALUES({$post_cat_id},'{$post_title}','{$post_user}',now(),'{$post_content}','{$post_tags}','{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);
    confirm($create_post_query);
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Created Successfully! &nbsp; <a href='../post.php?p_id={$the_post_id}'>View Post</a>
            &nbsp;||&nbsp; <a href='posts.php'>Edit Other Posts</a></p>";

}
?>


<form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
         <label for="post_title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
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
         <label for="post_status">Post Status</label>
        <select class="form-control" name="post_status" id="">
            <option value="draft" >-- Select Options --</option>
            <option value="published" >Publish</option>
            <option value="draft" >Draft</option>

        </select>
    </div>
    <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
         <label for="post_content">Post Content</label>
          <textarea  class="form-control" name="post_content" id="body" cols="300" rows="100"></textarea>
    </div>
    <div class="form-group">
          <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>


</form>