<!-- Search Widget -->

<div class="card border-light text-white bg-primary mb-3" style="max-width: 18rem;">
                    <h5 class="card-header border-light text-white bg-primary mb-3">Search</h5>
<form action="search.php" method="post">
                    <div class="card-body">
                        <div class="input-group ">
                            <input name="search" type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn ">
                                <button name="submit" class="btn btn-secondary bg-success" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
</form><!-- Search Form-->

    </div>


<div class="card border-light text-white bg-primary mb-3" style="max-width: 18rem;">
<?php
$query = "select * from faculty";
$sel_all_fac_query = mysqli_query($connection, $query);

?>


        <div class="card-header">Category</div>
        <div id="cbd" class="card-body">
          <ul class="list-unstyled mb-0">
          <?php 
          while($row = mysqli_fetch_assoc($sel_all_fac_query)) {
            $fac_name = $row['fac_name'];
            $fac_id = $row['fac_id'];
            echo "<li> <a href='faculty.php?faculty=$fac_id'>{$fac_name} </a> </li>" ;
         }
         
          
          ?>
            
          </ul>
        </div>
      </div>

      <div class="card border-light text-white bg-primary mb-3" style="max-width: 18rem;">
      <?php
$query = "select * from corner";
$sel_all_corn_query = mysqli_query($connection, $query);

?>

        <div id="cbdh" class="card-header">Creative Corner</div>
        <div id="cbd" class="card-body">
          <ul class="list-unstyled mb-0">
          <?php 
          while($row = mysqli_fetch_assoc($sel_all_corn_query)) {
            $ctv_name = $row['ctv_name'];
            echo "<li> <a href='#'>{$ctv_name} </a> </li>" ; 
         }
         
          
          ?>
            
          </ul>
        </div>
      </div>
    </div>
  </div> 