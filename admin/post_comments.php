<?php include "includes/header.php" ?>
<div id="wrapper">
<?php include "includes/nav.php" ?><!-- Navigation -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Comments!<small><?php echo $_SESSION['username']; ?></small>
                    </h1>
<?php
if (isset($_POST['checkBoxArray'])) {
foreach ($_POST['checkBoxArray'] as $commentValueId) {
    $bulk_options = $_POST['bulk_options'];
    switch ($bulk_options) {
        case 'approved':
        $query = "UPDATE comments SET comment_status = '{$bulk_options}' where comment_id = {$commentValueId} " ;
        $update_to_approved_status = mysqli_query($connection, $query);
        confirm($update_to_approved_status);
        break;
        case 'unapproved':
        $query = "UPDATE comments SET comment_status = '{$bulk_options}' where post_id = {$commentValueId} " ;
        $update_to_unapproved_status = mysqli_query($connection, $query);
        confirm($update_to_unapproved_status);
        break;
        case 'delete':
        $query = "DELETE  from comments where comment_id = {$commentValueId} " ;
        $update_to_delete = mysqli_query($connection, $query);
        confirm($update_to_delete);
        break;

            }
        }
    }
?>
<form action="" method="post">
<table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class="col-xs-3">
        <select class="form-control" name="bulk_options" id="">
            <option value="" >--- Select Options ---</option>
            <option value="approved" >Approved</option>
            <option value="unapproved" >Unapproved</option>
            <option value="delete" >Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes" ></th>
            <th>ID</th>
            <th>User</th>
            <th>comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = "select * from comments where comment_post_id =" . mysqli_real_escape_string($connection,$_GET['id']). "  ";
    $sel_comments = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($sel_comments)) {
   $comment_id = $row['comment_id'];
   $comment_post_id = $row['comment_post_id'];
   $comment_user = $row['comment_user'];
   $comment_content = $row['comment_content'];
   $comment_email = $row['comment_email'];
   $comment_status = $row['comment_status'];
   $comment_date = $row['comment_date'];

   echo "<tr>";
   ?>
   <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $comment_id; ?>'></td>
  <?php
  echo "<td>$comment_id </td>";
  echo "<td>$comment_user</td>";
  echo "<td>$comment_content</td>";
  echo "<td>$comment_email</td>";
  echo "<td>$comment_status</td>";
      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
      $select_post_id_query = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_post_id_query)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
      }

  echo "<td>$comment_date</td>";
  echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
  echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
  echo "<td><a href='post_comments.php?delete=$comment_id&id=" . $_GET['id'] ."'>Delete</a></td>";
  echo "</tr>";

  }

?>
</tbody>
</table>
</form>
<?php
if(isset($_GET['approve'])){
    $the_comment_id = escape($_GET['approve']);
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id   ";
    $approve_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
if(isset($_GET['unapprove'])){
    $the_comment_id = escape($_GET['unapprove']);
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
if(isset($_GET['delete'])){
    $the_comment_id = escape($_GET['delete']);
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: post_comments.php?id=" . $_GET['id'] ."");
}

?>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>
<style>
    #bulkOptionContainer {
        padding: 0px;
    }
</style>
