<?php include("server.php");
include("templates/header3.php");
?>
    <center>
    <div class="header">
    <h1>Sales Report</h1>
    <form action="report.php" method='POST' class='report'>
        <label for="start_date">Start Date</label>
        <input type="date" id="start" name="date" value="2022-01-01">
        <input type="submit" name='update' value='update' class="update">
    </form>
    <section style="margin-left: 200px;">
        <table>
            <tr class='cols'>
                <td>Pharmacist</td>
                <td>Customer</td>
                <td>Sales Date</td>
                <td>Sales Time</td>
                <td>Total Amount</td>
            </tr>
            <?php
            //$day7 = date('d/m/Y', strtotime('-7 days'));
            if(isset($_POST['update'])){
                $date = mysqli_real_escape_string($conn,$_POST['date']);
                $pharma_id = $_SESSION["pharma_id"];
                $records = mysqli_query($conn,"select * from sales join customers on sales.customer_phone_number = customers.contact_number
                where sales.sales_date > '$date' and sales.pharma_id = '$pharma_id'");
                while($data = mysqli_fetch_array($records)){
                    ?>
                <tr>
                    <td><?php echo $data['pharmacist_name']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['sales_date']; ?></td>
                    <td><?php echo $data['sales_time']; ?></td>
                    <td><?php echo $data['total_amount']; ?></td>
                </tr>
                <?php
            } ?>
        </table>
        <?php } 
        if(!isset($_POST['update'])){
        $pharma_id = $_SESSION["pharma_id"];
        $records = mysqli_query($conn,"select * from sales join customers on sales.customer_phone_number = customers.contact_number
        where sales.pharma_id = '$pharma_id'");
        
        while($data = mysqli_fetch_array($records)){
            ?>
        <tr>
            <td><?php echo $data['pharmacist_name']; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['sales_date']; ?></td>
            <td><?php echo $data['sales_time']; ?></td>
            <td><?php echo $data['total_amount']; ?></td>
        </tr>
        <?php
        } ?>
    </table>
    <?php }
        ?>
        </div>
        </section>
    </center>
</body>
<?php include("templates/footer.php") ?>