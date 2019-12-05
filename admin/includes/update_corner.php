
<!-- creative form -->
<form action="" method="post">
    <div class="form-group">
        <label for="ctv-name">Edit Creative Corner</label>
<?php // editing

    if(isset($_GET['edit_c'])) {
        $ctv_id = $_GET['edit_c'];
        $query = "select * from corner where ctv_id = $ctv_id";
        $sel_edit_corner = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($sel_edit_corner)) {
            $ctv_id = $row['ctv_id'];
            $ctv_name = $row['ctv_name'];
          
?> 
<input value="<?php if(isset($ctv_name)){echo $ctv_name;}?>" class="form-control" type="text" name="ctv_name">
<?php } } ?>

<?php //update query    
      if(isset($_POST['update_ctv'])) {
        $update_ctv_name = $_POST['ctv_name'];
        $query = "update corner set ctv_name = '$update_ctv_name' where ctv_id = {$ctv_id}";

        $update_cquery = mysqli_query($connection, $query);
      }
?>
          
        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_ctv" value="Update">
    </div>

</form>