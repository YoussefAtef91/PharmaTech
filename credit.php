<?php include('server.php');
include("templates/header4.php") ?>


<section class="container grey-text">
<h4 class="center" style="color: #829dac;">Set up your credit or debit card</h4>
        <form action="login.php" method='POST'>
            <label for="Fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name"><br>
            <label for="Lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last Name"><br>
            <label for="card">Card Number</label>
            <input type="text" name="card" id="card" placeholder="Card number"><br>
            <label for="exp">Expirtaion Date</label>
            <input type="text" name="exp" id="exp" placeholder="Expirtaion Date (MM/YY)"><br>
            <label for="cvv">Security Code (CVV)</label>
            <input type="text" name="cvv" id="cvv" placeholder="Security Code (CVV)"><br>
            <div class="center">
            <input type="submit" name="r" value="Register" class="btn brand z-depts-0">
        </div>
        </form>
</section>
</body>
<?php include("templates/footer.php"); ?>