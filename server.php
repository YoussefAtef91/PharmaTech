<?php
    //Database connection
    if(!isset($_SESSION)){ 
        session_start();}

    include("db.php");

    //register
    if(isset($_POST['register'])){
        $pharma_name = mysqli_real_escape_string($conn,$_POST['pharma']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $contactno = mysqli_real_escape_string($conn,$_POST['contactno']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $conpassword = mysqli_real_escape_string($conn,$_POST['conpassword']);

        if($password = $conpassword){
            $query0 = "insert into pharma(pharma_name,address,city,country,email,contact_number,subscriped)
            values('$pharma_name','$address','$city','$country','$email','$contactno',1)";
            mysqli_query($conn,$query0);
            $id = "select pharma_id from pharma where pharma_name = '$pharma_name';";
            $result = mysqli_query($conn,$id);
            while ($data = mysqli_fetch_array($result)){
                $pharma_id = $data['pharma_id'];
            }
            $query1 = "insert into users(username,password,pharma_id,isAdmin) values('$username','$password','$pharma_id',1);";
            mysqli_query($conn,$query1);
            header('location:plan.php');
        }
}

//login
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $pharmaname = mysqli_real_escape_string($conn,$_POST['pharmaname']);
    
    $query = "Select * from users join pharma on users.pharma_id = pharma.pharma_id where username = '$username' and password = '$password' and pharma_name = '$pharmaname'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $_SESSION['isAdmin'] = $row['isAdmin'];
        $_SESSION['pharma_id'] = $row['pharma_id'];
    }
    

    if(mysqli_num_rows($result)==1 && $_SESSION['isAdmin'] == 1){
        $_SESSION["username"] = $username;
        $_SESSION["success"] = " is now logged in.";
        header('location:home.php');
    }
    if(mysqli_num_rows($result)==1 && $_SESSION['isAdmin'] == 0){
        $_SESSION["username"] = $username;
        $_SESSION["pharma"] = $pharma;
        $_SESSION["success"] = " is now logged in.";
        header('location:home2.php');
    }
    if(mysqli_num_rows($result)==0){
        echo'<script>alert("Username or Password Incorrect")</script>';
    }
}
//logout
if(isset($_GET["logout"])){
    session_destroy();
    unset($_SESSION["username"]);
    unset($_SESSION["pharma_id"]);
    unset($_SESSION["isAdmin"]);
    header('location:login.php');

}
//invoice
$price = 0;
if(isset($_POST["sell"])){
    $batch = mysqli_real_escape_string($conn,$_POST['batch_num']);
    $quan = mysqli_real_escape_string($conn,$_POST['quantity']);
    $discount = mysqli_real_escape_string($conn,$_POST['discount']);
    $c_phone = mysqli_real_escape_string($conn,$_POST['cust_phone']);
    $pharma_id = $_SESSION["pharma_id"];
    $query = "update products set quantity = quantity - '$quan' where batch_num = '$batch' and pharma_id = '$pharma_id'";
    $result = mysqli_query($conn,$query);
    if($result){
        $query0 = "update customers set n_invoices = n_invoices + 1 where contact_number = '$c_phone' and pharma_id = '$pharma_id'";
        mysqli_query($conn,$query0);
        $query1 = "select price from products where batch_num = '$batch' and pharma_id = '$pharma_id'";
        $result = mysqli_query($conn,$query1);
        $price = mysqli_fetch_array($result);
        $price = $price[0] * $quan * (1 - $discount);
        date_default_timezone_set('Africa/Cairo');
        $date = date('y/m/d');
        $time = date("h:i:s");
        $pharmacist_name = $_SESSION['username'];
        $query2 = "insert into sales (total_amount,customer_phone_number,sales_date,sales_time,pharma_id,pharmacist_name)
        values('$price','$c_phone','$date','$time','$pharma_id','$pharmacist_name')";
        mysqli_query($conn,$query2);
    }
}//Add customer
if(isset($_POST['addCustomer'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $pharma_id = $_SESSION["pharma_id"];
    $query = "insert into customers (name,email,contact_number,pharma_id,n_invoices) values('$name','$email','$phone','$pharma_id',0)";
    mysqli_query($conn,$query);
}

//Delete customer
if(isset($_POST['delete']) && $_SESSION['isAdmin'] == 1){
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $pharma_id = $_SESSION["pharma_id"];
    $query = "delete from customers where contact_number = '$phone' and pharma_id = '$pharma_id'";
    mysqli_query($conn,$query);
}

//Add supplier
if(isset($_POST['addSupplier']) && $_SESSION['isAdmin'] == 1){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $pharma_id = $_SESSION["pharma_id"];
    $query = "insert into suppliers (name,email,contact_number,pharma_id) values('$name','$email','$phone','$pharma_id')";
    mysqli_query($conn,$query);
}

//Delete supplier
if(isset($_POST['deleteSupplier']) && $_SESSION['isAdmin'] == 1){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $pharma_id = $_SESSION["pharma_id"];
    $query = "delete from suppliers where name = '$name' and pharma_id = '$pharma_id'";
    mysqli_query($conn,$query);
}

//purchase
if(isset($_POST['purchase']) && $_SESSION['isAdmin'] == 1){
    $product = mysqli_real_escape_string($conn,$_POST['product']);
    $supplier = mysqli_real_escape_string($conn,$_POST['supplier']);
    $quan = mysqli_real_escape_string($conn,$_POST['quantity']);
    $pharma_id = $_SESSION["pharma_id"];
    $result1 = mysqli_query($conn,"select email from suppliers where name = '$supplier' and pharma_id = '$pharma_id'");
    $email = mysqli_fetch_array($result1);
    $email = $email[0];
    $header = "From:youssefatef007@gmail.com";
    $message = "we need $quan of $product.";
    $subject = "Purchase";
    //$send = mail($email,$subject,$message,$header);
    //if($send == true){
        //echo "Order sent successfully...";
    //}
    //else{
        //echo "Order failed to send...";
    //}
    echo'<script>alert("Order sent successfully...")</script>';
}

?>