<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/nav.php";?>


<!-- Navigation ended -->
    <!-- Navigation ended -->
    <!-- Page Content -->

<div class="container">
  <div class="row">
<div class="col-lg-8">

    <?php

    if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    $view_query = "update posts set post_views_count = post_views_count + 1 where post_id = $the_post_id ";
    $send_query = mysqli_query($connection, $view_query);
    if (!$send_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $query = "SELECT * FROM posts where post_id = $the_post_id ";
    $sel_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($sel_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_user = $row['post_user'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];

    ?><!-- Title -->
        <h2 class="mt-4"><?php echo $post_title; ?></h2>
    <!-- User -->
    <p class="lead"><small>
        by
        <a href="user_posts.php?user=<?php echo $post_user; ?>&p_id=<?php echo $post_id;  ?>"><?php echo $post_user;  ?></a></small>
    </p>
    <hr>
    <!-- Date/Time --><small>
    <p>Posted on <?php echo $post_date; ?></p></small>
    <hr>

    </h3>
    <p class="text-muted">
    <?php echo $post_content;  ?></p>




    <?php } } else {
    header("location: index.php");
    }

    ?>
</div>

    <div class="col-md-4">
        <?php
        include "includes/category.php";
        ?>
    </div><div class="container">
       <div class="col-lg-8">
    <?php
    if(isset($_POST['create_comment'])) {
        $the_post_id = $_GET['p_id'];
        $comment_content= $_POST['comment_content'];
        if (!isLoggedIn()){
            echo "<script>alert('You need to register your account to comment') </script>";
        }
        else if (!empty($comment_content) ){
            $query = "INSERT into comments (comment_post_id, comment_user, comment_email, comment_content,
                     comment_status, comment_date)";
            $query .= "VALUES ($the_post_id , '{$_SESSION['username']}', '{$_SESSION['email']}', '{$comment_content}', 
                     'approved', now())";

            $create_comment_query = mysqli_query($connection, $query) ;
            confirm($create_comment_query );

        } else {
            echo "<script>alert('field cannot be empty') </script>";
        }


    }


    ?>

    <!-- Comments Form -->
    <div class="well"><hr>
        <h4 class="my-4">Leave a Comment:</h4>

            <form action="" method="post" role="form">
                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>

    </div><hr>

    <!-- Single Comment -->

    <?php
    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
    $query .= "AND comment_status = 'approved' ";
    $query .= "ORDER BY comment_id DESC ";
    $sel_comment_query = mysqli_query($connection, $query);
    confirm($sel_comment_query);
    while ($row = mysqli_fetch_assoc($sel_comment_query)) {
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_user = $row['comment_user'];

    ?>
        <!--  Comment -->
        <div class="media mb-4">
            <a class="pull-left" href="#">
            <img class="media-object" src="#" alt="abc">
            </a>
            <div class="media-body"><span style="font-size: 16px; font-weight: bold;"><?php echo $comment_user; ?>
               &nbsp;	 </span>
                <span style="font-size: x-small; color: #8B4513	;"><?php echo $comment_date; ?></span><br>

   <span style="font-size: 14px;"><?php echo $comment_content; ?></span>
            </div>
        </div>


    <?php } ?>

</div>


        </div>
        <!-- /.row -->
  </div>
</div>
    <!-- /.container -->
<!-- Footer -->
<?php
include "includes/footer.php";
?>
