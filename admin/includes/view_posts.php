<?php
if (isset($_POST['checkBoxArray'])) {
foreach ($_POST['checkBoxArray'] as $checkBoxPostValueId) {
    $bulk_options = $_POST['bulk_options'];
    switch ($bulk_options) {
        case 'published':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' where post_id = {$checkBoxPostValueId} " ;
        $update_published_post_status = mysqli_query($connection, $query);
        confirm($update_published_post_status);
        break;
        case 'draft':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' where post_id = {$checkBoxPostValueId} " ;
        $update_draft_post_status = mysqli_query($connection, $query);
        confirm($update_draft_post_status);
        break;
        case 'delete':
        $query = "DELETE  from posts where post_id = {$checkBoxPostValueId} " ;
        $update_delete_post_status = mysqli_query($connection, $query);
        confirm($update_delete_post_status);
        break;
        case 'duplicate':
        $query = "SELECT * from posts where post_id = {$checkBoxPostValueId} " ;
        $sel_post_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($sel_post_query)) {
            $post_title = $row['post_title'];
            $post_cat_id = $row['post_cat_id'];
            $post_date = $row['post_date'];
            $post_user = $row['post_user'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];

        }
            $query  = "INSERT INTO posts(post_cat_id,post_title,post_user,post_date,post_content,post_tags,post_status ) ";
            $query .= "VALUES({$post_cat_id},'{$post_title}','{$post_user}',now(),'{$post_content}','{$post_tags}','{$post_status}')";
            $copy_query = mysqli_query($connection, $query);

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
            <option value="published" >Publish</option>
            <option value="draft" >Draft</option>
            <option value="delete" >Delete</option>
            <option value="duplicate" >Duplicate</option>
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
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Tags</th>
            <th>Comment</th>
            <th>Visited</th>
            <th>Date</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT posts.post_id, posts.post_user, posts.post_title, posts.post_cat_id, posts.post_status, posts.post_tags,
posts.post_comment_count, posts.post_date, posts.post_views_count, faculty.fac_id, faculty.fac_name FROM posts ";
$query .= " LEFT JOIN faculty ON posts.post_cat_id = faculty.fac_id ORDER BY post_id DESC";
$sel_posts = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($sel_posts)) {
            $post_id = $row['post_id'];
            $post_user = $row['post_user'];
            $post_title = $row['post_title'];
            $post_cat_id = $row['post_cat_id'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_views_count = $row['post_views_count'];
            $faculty_name = $row['fac_name'];
            $faculty_id = $row['fac_id'];

            echo "<tr>";
            ?>
            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
            <?php
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_user}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$faculty_name}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td>{$post_tags}</td>";

            $query = "select * from comments where comment_post_id = $post_id ";
            $send_comment_query = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($send_comment_query);
            $comment_id = $row['comment_id'];
            $count_comments = mysqli_num_rows($send_comment_query);
            echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>";

            echo "<td><a title='click to reset the count' href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View </a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";

            echo "</tr>";

          }
?>
        
    </tbody>
</table>

</form>
<?php
if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts where post_id = {$the_post_id} ";
    $del_query = mysqli_query($connection, $query);
    header("location: posts.php");
}
if(isset($_GET['reset'])) {
    $the_post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 where post_id = $the_post_id";
    $reset_query = mysqli_query($connection, $query);
    header("location: posts.php");
}

?>
<style>
    #bulkOptionContainer {
        padding: 0px;
    }
</style>
