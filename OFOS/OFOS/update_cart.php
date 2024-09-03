<?php
    session_start();
    include 'db.php';
    $cart_id = $_POST['cart_id'];
    $qty = $_POST['update_qty'];

    // echo $prod_id; exit;
    $stmt = $conn->prepare('update cart set qty = '.$qty.' where id ='.$cart_id);
    $stmt->execute();
    
    header("Location:cart.php");

?>