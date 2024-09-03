<?php
    session_start();
    include 'db.php';
    $customer_id = $_SESSION['id'];
    $prod_id = $_POST['product_id'];

    // echo $prod_id; exit;
    $stmt = $conn->prepare('SELECT * FROM view_foods where F_ID ='. $prod_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $food_name = $row['foodname'];
    $price = $row['price'];
    $image = $row['image'];
    $r_id = $row['R_ID'];
    $sql = 'insert into cart (customer_id,rest_id,food_name, price, image, qty, total_price) values ('.$customer_id.','.$r_id.',"'.$food_name.'","'.$price.'","'.$image.'",1,"'.$price.'")';
    // echo $sql; exit;
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();

    echo "success"; exit;

?>