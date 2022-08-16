<?php
    include("server.php");
    if(!isset($_SESSION["username"])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<?php include("templates/header3.php");
?>



      <hr class="style-nine">
<div class="dashboard">
    
        <div class="dash">
        
        <?php
        $pharma_id = $_SESSION['pharma_id'];
        $customers = "select count(name) as customers from customers where pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$customers);
        while ($data = mysqli_fetch_array($result)){
            ?>
        <?php echo "<p>".$data['customers']."<p1>▲</p1></p>"; }
        ?>

        <h4>Customers</h4>
        </div>

        <div class="dash">
        <?php
        $suppliers = "select count(name) as suppliers from suppliers where pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$suppliers);
        while ($data = mysqli_fetch_array($result)){
            ?>
            
        <?php echo "<p>".$data['suppliers']."<p1>▲</p1></p>"; }?>
        <h4>Suppliers</h4>
        </div>


        <div class="dash">
        
        <?php
        $invoices = "select count(sale_id) as invoices from sales where pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$invoices);
        while ($data = mysqli_fetch_array($result)){
            ?>
            
        <?php echo "<p>".$data['invoices']."<p1>▲</p1></p>"; }?>
        <h4>Invoices</h4>
        </div>

        

        <div class="dash">
        
        <?php
        $current_date = date("y/m/d");
        $stock = "select count(batch_num) as stock from products where expiry_date > '$current_date' and pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$stock);
        while ($data = mysqli_fetch_array($result)){
            ?>
            
        <?php echo "<p>".$data['stock']."<p2>▼</p2></p>"; }?>
        <h4>Stock</h4>
        </div>


        <div class="dash">
        
        <?php
        $outofstock = "select count(batch_num) as outofstock from products where quantity=0 and pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$outofstock);
        while ($data = mysqli_fetch_array($result)){
            ?>
            
        <?php echo "<p>".$data['outofstock']."<p1>▲</p1></p>"; }?>
        <h4>Out of Stock</h4>
        </div>

        
        <div class="dash">
        
        <?php
        $expired = "select count(batch_num) as expired from products where expiry_date > '$current_date' and quantity>0 and pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$expired);
        while ($data = mysqli_fetch_array($result)){
            ?>
            
        <?php echo "<p>".$data['expired']."<p1>▲</p1></p>"; }?>
        <h4>Expired</h4>
        </div>

    </div>
    <br><br>
    <hr class="style-seven"'>
    <br>
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
            <img src="images/supplier.png" alt="supplier">
            <br>
            <a href="addSupplier.php">Add Supplier</a>
        </div>
        <div class="function">
            <img src="images/purchase.png" alt="purchase">
            <br>
            <a href="purchase.php">Purchase</a>
        </div>
        <div class="function">
            <img src="images/medicine.png" alt="medicine">
            <br>
            <a href="products.php">Products</a>
        </div>
        <div class="function">
            <img src="images/report.png" alt="report">
            <br>
            <a href="report.php">Report</a>
        </div>
        <div class="function">
            <img src="images/manage.png" alt="manage">
            <br>
            <a href="manage.php">Manage Account</a>
        </div>
    </div>
        <?php include("templates/footer.php"); ?>
        

</html>