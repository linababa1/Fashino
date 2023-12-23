<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styles.css">

   

</head>
<body>
    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>about us</h3>
        <p><a href="home.php"></a> | about</p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/popup.jpg" alt="">
            </div>

            <div class="content">
                <h3>Why choose us?</h3>
                <p>Inroducing our cutting-edge fashion-forward tech haven! Immerse yourself in the seamless blend of style and innovation as our curated collection features the latest iPhone, iPads, and watches.</p>
                <p>Welcome to a realm where gadgets become accessories, and style meets technology</p>
                <a href="contact.php" class="btn">Contact us</a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="./js/script.js"></script>
    <script src="./js/home.js"></script>
</body>
</html>