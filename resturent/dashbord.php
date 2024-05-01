

<?php
@include 'config.php';
    session_start();
    $db_name = "resturent"; // Database name
    $connection = mysqli_connect("localhost", "root", "", $db_name); // Corrected variable usage

    if(isset($_POST["add"])){
        if(isset($_SESSION["shopping_cart"])){
            $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'product_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'product_quantity' => $_POST["quantity"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Product is already in the cart")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $value){
                if($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Product has been removed")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>

<html>
<head>
   
    <title>IMS resturent</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!-------font avesome links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  
    



    <!--------css-->
     
     <link rel="stylesheet" href="css/Styles.css">
</head>

<body >
    
    <!-----------------------header-->
   <header>
    <a href="#" class="logo">IMS resto.</a>


    <nav class="navbar" >
    <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#products">Menu</a>
        <a href="#order">Contact</a>
    </nav>



    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="admin.php" class="fa fa-lock" aria-hidden="true"></a>

    </div>
</header>


   

    <form action="" id="search-form">
        <input type="search" placeholder="search here......"  name="" id="search-box">
        <label for="search-box" class="fas fa-shopping-cart"></label>
        <i class="fas fa-times" id="close"></i>
    </form>




<!---------------------------Home----------------------------->

<section class="Home" id="home">
    <div class="swiper mySwiper home-slider">

        <div class="swiper-wrapper wrapper">

          <div class="swiper-slide slide">
            <div class="content">
                <span>Our special dish</span>
                <h3>Chicken rice</h3>
                
                <a href="#" class="btn">order now</a>
            </div>
            <div class="image">
                <img src="images/rice.png" alt="">
            </div>
          </div>

          <div class="swiper-slide slide">
            <div class="content">
                <span>Our special dish</span>
                <h3>Spicy noodles</h3>
                
                <a href="#" class="btn">order now</a>
            </div>
            <div class="image">
                <img src="noodles.png" alt="">
            </div>
          </div>



          <div class="swiper-slide slide">
          <div class="content">
                <span>Our special dish</span>
                <h3>Kottu</h3>
                <a href="products.php" class="btn">order now</a>
            </div>
            <div class="image">
                <img src="images/kottu1.png" alt="">
            </div>
          </div>

        </div>
            
          </div>

        </div>

         <div class="swiper-pagination"></div>
</div>
</section>





<!------------------------------About-------------------------------->

<section class="about" id="about">

    <h3 class="sub-heading">about us</h3>
    <h1 class="heading">why are we special</h1>


    <div class="row">
    
       <div class="image">
        <img src="images/IMS.png" alt=""> 
       </div>

        <div class="content">
          <h3> best foods in srilanka</h3>
           <p>Welcome to IMS Resturent!<br> We're dedicated to serving the best of Sri Lankan cuisine with a focus on quality, tradition,
                 and exceptional service. From aromatic curries to flavorful rice and noodle specialties, each dish at I Resto is crafted with care, reflecting the vibrant flavors of our island nation. 
                <br>                     Join us for a culinary journey through Sri Lanka's rich culinary heritage. We look forward to serving you soon!</p>

            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
          
        </div>
    </div>

</section>


<!-------------------------------menu---------------------->

<section class="products" id="products">
    <h3 class="sub-heading">Our Menu</h3>
    <h1 class="heading">Today's Special</h1>
    <div class="box-container">

<?php

$select_products = mysqli_query($conn, "SELECT * FROM `products`");
if(mysqli_num_rows($select_products) > 0){
   while($fetch_product = mysqli_fetch_assoc($select_products)){
?>

         <form action="" method="post">
                <div class="box">
                 <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                 <h3><?php echo $fetch_product['name']; ?></h3>
                 <div class="price">RS.<?php echo $fetch_product['price']; ?>/=</div>
                     <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                     <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="submit" class="btnn" value="add to cart" name="add_to_cart">
                 </div>
          </form>

<?php
   };
};
?>

</div>
</section>








<!-----------------------------------------contact--------------------------->


<section class="order" id="order">


<h3 class="sub-heading">text with us</h3>
<h1 class="heading">contact</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="inputBox">
        <div class="input">
            <span>Your Name</span>
            <input type="text" name="name" placeholder="Enter your name">
        </div>
        <div class="input">
            <span>Your Email</span>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
    </div>
    <div class="inputBox">
        <div class="input">
            <span>Mobile Number</span>
            <input type="text" name="mobile" placeholder="Enter your mobile number">
        </div>
        <div class="input">
            <span>Subject</span>
            <input type="text" name="subject" placeholder="Enter subject">
        </div>
    </div>
    <div class="inputBox">
        <div class="input">
            <span>Your Message</span>
            <textarea name="message" placeholder="Enter your message"></textarea>
        </div>
    </div>
    <input type="submit" value="Send Message" class="btn">
</form>

</section>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : '';
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($conn, $_POST['subject']) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

    $sql = "INSERT INTO contact_form (name, email, mobile, subject, message) VALUES ('$name', '$email', '$mobile', '$subject', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Message sent successfully!");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}


mysqli_close($conn);
?>





<!---------------------------------footer-------------------------------->

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Location</h3>
            <a href="#">eheliyagoda</a>
            <a href="#">Rathnapura</a>
            <a href="#">awissawella</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">menu</a>
            <a href="#order">contact</a>
        </div>

        <div class="box">
            <h3>contact-info</h3>
            <a href="#">01125656987</a>
            <a href="#">0745869987</a>
            <a href="#">imsresto@gmail.com</a>
            <a href="#">main street,eheliyagoda</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
        </div>
    </div>

    <div class="credit">copyright @ 2024 by <span>isuru</span></div>
</section>




<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>    
</body>
</html>
