<?php include('server.php');
include("templates/header4.php") ?>


<section class="container grey-text">
<h4 class="center" style="color: #829dac;">Registeration Page</h4>
        <form action="register.php" method='POST'>
            <label for="pharama">Pharamacy Name</label>
            <input type="text" name="pharma" id="pharma" placeholder="Pharmacy Name"><br><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Address"><br><br>
            <label for="address">City</label>
            <input type="text" name="city" id="city" placeholder="City"><br><br>
            <label for="address">Country</label>
            <input type="text" name="country" id="country" placeholder="counrty"><br><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email"><br><br>
            <label for="contactno">Contact Number</label>
            <input type="text" name="contactno" id="contactno" placeholder="Contact Number"><br><br>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="username" ><br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password"><br><br>
            <label for="conpassword">Confirm Password</label>
            <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password"><br><br>
            <div class="center">
            <input type="submit" name="register" value="Register" class="btn brand z-depts-0">
        </div>
        </form>
</section>
</body>
<?php include("templates/footer.php"); ?>