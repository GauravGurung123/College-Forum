<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>


    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $sel_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($sel_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";

//     $query = "select * from faculty where fac_id = {$post_cat_id}";
//        $sel_edit_categories = mysqli_query($connection, $query);
//      while($row = mysqli_fetch_assoc($sel_edit_categories)) {
//            $fac_id = $row['fac_id'];
//          $fac_name = $row['fac_name'];

//            echo "<td>{$fac_name}</td>";

  //      }
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";

//    $query = "select * from posts where post_id = $comment_post_id ";
//    $sel_post_id_query = mysqli_query($connection, $query);
 //   while($row = mysqli_fetch_assoc($sel_post_id_query)) {
  //      $post_id = $row['post_id'];
   //     $post_title = $row['post_title'];
    //    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
 //   }





        echo "<td><a href='users.php?change_to_admin={$user_id}'>Make Admin</a></td>";
        echo "<td><a href='users.php?change_to_member={$user_id}'>Make Member</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";

    }
    ?>



    </tbody>
</table>


<?php
//change to  admin query
if(isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' where  user_id = $the_user_id  ";
    $change_to_admin_query = mysqli_query($connection, $query);
    header("location: users.php");

}
//change to member  query
if(isset($_GET['change_to_member'])) {
    $the_user_id = $_GET['change_to_member'];

    $query = "UPDATE users SET user_role = 'member' where  user_id = $the_user_id  ";
    $change_to_member_query = mysqli_query($connection, $query);
    header("location: users.php");

}

//delete comment query
if(isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
        $the_user_id = mysqli_real_escape_string($connection,$_GET['delete']);

        $query = "DELETE FROM users where user_id = {$the_user_id} ";
        $del_user_query = mysqli_query($connection, $query);
        header("location: users.php");
        }

    }

}

?>