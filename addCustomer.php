<?php include ("server.php");
include("templates/header3.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="addCustomer.php" method ="POST" style="border: none;">
        <h3 style="color: #829dac;">Add Customer</h3>
        <label for="name">Name</label>
        <input type="text" name='name'>
        <label for="email">Email</label>
        <input type="text" name='email'>
        <label for="phone">Phone</label>
        <input type="text" name='phone'>
        <input type="submit" name="addCustomer" class="btn brand z-depth-0">
    </form>
</body>
</html>