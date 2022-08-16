<?php
include ("server.php");

if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        echo "Username is required";
        echo "<br>";
    }
    if(empty($_POST['password'])){
        echo "Password is required";
        echo "<br>";
    } 
    } //end of POST check

?>
<!DOCTYPE html>
<html>
<?php include("templates/header2.php"); ?>

    <section class="container grey-text">
    <h4 class="center" style="color: #829dac;">Login Page</h4>
    <form  action="login.php" method="POST" class="white" style="border:1px solid #829dac;">

        <label>Pharmacy Name:</label>
        <input type="text" name="pharmaname" placeholder="pharmaname">

        <label>Username:</label>
        <input type="text" name="username" placeholder="username">

        <label>Password:</label>
        <input type="password" name="password" placeholder="password" autocomplete="off">
        
        <div class="center">
            <input type="submit" name="login" value="LOGIN" class="btn brand z-depts-0">
        </div>
    </form>
</section>

    <?php include("templates/footer.php"); ?>

</html>