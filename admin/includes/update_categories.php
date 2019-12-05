<form action="" method="post">
    <div class="form-group">
        <label for="fac-name">Edit Category</label>
<?php // editing

    if(isset($_GET['edit'])) {
        $fac_id = $_GET['edit'];
        $query = "select * from faculty where fac_id = $fac_id";
        $sel_edit_categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($sel_edit_categories)) {
            $fac_id = $row['fac_id'];
            $fac_name = $row['fac_name'];
          
?> 
<input value="<?php if(isset($fac_name)){echo $fac_name;}?>" class="form-control" type="text" name="fac_name">
<?php } } ?>

<?php //update query    
      if(isset($_POST['update_fac'])) {
        $update_fac_name = $_POST['fac_name'];
        $query = "update faculty set fac_name = '$update_fac_name' where fac_id = {$fac_id}";

        $update_query = mysqli_query($connection, $query);
      }
?>
          
        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_fac" value="Update">
    </div>

</form>
