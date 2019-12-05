<?php  session_start(); ?>
<?php include "db.php"; ?>
<?php include "../admin/functions.php"; ?><!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="../resources/css/style.css" type="text/css" media="all">
    <?php include "favicon.php"; ?>
</head>
<body>
<section class="main">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="../index.php"><span class="fa fa-key"></span> ASEM FORUM</a></h1>
			</div>
			<div class="links">
				<ul class="links-unordered-list">

					<li class="">
						<a href="#" class="">About Us</a>
					</li>
					<li class="">
						<a href="../components/signup.php" class="">Register</a>
					</li>
					<li class="">
						<a href="#" class="">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center icon">
				<img srcset="../resources/img/asem.png 1x" alt="Full logo" src="../resources/img/asem.png">
			</div>
			<div class="content-bottom">
				<form action="login.php" method="post">
					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="username" id="text1" type="text" value="" placeholder="Username" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="password" id="myInput" type="Password" placeholder="Password" required>
						</div>
					</div>
					<div class="wthree-field">
						<button type="submit" name="login" class="btn">Get Started</button>
					</div>
					<ul class="list-login">
						<li class="switch-agileits">
							<label class="switch">
								<input type="checkbox">
								<span class="slider round"></span>
								keep Logged in
							</label>
						</li>
						<li>
							<a href="#" class="text-right">forgot password?</a>
						</li>
						<li class="clearfix"></li>
					</ul>
					<ul class="list-login-bottom">
						<li class="">
							<a href="../components/signup.php" class="">Create Account</a>
						</li>
						<li class="">
							<a href="../components/usersguide.php" class="text-right">Need Help?</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</form>
			</div>
		</div>
		<div class="bottom-grid1">
			<div class="links">
				<ul class="links-unordered-list">
					<li class="">
						<a href="usersguide.html" class="">About Us</a>
					</li>
					<li class="">
						<a href="privacy.html" class="">Privacy Policy</a>
					</li>
					<li class="">
						<a href="terms.html" class="">Terms of Use</a>
					</li>
				</ul>
			</div>
			<div class="copyright">
				<p>© 2019 Key. All rights reserved | Design by
					<a href="#">ASEM Team</a>
				</p>
			</div>
		</div>
    </div>
</section>

</body>

</html>