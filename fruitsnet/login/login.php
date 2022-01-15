<?php include('function.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login To Fruitnet</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="site-logo">
							
								<img src="assets/img/logo.png" style="margin-left:800px" alt="">
								<h2 style="margin-left:810px; text-decoration:none">Fruitnet</h2>
						
						</div>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>