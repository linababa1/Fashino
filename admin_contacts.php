<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id  = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `messages` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">

</head>
<body>
    
    <?php
        include 'admin_header.php';
    ?>

    <section class="messages">
        <h1 class="title">Messages</h1>
        <div class="box-container">
        <?php
        $select_message = mysqli_query($conn, "SELECT * FROM `messages`") or die('query failed');
        if(mysqli_num_rows($select_message) > 0){
            while($fetch_message = mysqli_fetch_assoc($select_message)){
        ?>
            <div class="box">
                <p> name : <span><?php echo $fetch_message['name'] ?></span></p>
                <p> number : <span><?php echo $fetch_message['number'] ?></span></p>
                <p> email : <span><?php echo $fetch_message['email'] ?></span></p>
                 <p> message : <span><?php echo $fetch_message['messages'] ?></span></p>
                <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');" class="delete-btn">delete message</a>
            </div>
            <?php
                };
            }  else {
                echo '<p class="empty">You have no messages</p>';
            }
            ?>
        </div>
    </section>
    

    
<script src="./js/admin.js"></script>
</body>
</html>