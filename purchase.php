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
    <form method="POST" style="border: none;">
    <h3 style="color: #829dac;">Make Purchases</h3>
        <label for="product">product name</label>
        <input type="text" name="product"><br>
        <label for="supplier">Supplier</label>
        <input type="text" name="supplier"><br>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity"><br>
        <input type="submit" name="purchase" value="send request" class="btn brand z-depth-0">
    </form>
</body>
</html>