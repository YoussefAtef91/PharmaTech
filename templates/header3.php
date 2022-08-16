<head>
    <title>Home</title>
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
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-1">
        <div class="container">
            <a href="home.php" class="brand-logo brand-text">Home</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="home.php?logout='1'" class="btn brand z-depth-0">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="side">
    <div class="profile" style="margin-left: 20px;">
        <img src="images/doc1.jpg"width="120px">
        <?php
        echo "<p>".$_SESSION['username']."</p>"
        ?>
        </div>
        <hr class = "style-eight" width="90%" style='margin-bottom:15px;'>

        <a href="home.php">Dashboard</a>
        <a href="invoice.php">Make Invoice</a>
        <a href="addCustomer.php">Add Customer</a>
        <a href="deleteCustomer.php">Delete Customer</a>
        <a href="addSupplier.php">Add Supplier</a>
        <a href="deleteSupplier.php">Delete Supplier</a>
        <a href="purchase.php">Purchase</a>
        <a href="customers.php">Search Customers</a>
        <a href="addProducts.php">Add Products</a>
        <a href="products.php">Search Products</a>
        <a href="report.php">Report</a>
        <a href="addCashier.php">Add Cashier</a>
        <a href="#">Manage Account</a>
        <a href="changePassword.php" style="margin-left:10px; font-size:10px">• Change Password</a>
        <a href="changePharma.php" style="margin-left:10px; font-size:10px">• Change Pharmacy Name</a>
        
        
      </div>  

      