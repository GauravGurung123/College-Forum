<?php include "includes/header.php" ?>
<?php
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "select * from users where username = '{$username}' ";
    $sel_user_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($sel_user_profile)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

?>
<?php

if(isset($_POST['edit_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    /*   $user_image = $_FILES['image']['name'];
       $user_image_temp = $_FILES['image']['temp_name'];

       move_uploaded_file($user_image_temp, "../images/$user_image");

       $post_date = date('y-m-d');
   */

    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .="WHERE username = '{$username}' ";

    $update_user_query = mysqli_query($connection, $query);
    confirm($update_user_query);

}

?>
<div id="wrapper">
<?php include "includes/nav.php" ?><!-- Navigation -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin!<small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_firstname">First Name</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                        </div>

                        <div class="form-group">
                            <select name="user_role" id="">
                                <option value="members"><?php echo $user_role; ?></option>
                                <?php
                                if($user_role == 'admin') {
                                    echo "<option value='member'>member</option>";
                                    echo "<option value='instructor'>instructor</option>";
                                } elseif ($user_role == 'instructor'){
                                    echo "<option value='member'>member</option>";
                                    echo "<option value='admin'>admin</option>";
                                } else {
                                    echo "<option value='admin'>admin</option>";
                                    echo "<option value='instructor'>instructor</option>";
                                }

                                ?>


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
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input autocomplete="off" type="password" class="form-control" name="user_password" >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        </div>


                    </form>

                </div>
            </div>
                <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>

 
