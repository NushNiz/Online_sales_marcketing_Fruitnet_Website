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
 }


 if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE users set id='" . $_POST['id'] . "', 
                                            username='" . $_POST['username'] . "', 
                                            email='" . $_POST['email'] . "', 
                                            user_type='" . $_POST['user_type'] . "' ,
                                            password='" . $_POST['password'] . "'
                                           
                                             WHERE id='" . $_POST['id'] . "'");
                        $message = "Record Modified Successfully";
                        header("Location: ../HTML/user.php?insetion=pass");
    }

    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
    ?>


 <html>
    <head>
    <title>Update User Data</title>
    <meta charset="utf-8">
	<title>finfo_buffer</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="../css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="../fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../css/AddPatient.css"/>
    </head>
    <body>

    <div class="page-content">
		<div class="form-v4-content">
    <form  method="POST" action="" class="form-detail" id="myform">
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>
    <div style="padding-bottom:5px;">
    <!--<a href="retrieve.php">Employee List</a>-->
    </div>
    <h2>USER EDIT FORM</h2>
  
    
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="ID"> ID</label>
						<input type="text" name="id" id="id" class="input-text"  value="<?php echo $row['id'];?>" readonly >
					</div>
					<div class="form-row form-row-1">
						<label for="username">USER NAME</label>
						<input type="text" name="username" id="username" class="input-text" value="<?php echo $row['username']; ?>">
					</div>
				</div>
				<div class="form-row">
					<label for="email">E MAIL</label>
					<input type="text" name="email" id="email" class="input-text" value="<?php echo $row['email'];?>">
				</div>

                <div class="form-row">
					<label for="user_type">USER TYPE</label>
					<input type="text" name="user_type" id="user_type" class="input-text" value="<?php echo $row['user_type'];?>" >
				</div>

                <div class="form-row">
					<label for="password">PASSWORD</label>
					<input type="text" name="password" id="password" class="input-text" value="<?php echo $row['password'];?>" readonly>
				</div>

               
				<div class="form-row-last">
					<input type="submit" name="submit" class="AddPatient" value="EDIT USER">
				</div>
    
    </form>
    </div></div>

    </body>
    </html>

