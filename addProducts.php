<?php include ("server.php");
include("templates/header3.php"); 

if(isset($_POST['add'])){
    $batch = $_POST['batch'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $expiry = $_POST['expiry'];
    $qunatity = $_POST['qunatity'];
    $pharma_id = $_SESSION['pharma_id'];
    $query = "insert into products values('$batch','$name',$price,'$expiry',$pharma_id,$qunatity)";
    mysqli_query($conn,$query);
    echo'<script>alert("Product Added...")</script>';
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
    <form method="POST" style="border: none;">
    <h3 style="color: #829dac;">Add Products</h3>
        <label>Batch Number</label>
        <input type="text" name='batch'>
        <label>Product Name</label>
        <input type="text" name='name'>
        <label>Price</label>
        <input type="text" name='price'>
        <label>Expiry Date</label>
        <input type="text" name='expiry'>
        <label>Quantity</label>
        <input type="text" name='qunatity'>
        <input type="submit" name="add" value="Add" class="btn brand z-depth-0">
    </form>
</body>
</html>