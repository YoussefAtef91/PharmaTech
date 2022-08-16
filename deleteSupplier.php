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
    <form action="deleteSupplier.php" method = "POST" style="border: none;">
    <h3 style="color: #829dac;">Delete Supplier</h3>
        <label for="name">Supplier's Name</label>
        <input type="text" name="name">
        <input type="submit" name="deleteSupplier" value="delete" class="btn brand z-depth-0">
    </form>
</body>
</html>