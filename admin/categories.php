<?php include "includes/header.php" ?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/nav.php" ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin!<small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <div class="col-xs-6">
                        <!-- Creeating category -->
<?php insert_categories(); ?>
<form action="" method="post">
        <div class="form-group">
             <label for="fac-name">Add Category </label>
                <input class="form-control" type="text" name="fac_name">
        </div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
</div>

</form>
<?php 
if(isset($_GET['edit'])) {
    $fac_id = $_GET['edit'];
    include "includes/update_categories.php";
}
?>
<!-- update category -->
</div><!-- Add category form -->
<div class="col-xs-6">
  <!-- Creeating Creative Corner -->
<?php
if(isset($_POST['submit_c'])) {
    $ctv_name = $_POST['ctv_name'];
    if($ctv_name == "" || empty($ctv_name)) {
        echo "This feild should not be empty ";
    } else {
        $query = "insert into corner(ctv_name) ";
        $query .= "value('{$ctv_name}') ";

        $create_category_query = mysqli_query($connection, $query);
        confirm($create_category_query);
    }
}

?>
<form action="" method="post">
    <div class="form-group">
        <label for="ctv-name">Add Creative Corner</label>
        <input class="form-control" type="text" name="ctv_name">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit_c" value="Add Creative Corner">
    </div>
</form>
<?php 
if(isset($_GET['edit_c'])) {
    $ctv_id = $_GET['edit_c'];
    include "includes/update_corner.php";
}
?>
<!-- update Creative Corner -->
</div><!-- Add Creative Corner form -->
<!-- Retrieving Category data -->
<div class="col-xs-6">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Title</th>
        </tr>
    </thead>
    <tbody>
    <?php  find_categories(); ?>
    <?php delete_categories(); ?>
    </tbody>
</table>

</div>
<!-- Retrieving creative corner data -->
<div class="col-xs-6">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Creative Corner</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $query = "select * from corner";
    $sel_corner = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($sel_corner)) {
            $ctv_id = $row['ctv_id'];
            $ctv_name = $row['ctv_name'];
            echo "<tr>";
            echo "<td>{$ctv_id}</td>" ; 
            echo "<td>{$ctv_name}</td>" ; 
            echo "<td><a href='categories.php?delete_c={$ctv_id}'>Delete</a></td>" ; 
            echo "<td><a href='categories.php?edit_c={$ctv_id}'>Edit</a></td>" ; 
            echo "</tr>";

         }
                   
          ?>
    <?php //delete query
      if(isset($_GET['delete_c'])) {
          $del_ctv_id = $_GET['delete_c'];
          $query = "delete from corner where ctv_id = {$del_ctv_id}";

          $delete_ctv_query = mysqli_query($connection, $query);
          header("location: categories.php");
      }
      
      ?>
        
    </tbody>

</table>

</div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>

 
