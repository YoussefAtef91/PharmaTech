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
    <h3 style="color: #829dac;">Search For Products</h3>
        <label for="Product_name">Product Name</label>
        <input type="text" name="search" id="p_name">
        <input type="submit" name="submit" value="search" class="btn brand z-depth-0">
    </form>
    <section style="margin-left: 200px;">
    <?php 
    
    //search
    if(isset($_POST['submit'])){
        $st = $_POST['search'];
        $result = mysqli_query($conn,"Select * from products where name = '$st'");

        if($row = mysqli_fetch_array($result)){
            ?>
            <br><br>
            <center>
            <table border=1>
            <tr>
                <th> Name </th>
                <th> Batch Number </th>
                <th> Quantity </th>
                <th> Exipry Date </th>
                <th> Price </th>
                
            </tr>
        <?php
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row["batch_num"]."</td>";
            echo "<td>".$row["quantity"]."</td>";
            echo "<td>".$row["expiry_date"]."</td>";
            echo "<td>".$row["price"]."</td>";
            
            echo "</tr>";
        ?>
        </table>
        </center>
        <?php 
        }
        else {
            echo "Product does'nt exist";
        } }
        
        ?>
        </section>
</body>
</html>