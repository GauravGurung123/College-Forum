<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $sel_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($sel_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_user = $row['comment_user'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status= $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_user}</td>";
        echo "<td>{$comment_content}</td>";

//     $query = "select * from faculty where fac_id = {$post_cat_id}";
//        $sel_edit_categories = mysqli_query($connection, $query);
//      while($row = mysqli_fetch_assoc($sel_edit_categories)) {
//            $fac_id = $row['fac_id'];
//          $fac_name = $row['fac_name'];

//            echo "<td>{$fac_name}</td>";

  //      }
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

    $query = "select * from posts where post_id = $comment_post_id ";
    $sel_post_id_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($sel_post_id_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];

        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    }




        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";

    }
    ?>



    </tbody>
</table>


<?php
//approve comment query
if(isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' where  comment_id = $the_comment_id  ";
    $approve_comment_query = mysqli_query($connection, $query);
    header("location: comments.php");

}
//unapprove comment query
if(isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' where  comment_id = $the_comment_id   ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("location: comments.php");

}

//delete comment query
if(isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments where comment_id = {$the_comment_id} ";
    $del_query = mysqli_query($connection, $query);
    header("location: comments.php");

}

?>