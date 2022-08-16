<?php include 'server.php';

$id = $_GET['id'];
$username = $_GET['username'];
$query = "delete from users where username = '$username' and pharma_id='$id';";

mysqli_query($conn,$query);
header("location:admin.php");
?>
