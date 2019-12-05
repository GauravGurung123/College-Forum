<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../admin/functions.php" ?>
<?php include "../includes/db.php"; ?>
<?php include "../includes/favicon.php"; ?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $user_firstname = trim($_POST['firstname']);
    $user_lastname = trim($_POST['lastname']);
    $user_email = trim($_POST['email']);
    $password = trim($_POST['password']);
$error = [
    'username'=> '',
    'firstname'=> '',
    'lastname'=> '',
    'email'=> '',
    'password'=> ''
];

    if (strlen($username) < 4) {
        $error['username'] = 'username cannot be lees than 4 characters <hr color="red">';
    }
    if (username_exists($username)) {
        $error['username'] = 'username already exists, pick another one <hr color="red">';

    }
    if (email_exists($user_email)) {
        $error['email'] = 'Email already exists, pick another one <hr color="red">';
    }

    foreach ($error as $key => $value) {
    if (empty($value)) {
    unset($error[$key]);
    }

    } //foreach
if (empty($error)) {
    register_user($username, $user_firstname, $user_lastname, $user_email, $password);
    login_user($username, $password);
}


}


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Sign Up Form </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>
    <h1 class="error"> <a href="../index.php">ASEM </a>Sign Up Form</h1>
	<!---728x90--->
    <div class="w3layouts-two-grids">
	<!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h3>Join the <a href="../index.php">ASEM community </a> conversation.</h3>
                <p>By having an ASEM account, you can join, vote, and comment on our ASEM forum.
                    <br>Sign up in just a seconds.</p>
                <img src="images/b11.png" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
                <h2> Sign Up Here </h2>
                <form action="signup.php" role="form" method="post" autocomplete="off">
          <!--          <h5 class="fa" style="padding-bottom: 10%; color: #4cae4c"><?php //echo $message; ?> </h5> -->
                    <div class="form-left-to-w3l">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input type="text" name="username" placeholder="User Name" autocomplete="on"
                               value="<?php echo isset($username) ? $username : '' ?>" required>

                        <div class="clear"></div>
                    </div> <!-- firstname -->
<small style="font-size: small; color: #e94e02"><?php echo isset($error['username']) ? $error['username'] : '' ?></small>
                    <div class="form-left-to-w3l">
                        <span class="fa" aria-hidden="true">FN</span>
                        <input type="text" name="firstname" placeholder="First Name" autocomplete="on"
                           value="<?php echo isset($user_firstname) ? $user_firstname : '' ?>" required>

                        <div class="clear"></div>
                    </div> <!-- lastname -->
                    <div class="form-left-to-w3l">
                        <span class="fa" aria-hidden="true">LN</span>
                        <input type="text" name="lastname" placeholder="Last Name" autocomplete="on"
                           value="<?php echo isset($user_lastname) ? $user_lastname : '' ?>" required>

                        <div class="clear"></div>
                    </div>
                    <!-- Email -->
                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="Email" autocomplete="on"
                       value="<?php echo isset($user_email) ? $user_email : '' ?>" required>
                        <div class="clear"></div>
                    </div>
<small style="font-size: small; color: #e94e02"><?php echo isset($error['email']) ? $error['email'] : '' ?></small>
                    <div class="form-left-to-w3l ">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required>
                        <div class="clear"></div>
                    </div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">Remember me </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="#" class="for">Forgot password...?</a>
                        </div>
                    </div>
                    <div class="btnn">
                        <button type="submit" name="submit" value="submit">Sign Up </button>
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>Already have an account..?
                        <a href="../includes/signin.php">Login Here
                        </a>
                    </h3>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
	<!---728x90--->
    <footer class="copyrigh-wthree">
        <p>
            © 2019 ASEM Sign Up Form. All Rights Reserved | Design by
            <a href="#" target="_blank">ASEM Team</a>
        </p>
    </footer>
</body>

</html>