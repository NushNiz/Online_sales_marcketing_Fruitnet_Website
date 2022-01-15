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

$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: ../HTML/user.php?insetion=pass");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>