<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
 <!-- Navigation -->
<?php include "includes/nav.php";?>
<div class="container-fluid" style="background-color: #fafafb;">
<hr>
    <div class="row justify-content-lg-around"  style="margin: 2% 0 2% 0;">
        <div class="col-lg-7" style="box-shadow: 4px 4px 4px 4px #0069d9; padding: 2% 2% 2% 2%;">

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
                echo "<p>Post Created Successfully! &nbsp; <a href='post.php?p_id={$the_post_id}'>View Post</a>
            &nbsp;||&nbsp; <a href='#'>Edit Other Posts</a></p>";

            }
            ?>


            <form action="" method="post" enctype="multipart/form-data">
                <fieldset  style="font-weight: bold">
                    <legend>Start A Discussion <span class="text-success"> (<?php echo $_SESSION['username']; ?>) </span>:
                <img srcset="resources/img/writing.png 1.5x" src="resources/img/writing.png">
                        <img srcset="resources/img/abc.png -5x" src="resources/img/abc.png"></legend>
                <div class="form-group">
                    <label for="post_title" >Post Title</label>
                    <input type="text" class="form-control" name="post_title">
                </div>
                <div class="form-group"><span>Faculty:&nbsp;
                    <select name="post_category" id="post_category">
                        <?php

                        $query = "SELECT * from faculty";
                        $sel_categories = mysqli_query($connection, $query);
                        confirm($sel_categories);
                        while($row = mysqli_fetch_assoc($sel_categories)) {
                            $fac_id = $row['fac_id'];
                            $fac_name = $row['fac_name'];

                            echo "<option value='{$fac_id}'>-- {$fac_name} --</option>";

                        }
                        ?>

                    </select></span>
                </div>
                <div class="form-group">
                    <label for="post_status">Post Status</label>
                    <select class="form-control" name="post_status" id="">
                        <option value="published" >-- Select Options --</option>
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
                    <textarea  class="form-control" name="post_content" cols="100" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
                </div>
                    </fieldset>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 90%;">
                <div class="card-header" style="font-weight: bold;color: #0069d9;">
                    Guidelines To Publish Any Question
                </div>
                <ul class="list-group list-group-flush" style="color: color: rgb(129, 120, 120)">
                    <li class="list-group-item">This community is here to help you with specific assignment, announcements,
                        or any queries.</li>
                    <li class="list-group-item">Avoid asking private questions.</li>
                    <li class="list-group-item">Make sure to chose your own faculty. </li>
                    <li class="list-group-item">Summarise the problem.</li>
                    <li class="list-group-item">Specify your problem in tags.</li>
                    <li class="list-group-item">Be respectful to every members..</li>
                </ul>
            </div>

        </div>


        </div>
</div>





<?php include "includes/footer.php"; ?>

