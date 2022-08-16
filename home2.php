<?php
    include("server.php");
    if(!isset($_SESSION["username"])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<?php include("templates/header5.php");
?>


<section>
    <div class="functions">
        <div class="function">
            <img src="images/invoice.png" alt="invoice">
            <br>
            <a href="invoice.php">Make Invoice</a>
        </div>

        <div class="function">
            <img src="images/customer.png" alt="customer">
            <br>
            <a href="addCustomer.php">Add Customer</a>
        </div>


        <div class="function">
            <img src="images/medicine.png" alt="medicine">
            <br>
            <a href="products.php">Products</a>
        </div>
        
    </div>
        <?php include("templates/footer.php"); ?>
        

</html>