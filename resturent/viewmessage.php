<?php

@include 'config.php';

$select_messages = mysqli_query($conn, "SELECT * FROM `contact_form`");
$messages = [];
if(mysqli_num_rows($select_messages) > 0){
    while($row = mysqli_fetch_assoc($select_messages)){
        $messages[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

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
<h1 class="heading">Customer Messages</h1>
    <table class="messages-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($messages)): ?>
                <?php foreach($messages as $message): ?>
                    <tr>
                        <td><?php echo $message['name']; ?></td>
                        <td><?php echo $message['email']; ?></td>
                        <td><?php echo $message['mobile']; ?></td>
                        <td><?php echo $message['subject']; ?></td>
                        <td><?php echo $message['message']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No messages to display.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>


<script src="js/script.js"></script>

</body>
</html>
