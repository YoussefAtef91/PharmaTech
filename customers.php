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
    
    <center>
    <section style="margin-left: 200px;">
    <h3 style="color: #829dac;">Customers</h3>
        <table border=2>
            <tr style="color: #829dac; font-weight: bold;">
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Number of invoices</td>
            </tr>
            <?php
            $pharma_id = $_SESSION['pharma_id'];
            $records = mysqli_query($conn,"select * from customers where pharma_id='$pharma_id'");
            while($data = mysqli_fetch_array($records)){
                ?>
            <tr>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['contact_number']; ?></td>
                <td><?php echo $data['n_invoices']; ?></td>
            </tr>
            <?php
            } ?>
        </table>
        </section>
    </center>
</body>
</html>