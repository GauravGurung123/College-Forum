<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>
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
    $the_post_id   = $_GET['p_id'];
    $the_post_user = $_GET['user'];

    }

    $query = "SELECT * FROM posts where post_user = '{$the_post_user}' ";
    $sel_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($sel_all_posts_query)) {
    $post_title = $row['post_title'];
    $post_user = $row['post_user'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];

    ?><!-- Title -->
        <h2 class="mt-4"><?php echo $post_title; ?></h2>
    <!-- User -->
    <p class="lead"><small>
       >> All Posts by >> <?php echo $post_user;  ?></small>
    </p>
    <hr>
    <!-- Date/Time --><small>
    <p>Posted on <?php echo $post_date; ?></p></small>
    <hr>

    </h3>
    <p class="text-muted">
    <?php echo $post_content;  ?></p>
    <hr>

    <?php } ?>
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
        $comment_user = $_POST['comment_user'];
        $comment_email = $_POST['comment_email'];
        $comment_content= $_POST['comment_content'];

        if (!empty($comment_user) && !empty($comment_email) && !empty($comment_content) ){
            $query = "INSERT into comments (comment_post_id, comment_user, comment_email, comment_content,
                     comment_status, comment_date)";
            $query .= "VALUES ($the_post_id , '{$comment_user}', '{$comment_email}', '{$comment_content}', 
                     'approved', now())";

            $create_comment_query = mysqli_query($connection, $query) ;
            confirm($create_comment_query );

            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
            $query .= "where post_id = $the_post_id ";
            $update_comment_count = mysqli_query($connection, $query) ;

        } else {
            echo "<script>alert('field cannot be empty') </script>";
        }


    }


    ?>

    <!-- Comments Form -->
  <hr>

    <!-- Single Comment -->

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



</body>
<style>
    #main__logo {
        padding: 2px;
        margin: 2px;
    }


    #navg {
        color: #FFFFBF;
    }



    .footer__logo-box {
        text-align: center;
        margin-bottom: 5rem;


    }
    h1, h2, h3, h4 ,h5 {
    font-size: 1.8rem;
    font-family: 'Crimson Text', serif;
    }

    .footer__logo {
        width: 15rem;
        height: auto;
    }

    .rounded-circle {
        width: 4rem;
        height: 4rem;
        float: left;

        position: relative;
        overflow: hidden;
        border-radius: 50%;

        clip-path: polygon(0 0) {
            -webkit-clip-path: circle(20% at 30% 30%);
            clip-path: circle(20% at 30% 30%);

            border-radius: none;
        }
</style>

</html>