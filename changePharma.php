<?php include ("server.php");
include("templates/header3.php"); 

if(isset($_POST['change_pharma'])){
    $new = mysqli_real_escape_string($conn,$_POST['new']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);
    $pharma_id = $_SESSION['pharma_id'];
    $username = $_SESSION['username'];
    $query0 = "select password from users where username = '$username' and pharma_id = '$pharma_id';";
    $result = mysqli_query($conn,$query0);
    $data = mysqli_fetch_array($result);
    $password = $data['password'];
    if($password == $pass){
        $query1 = "update pharma set pharma_name = '$new' where pharma_id = '$pharma_id';";
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
    <form action="changePharma.php" method='POST' style="border: none;">
    <h3 style="color: #829dac;">Change Pharmacy Name</h3>
        <label>New Name</label>
        <input type="text" name='new'>
        <label>Password</label>
        <input type="password" name='pass'>
        <input type="submit" name="change_pharma" value="Submit" class="btn brand z-depth-0">
    </form>
</body>
</html>