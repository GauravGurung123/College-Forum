<?php
if(isset($_POST['create_user'])){

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


    /*   $user_image = $_FILES['image']['name'];
       $user_image_temp = $_FILES['image']['temp_name'];

       move_uploaded_file($user_image_temp, "../images/$user_image");

       $post_date = date('y-m-d');
   */


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}', '{$user_role}','{$username}','{$user_email}',
    '{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);
    confirm($create_user_query);

    echo "<p class='bg-success'>New User Added: " . " " . "<a href='users.php'>View Users</a></p>";




}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

<div class="form-group">
    <select name="user_role" id="">
        <option value="members">Select Option</option>
        <option value="admin">Admin</option>
        <option value="members">Member</option>
        <option value="instructor">Instructor</option>

    </select>
</div>


    <!--
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    -->
    <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
         <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
          <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>


</form>