<?php include ("server.php");
include("templates/header1.php"); 

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
<center><h3 style="color: #829dac;">Search For Products</h3></center>
    <form action="search4customers.php" method='POST' style="border: none;">
        <label>Product Name</label>
        <input type="text" name='product' placeholder="Product" equired>
        <label>City</label>
        <input type="text" name='city' placeholder="City" equired>
        <input type="submit" name="search4product" value="Search" class="btn brand z-depth-0">
    </form>

<?php
if(isset($_POST['search4product'])){
    $product = $_POST['product'];
    $city = $_POST['city'];
    $query = "select products.name, products.price,pharma.pharma_name, pharma.address, pharma.city, pharma.email, pharma.contact_number
    from products join pharma on products.pharma_id = pharma.pharma_id where products.name = '$product' and pharma.city = '$city';";
    $records = mysqli_query($conn,$query);
    while($data = mysqli_fetch_array($records)){
        ?>
        <table>
            <tr>
                <td>Product Name</td>
                <td>Price</td>
                <td>Pharmacy Name</td>
                <td>Address</td>
                <td>City</td>
                <td>Email</td>
                <td>Contact Number</td>
            </tr>
            <tr>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['pharma_name'];?></td>
                <td><?php echo $data['address'];?></td>
                <td><?php echo $data['city'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['contact_number'];?></td>


            </tr>
        </table><?php
    }
}
?>

</body>
</html>