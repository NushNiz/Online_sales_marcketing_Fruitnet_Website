



    <?php 
include('../../../../function.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../../../../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../../../../login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Fruitnet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link res="stylesheet" href="../../AdminDashboard/adminDash.css">
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
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color:  #3786bd;
    color: white;
    }

    .btndele{
      background-color: red;
      border-radius:8px;
      padding:5px;
      color:white;
      
    }

    .btnedit{
      background-color: yellow;
      border-radius:8px;
      padding:5px;
      color:white;
    }

    .btncreate{
      background-color: green;
      border-radius:8px;
      padding:5px;
      color:white;
    }
    #dashco{
      background-color: #ADD8E6;
      text-align: center;
      font-weight:bold;
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
      <li ><a href="../../adminDash.php">Dashboard</a></li>
        <li class="active"><a href="#">User Management</a></li>
        <li ><a href="../../stock.php">Stock management</a></li>
       
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Fruitnet</h2>
      <img  style="width:150px; height:150px ;"  src="../../../../assets/img/logo.png">
      <ul class="nav nav-pills nav-stacked">
      <li ><a href="../../adminDash.php">Dashboard</a></li>
        <li class="active"><a href="#">User Management</a></li>
        <li ><a href="../../stock.php">Stock management</a></li>
       
      </ul><br>
    </div>
    <br>
  
    <div>
   
<div class="col-sm-9" >
<div class="well">
        <table>
            <tr>
                <td> <div class="well" id="dashco">
            <h3 class="empal">USER INFO</h3>

    </table>
    </td></tr>		
</tr>
</table> </center>
      </div>
            <br>
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

              $result = mysqli_query($conn,"SELECT * FROM users");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>

                    <table>
                        <tr>
                          <td>ID</td>
                        <td>username</td>
                        <td>email</td>
                        <td>user_type</td>
                        <td>password</td>
                       
                        <td>Action</td>
                        </tr>
                          <?php
                          $i=0;
                          while($row = mysqli_fetch_array($result)) {
                          ?>
                        <tr>
                          <td><?php echo $row["id"]; ?></td>
                          <td><?php echo $row["username"]; ?></td>
                          <td><?php echo $row["email"]; ?></td>
                          <td><?php echo $row["user_type"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        
                        <td><a href="../PHP/updateUser.php?id=<?php echo $row["id"]; ?>">Update</a>
                        <a href="../PHP/deleteUser.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                          </tr>
                          <?php
                          $i++;
                          }
                          ?>
                    </table>
                    <?php
                      }
                      else
                      {
                          echo "No result found";
                      }
                      ?>
<button class="btncreate">  <a style="text-decoration:none; color:white;" href="../../../create_user.php"> Create User</a>


    </div>
  </div>
</div>
    
</body>
</html>
