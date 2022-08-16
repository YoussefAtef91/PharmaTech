<?php 
include ('server.php');
include("templates/header3.php");
if(isset($_POST['addCashier']) && $_SESSION['isAdmin'] == 1){
        
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $conpassword = mysqli_real_escape_string($conn,$_POST['conpassword']);
    $pharma_id = $_SESSION['pharma_id'];

    if($password = $conpassword){
        $query = "insert into users (pharma_id,username,password,isAdmin)
        values('$pharma_id','$username','$password',0)";
        mysqli_query($conn,$query);
        header('location:home.php');
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
<form action="addCashier.php" method='POST' style="border: none; ">
<h3 style="color: #829dac;">Add Cashier</h3>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="username" ><br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password"><br><br>
            <label for="conpassword">Confirm Password</label>
            <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password"><br><br>
            <input type="submit" value="add" name="addCashier" class="btn brand z-depth-0">
        </form>
</body>
</html>