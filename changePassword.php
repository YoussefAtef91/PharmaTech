<?php include ("server.php");
include("templates/header3.php"); 

if(isset($_POST['change_pass'])){
    $old = mysqli_real_escape_string($conn,$_POST['old']);
    $new = mysqli_real_escape_string($conn,$_POST['new']);
    $con = mysqli_real_escape_string($conn,$_POST['con']);
    $pharma_id = $_SESSION['pharma_id'];
    $username = $_SESSION['username'];
    $query0 = "select password from users where username = '$username' and pharma_id = '$pharma_id';";
    $result = mysqli_query($conn,$query0);
    $data = mysqli_fetch_array($result);
    $password = $data['password'];
    if($password == $old and $new == $con){
        $query1 = "update users set password = '$new' where username = '$username' and pharma_id = '$pharma_id';";
        mysqli_query($conn,$query1);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="changePassword.php" method='POST' style="border: none;">
    <h3 style="color: #829dac;">Change Password</h3>
        <label>Old Password</label>
        <input type="password" name='old'>
        <label>New Password</label>
        <input type="password" name='new'>
        <label>Confirm Password</label>
        <input type="password" name='con'>
        <input type="submit" name="change_pass" value="Submit" class="btn brand z-depth-0">
    </form>
</body>
</html>