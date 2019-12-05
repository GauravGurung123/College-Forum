<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="../resources/img/asem.png">
    <link rel="stylesheet" type="text/css" href="resources/css/flexbox.css">
    <title>Read Post</title>
</head>

<body>
    <!-- Navigation -->
    <div id="navg"
        class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-primary border-bottom shadow-sm">

        <picture id="main__logo">
            <source srcset="../resources/img/asem.png 1x, ../resources/img/asem.png 2x" media="(max-width: 37.5em)">
            <img srcset="../resources/img/asem.png 1x, ../resources/img/asem.png 2x" alt="college logo"
                src="../resources/img/asem.png">
        </picture>

        <h5 class="my-0 mr-md-auto font-weight-bold">ASEM FORUM</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-light" href="../index.html">HOME</a>
            <a class="p-2 text-light" href="#">BOARD</a>
            <a class="p-2 text-light" href="#">SUPPORT</a>
            <a class="p-2 text-light" href="components/signin.html">SIGN IN</a>
        </nav>
        <a class="btn btn-outline-primary bg-light border-warning font-weight-bold text-warning"
            href="vendors/signup/web/signup.html">Sign up</a>
    </div>
    <!-- Navigation ended -->
    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <?php 
$query = "select * from posts";
$sel_all_posts_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($sel_all_posts_query)) {
   $post_title = $row['post_title'];
   $post_author = $row['post_author'];
   $post_date = $row['post_date'];
   $post_content = $row['post_content'];
  
   $post_title; 

   ?>

<div class="col-lg-8">

<!-- Title -->
<h2 class="mt-4"><?php echo $post_title  ?> How Can I Become A Succesfull Software Developer?</h2>

<!-- Author -->
<p class="lead">
    by
    <a href="#"><?php echo $post_author  ?>Hawk</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on <?php echo $post_date  ?>January 1, 2019 at 12:00 PM</p>

<!-- Preview Image -->
<!--<img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">-->

<hr>

<!-- Post Content --> 

<p class="lead"><?php echo $post_content  ?>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut,
    error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni
    recusandae laborum minus inventore?</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos
    iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat.
    Temporibus, voluptatibus.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis
    unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat
    perspiciatis. Enim, iure!</p>

<blockquote class="blockquote">
    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
        ante.</p>
    <footer class="blockquote-footer">Someone famous in
        <cite title="Source Title">Source Title</cite>
    </footer>
</blockquote>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas
    placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem
    obcaecati?</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo,
    aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam
    recusandae? Qui, necessitatibus, est!</p>

<hr>

<?php

    }

?>

            <!-- Post Content Column -->
            

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="../resources/img/falcon.png" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Falcon</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment with nested comments -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="../resources/img/Hawk.jpeg" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Hawk</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="../resources/img/falcon.png" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Falcon</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="../resources/img/Hawk.jpeg" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Hawk</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header border-light text-white bg-primary mb-3">Search</h5>
                    <div class="card-body ">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn ">
                                <button class="btn btn-secondary bg-success" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header border-light text-white bg-primary mb-3">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">concepts</a>
                                    </li>
                                    <li>
                                        <a href="#">Documentation</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">solutions</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header border-light text-white bg-primary mb-3">Recent Posts</h5>
                    <div class="card-body">
                            <a href="#">How Can I Become A Succesfull Software Developer?</a><hr>
                            <a href="#">Tell me about Software Developers: Jobs, Career, Salary and Education Information!</a><hr>
                            <a href="#">How can I make money by writing designing a web page?</a><hr>
                            <a href="#">Is it possible to make a living on YouTube?</a><hr>
                            <a href="#">How to become a member of ASEM forum?</a><hr>
                            <a href="#">How can I use ASEM to make money?</a><hr>
                            <a href="#">Who is the designer of ASEM Community?</a><hr>
                            <a href="#">Is it possible to make a living on YouTube?</a><hr>
                            <a href="#">Is it possible to make a living on YouTube?</a><hr>
                            <a href="#">Is it possible to make a living on YouTube?</a><hr>
                            <a href="#">Is it possible to make a living on YouTube?</a><hr>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-primary">
        <div class="footer__logo-box">
            <picture class="footer__logo">
                <source srcset="../resfources/img/asem.png" media="(max-width: 37.5em)">
                <img srcset="../resources/img/asem.png 1x" alt="Full logo" src="../resources/img/asem.png">

            </picture>

        </div>
        <div class="container">
            <p class="text-center text-white"><small>copyright &copy; 2019 by ASEM Forum. All rights reserved.</small>
            </p>
        </div>

    </footer>


</body>
<style>
    #main__logo {
        padding: 2px;
        margin: 2px;
    }


    #navg {
        color: #FFFFBF;
    }



    .footer__logo-box {
        text-align: center;
        margin-bottom: 5rem;


    }
    h1, h2, h3, h4 ,h5 {
    font-size: 1.8rem;
    font-family: 'Crimson Text', serif;
    }

    .footer__logo {
        width: 15rem;
        height: auto;
    }

    .rounded-circle {
        width: 4rem;
        height: 4rem;
        float: left;

        position: relative;
        overflow: hidden;
        border-radius: 50%;

        clip-path: polygon(0 0) {
            -webkit-clip-path: circle(20% at 30% 30%);
            clip-path: circle(20% at 30% 30%);

            border-radius: none;
        }
</style>

</html>