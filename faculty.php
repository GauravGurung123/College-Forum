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
<div >
<?php
if(isset($_GET['faculty'])) {
$post_fac_id = $_GET['faculty'];

}
$per_page = 5;
if (isset($_GET['page'])) {
    $fac_page = $_GET['page'];
} else { $fac_page = ""; }

if ($fac_page == "" || $fac_page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($fac_page * $per_page) - $per_page;
}

$post_query_count = "SELECT * FROM posts where  post_cat_id = $post_fac_id ";
$do_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($do_count);
$count = ceil($count / $per_page);

$query = "SELECT * FROM posts where  post_cat_id = $post_fac_id AND post_status = 'published' LIMIT $page_1, $per_page  ";
$sel_all_posts_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($sel_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_user = $row['post_user'];
    $post_date = $row['post_date'];
    $post_content = substr($row['post_content'],0,250);


    ?><div class="card-body"><h3 class="card-title">

       <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ; ?></a>

    </h3>
          <p class="card-text"><?php echo $post_content  ?></p>
          <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted"><small>
          Posted on <?php echo $post_date  ?> by
          <a href="#"><?php echo $post_user  ?></a></small>
        </div>


<?php }

?></div>
  </div> <hr>
          <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="disabled">
                <span style="background-color: rgba(0, 0, 0, 0.03);" class="page-link" href="#" tabindex="-1">&laquo;</span>
            </li>
            <?php
            for ($i=1; $i<=$count; $i++) {
                if ($i == $fac_page ){
                    echo "<li class='page-item'><a class='page-link active' href='index.php?fac_page={$i}'>{$i}</a>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='index.php?fac_page={$i}'>{$i}</a>";
                }
            }
            ?>
            <li class="disabled">
                <span style="background-color: rgba(0, 0, 0, 0.03);" class="page-link" href="#" tabindex="-1">&raquo;</span>
            </li>


        </ul>
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


