
                                        <?php
                                        $host = "localhost";
                                        $user = "root";
                                        $password = "";
                                        $db = "multi_login";
                                        //connect to the database
                                        $conn = mysqli_connect($host,$user,$password,$db);

                                        if($conn->connect_error)
                                            {
                                                die("connection faild:" . $conn->connect_error);
                                            }?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link res="stylesheet" href="adminDash.css">
  <link rel="stylesheet" type="text/css" href="../../styleadmin.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    #dashco{
      background-color: #ADD8E6;
      text-align: center;
      font-weight:bold;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

    .header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminDash.html">Dashboard</a></li>
        <li><a href="UserM/HTML/user.php">User Management</a></li>
        <li><a href="stock.php">Stock management</a></li>
   
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Fruitnet</h2><br><br>
      <img  style="width:150px; height:150px ;margin-top:-43px ;"  src="../../assets/img/logo.png">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="adminDash.php">Dashboard</a></li>
        <li><a href="UserM/HTML/user.php">User Management</a></li>
        <li><a href="stock.php">Stock management</a></li>
        
      </ul><br>
    </div>
    <br>








    <?php 
include('../../function.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../../login.php");
}
?>

<div class="header">
		<h2>Admin - Home Page</h2>
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
			<img src="../../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #F28123;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="../home.php?logout='1'" style="color: red; text-decoration:none; font-size:15px;">logout</a>
                       &nbsp; <a href="../create_user.php" style=" text-decoration:none; font-size:15px;"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>
