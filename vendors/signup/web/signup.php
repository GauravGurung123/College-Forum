<?php

if(isset($_POST['submit'])) {
    $username = $_POST['Name'];
    $userphone = $_POST['Phone'];
    $usermail = $_POST['email'];
    $userpassword = $_POST['password'];
}

$connection = mysqli_connect('localhost', 'phpmyadmin', 'password', 'ASEM'); 
if($connection){
    echo "we are connected";
}
else{
    die("Database connection failed");
}

$query = "INSERT INTO users(Name, Phone, email, password) 
VALUES('$username', '$userphone', '$usermail', '$userpassword')";
 

$result = mysqli_query($connection, $query);

/* if(!$result) {
    die ('query failed');
}
*/
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
    <h1 class="error">ASEM Sign Up Form</h1>
	<!---728x90--->
    <div class="w3layouts-two-grids">
	<!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h3>Join the ASEM community conversation.</h3>
                <p>By having an ASEM account, you can join, vote, and comment on our ASEM forum.
                    <br>Sign up in just a seconds.</p>
                <img src="images/b11.png" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
                <h2> Sign Up Here </h2>
                <form action="signup.php" method="post">
                    <div class="form-left-to-w3l">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input type="text" name="Name" placeholder=" Name" required="">

                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l">
                        <span class="fa fa-phone" aria-hidden="true"></span>
                        <input type="text" name="Phone" placeholder="Phone" required="">

                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="Email" required="">

                        <div class="clear"></div>
                    </div>
            <!--     <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <select name="faculty">
                            <option value="bca">BCA</option>
                            <option value="bit">BIT</option>
                            <option value="bba">BBA</option>
                            <option value="civil">BE Civil</option>
                          </select>

                        <div class="clear"></div>
                    </div>
            -->        
                    <div class="form-left-to-w3l ">

                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required="">
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
                        <a href="../../../components/signin.html">Login Here
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