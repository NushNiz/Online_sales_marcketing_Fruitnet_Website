

<?php 
	include('function.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="header">
		<h2>User Profile</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red; text-decoration: none; ">LOGOUT</a>
					</small>

				<?php endif ?>

				
			</div>


		</div>

				<br>
				

				<div class="site-logo">
								<h1 style="margin-left:170px;">Welcome To Fruitnet </h1>
								<img src="assets/img/logo.png" style="margin-left:250px" alt="">
								<h2 style="margin-left:260px; text-decoration:none">Fruitnet</h2>
						
						</div>
				<br><br>
				<button class="btn"><a class="homepage" href="Home.php">Continue To Home Page</a></button>
	</div>
</body>
</html>