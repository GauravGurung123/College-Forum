<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/nav.php";?>
<!-- Navigation ended -->

<!-- Page Content -->
  <div class="flex-container">
   <!-- Ask The coomunity: sidebar -->
   <?php include "includes/askthecommunity.php";?>

   <!-- ended -->
    <div class="item i2" style="max-width: 55%;">
     
   <!-- POP UP -->
    

 <!-- Blog Post 1 -->
      <div class="card mb-4">
        <div class="card-body">
        <?php 
        
    if(isset($_POST['submit'])) {
        $search = $_POST['search'];
    
        $query = "select * from posts where post_title like '%$search%' ";
        $search_query = mysqli_query($connection, $query);
    
        if(!$search_query){
            die("query failed" . mysqli_error($connection));
        }
    
        $count = mysqli_num_rows($search_query);
        if($count == 0) {
            echo "<img style='height:80%; width: 90%;' src='resources/img/noresult.png'>;";
        }
        else {

while($row = mysqli_fetch_assoc($search_query)) {
   $post_id = $row['post_id'];
   $post_title = $row['post_title'];
   $post_user = $row['post_user'];
   $post_date = $row['post_date'];
   $post_content = $row['post_content'];


   ?><div class="card-body"><h3 class="card-title">

        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ; ?></a>

    </h3>
    <p class="card-text"><?php echo $post_content  ?></p>
    <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted"><small>
            Posted on <?php echo $post_date  ?> by
            <a href="user_posts.php?user=<?php echo $post_user; ?>&p_id=<?php echo $post_id;  ?>"><?php echo $post_user; ?></a></small>
    </div>


<?php }
        }
    }  
?>
</div>
</div>
</div>
    <div class="item i3">
<!-- Side Widget category -->
<?php
include "includes/category.php";
?>
    </div>
<!-- item 2 ended-->

<!-- Footer -->
<?php
include "includes/footer.php";
?>


<style>
  #main__logo {
    padding: 2px;
    margin: 2px;
  }

  #search {
    margin-right: 5%;
  }

  #search-box {
    width: 380px;
  }

  #navg {
    color: #FFFFBF;
  }
  h1, h2, h3, h4 ,h5 {
    font-size: 1.8rem;
    font-family: 'Crimson Text', serif;
    }



</html>