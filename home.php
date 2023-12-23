<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('failed');
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    
    

    
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="home">
        <div class="content">
            <h3>Pick your product</h3>
            <p>Inroducing our cutting-edge fashion-forward tech haven! Immerse yourself in the seamless blend of style and innovation as our curated collection features the latest iPhone, iPads, and watches.</p>
            <a href="about.php" class="white-btn">Discover More</a>
        </div>
    </section>

    <section class="products">

        <h1 class="title">latest products</h1>

    <div class="box-container">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <form action="" method="post" class="box">
        <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_products['name']; ?></div>
        <div class="price">R<?php echo $fetch_products['price']; ?></div>
        <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php
            }
        }else {
                echo '<p class="empty">no products added yet</p>';
            }

        ?>

    </div>

    <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="shop.php" class="option-btn">Load more</a>
    </div>

    </section>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/popup.jpg" alt="">
            </div>

            <div class="content">
                <h3>About us</h3>
                <p>Welcome to a realm where gadgets become accessories, and style meets technology></p>
                <a href="about.php" class="btn">read more</a>
            </div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
        <h3>have any questions?</h3>
        <p>If you want to know more about us , lets go to our about section</p>
        <a href="about.php" class="white-btn"> Read More</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="./js/script.js"></script>
    <script src="./js/home.js"></script>
</body>
</html>