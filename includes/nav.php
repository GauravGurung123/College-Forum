<div id="navg"
    class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-primary border-bottom shadow-sm">

    <picture id="main__logo">
      <source srcset="resources/img/asem.png 1x, resources/img/asem.png 2x" media="(max-width: 37.5em)">
      <img srcset="resources/img/asem.png1x, resources/img/asem.png 2x" alt="college logo" src="resources/img/asem.png">
    </picture>

  <h5 class="my-0 mr-md-auto font-weight-bold">ASEM FORUM</h5>

    <a class='p-2 text-light' href="index.php">HOME</a>
    <a class='p-2 text-light' href="#">BOARD</a>
    <a class='p-2 text-light' href="#">SUPPORT</a>

<?php if (isset($_SESSION['user_role'])): ?>
    <a class='p-2 text-light' href="admin">ADMIN</a>
    <span class='p-2   text-warning'><img srcset="resources/img/user.png 1.5x" src="resources/img/user.png"> <?php echo $_SESSION['username'] ?></span>
    <a class="btn btn-primary bg-danger"  href="includes/logout.php">
        <picture id="main__logo">
            <source srcset="resources/img/exit16.png 2x" media="(max-width: 37.5em)">
            <img srcset=" resources/img/exit16.png 2x" alt="college logo" src="resources/img/exit16.png">
        </picture>log out</a>
<?php else: ?>
    <a class='p-2 text-light' href="includes/signin.php">SIGN IN</a>
    <a class="btn btn-outline-primary bg-light border-warning font-weight-bold text-warning"
       href="components/signup.php">Sign up</a>
<?php endif; ?>
    <style>
        #main__logo {
            padding: 2px;
            margin: 2px;
        }

        #navg {
            color: #FFFFBF;
        }
        h1, h2, h3, h4 ,h5 {
            font-size: 1.8rem;
            font-family: 'Crimson Text', serif;
        }

    </style>


    </nav>

  </div>