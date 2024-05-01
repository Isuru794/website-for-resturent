<?php
@include 'config.php';


$select_orders = mysqli_query($conn, "SELECT * FROM `order`"); 
$orders = [];
if(mysqli_num_rows($select_orders) > 0){
    while($row = mysqli_fetch_assoc($select_orders)){
        $orders[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - View Orders</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  
    <link rel="stylesheet" href="css/style.css">
  
    <header class="header">
        <div class="flex">
            <a href="#" class="logo">IMS resto.</a>
            <nav class="navbar">
                <a href="dashbord.php">home</a>
                <a href="admin.php">add product</a>
                <a href="viewmessage.php">messages</a>
                <a href="vieworders.php">orders</a>
               
            </nav>
        </div>
    </header>
</head>
<body>

<section class="messages-container">
    <h1 class="heading">View Orders</h1>
    <table class="orders-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th>Delivery Address</th>
                <th>District</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['name']; ?></td>
                <td><?php echo $order['email']; ?></td>
                <td><?php echo $order['method']; ?></td>
                <td><?php echo $order['address']; ?></td>
                <td><?php echo $order['district']; ?></td>
                <td><?php echo $order['total_product']; ?></td>
                <td><?php echo $order['total_price']; ?></td>
                <td><?php echo $order['number']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


<script src="js/script.js"></script>

</body>
</html>
