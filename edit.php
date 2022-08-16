<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <style type="text/css">
         .brand{
             background: #829dac !important;
             ;
         }
         .brand-text{
             color: #829dac !important;
         }
         form{
             max-width: 460px;
             margin: 20px auto;
             padding: 20px;
             border: grey;
             border-style: solid;
             border-width: 0.1px;
         }
     </style>     
     <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include("server.php");
    $id = $_GET['id'];
    $username = $_GET['username'];


    $query = mysqli_query($conn,"Select * from users join pharma on users.pharma_id = pharma.pharma_id where users.pharma_id = '$id' and users.username='$username';");
    $data = mysqli_fetch_array($query);
    if(isset($_POST['edit'])){
        $new_username = $_POST['username'];
        $password = $_POST['password'];
        $isAdmin = $_POST['isAdmin'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $phone = $_POST['contact_number'];
        $subscriped = $_POST['subscriped'];

        $query2 = "update users set username='$new_username', password='$password', isAdmin='$isAdmin' where username = '$username';";
        $query3 = "update pharma set address='$address', city='$city', country='$country', email='$email', contact_number='$phone'
        ,subscriped='$subscriped' where pharma_id = '$id'; ";
        mysqli_query($conn,$query2);
        mysqli_query($conn,$query3);
        header("location:admin.php");
    }


    
    ?>
    <center><h3 style="color: #829dac;">Update Data</h3></center>
    <form method="POST">
        <label for="">Username</label>
        <input type="text" name='username' value="<?php echo $data['username']?>" placeholder="Username" required>
        <label for="">Password</label>
        <input type="text" name='password' value="<?php echo $data['password']?>" placeholder="Password" required>
        <label for="">Is Admin? (0 & 1)</label>
        <input type="text" name='isAdmin' value="<?php echo $data['isAdmin']?>" placeholder="Is Admin?" required>
        <label for="">Pharmacy Address</label>
        <input type="text" name='address' value="<?php echo $data['address']?>" placeholder="Pharmacy Address" required>
        <label for="">Pharmacy City</label>
        <input type="text" name='city' value="<?php echo $data['city']?>" placeholder="Pharmacy City" required>
        <label for="">Pharmacy Country</label>
        <input type="text" name='country' value="<?php echo $data['country']?>" placeholder="Pharmacy Country" required>
        <label for="">Pharmacy Email</label>
        <input type="text" name='email' value="<?php echo $data['email']?>" placeholder="Pharmacy Email" required>
        <label for="">Pharmacy Phone Number</label>
        <input type="text" name='contact_number' value="<?php echo $data['contact_number']?>" placeholder="Contact_number" required>
        <label for="">Is Subscriped? (0 $ 1)</label>
        <input type="text" name='subscriped' value="<?php echo $data['subscriped']?>" placeholder="Is Subscriped?" required>
        <input type="submit" name="edit" value="Edit" class="btn brand z-depth-0">
    </form>

    <footer class="section">
    <div class="center grey-text">copyright © 2022 Youssef Atef, Hesham Gamal, <br> Ibrahim Nady,
        Eman Ahmed, Tasneem Ayman, Irene Nagui.</div>
</footer>
</body>
</html>