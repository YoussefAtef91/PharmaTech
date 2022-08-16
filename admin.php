<?php include('server.php')


?>
<!DOCTYPE html>
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

<center><h1 style="color: #829dac;">Admin Page</h1></center>

<table>
    <tr class="cols">
        <td>Username</td>
        <td>Password</td>
        <td>Pharmacy ID</td>
        <td>Pharmacy Name</td>
        <td>Is Admin?</td>
        <td>Pharmacy Address</td>
        <td>Pharmacy City</td>
        <td>Pharmacy Country</td>
        <td>Pharmacy Email</td>
        <td>Pharmacy Phone Number</td>
        <td>Is Subscriped?</td>
        <td>Edit</td>
        <td>Delete</td>        
    </tr>
         <?php 
         $query = "Select * from users join pharma on users.pharma_id = pharma.pharma_id;";
         $records = mysqli_query($conn,$query);
         while ($data = mysqli_fetch_array($records)){
            ?><td><?php echo $data['username']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td><?php echo $data['pharma_id']; ?></td>
            <td><?php echo $data['pharma_name']; ?></td>
            <td><?php echo $data['isAdmin']; ?></td>
            <td><?php echo $data['address']; ?></td>
            <td><?php echo $data['city']; ?></td>
            <td><?php echo $data['country']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['contact_number']; ?></td>
            <td><?php echo $data['subscriped']; ?></td>
            <?php $id = $data['pharma_id'];
            $username = $data['username'];
            $edit_url = "edit.php?id=".$id."&username=".$username;
            $delete_url = "delete.php?id=".$id."&username=".$username; ?>
            <td><a href=<?php echo $edit_url ?>>Edit</a></td>
            <td><a href=<?php echo $delete_url ?>>Delete</a></td>
            </tr>
                <?php
            } ?>
</table>

<footer class="section">
    <div class="center grey-text">copyright © 2022 Youssef Atef, Hesham Gamal, <br> Ibrahim Nady,
        Eman Ahmed, Tasneem Ayman, Irene Nagui.</div>
</footer>

</body>
</html>