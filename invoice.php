<?php
    include("server.php");
    include("templates/header3.php");
?>

    
    <form action="invoice.php" method="POST" class='invoice' style="border: none;">
    <h3>Make invoice</h3>
        <label for="cust_email">Customer Phone Number</label>
        <input type="text" name="cust_phone" id="cust_phone">
        <label for="batch_num">Batch number</label>
        <input type="text" name="batch_num" id="batch_num">
        <label for="quantity">quantity</label>
        <input type="text" name="quantity" id="quantity">
        <label for="discount">discount</label>
        <input type="text" name="discount" id="discount">
        <input type="submit" value="sell" name="sell" class="btn brand z-depts-0">
        
    </form>
    <div class="amount" style="color: #829dac;
    margin-left: 480px;
    border: 1px solid black;
    display: fixed;
    padding: 15px;
    width: 100px;">Total Amount: <p4 style="color: black;"><?php echo $price; ?> L.E.</p4></div>
</body>
<?php
include("templates/footer.php"); ?>