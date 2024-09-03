<?php
session_start();
include 'db.php';
$customer_id = $_SESSION['id'];

// Fetch food items
$restaurant_ids = array();
$sql_restaurant = "select R_ID from tbl_restaurants where o_id = ".$customer_id;
$result_restaurant = $conn->query($sql_restaurant);
while($row_rastaurant = $result_restaurant->fetch_assoc()){
    array_push($restaurant_ids,$row_rastaurant['R_ID']);
}
$rest_ids = implode(",",$restaurant_ids);

$sql = "
    SELECT *
    FROM orders
    WHERE EXISTS (SELECT 1 FROM order_details WHERE order_details.order_id = orders.id and res_id IN (".$rest_ids."))
";

// echo $sql; exit;
// $sql = "SELECT * FROM orders " ;
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>order_cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        td img {
            width: 100px;
            height: auto;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Order Cart</h1>

   <button class="back-button" onclick="history.back()">Back</button>
   

    <table>
        <tr>
            <th>S.NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Shipping address</th>
            <th>Order Amount</th>
            <!--<th>Status</th>-->
           
          
        </tr>
        <?php 
        $grand_total = 0;
        $customer_id = "";
        $i = 1;
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                $sql = "select * from order_details where res_id IN (".$rest_ids.") AND order_id = ".$row['id'];
                $res = $conn->query($sql);
            ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            
            <td><?php echo $row['shipping_address']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
           <!-- <td><a href="delivered.php?delivered=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure delivered this product to customer?')" class="delete-btn"> <i class="fas fa-trash"></i> Delivered</a></td>-->
        </tr>
        <tr>
            <td colspan="3">Items</td>

            <td>
                <?php 
                    while($detail = mysqli_fetch_assoc($res)){
                        ?>
                        <div><?php echo $detail['food_name']?> - <?php echo $detail['qty']?></div>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <?php $i++; } 
        } else {
            echo "<tr><td colspan='5'>No order placed</td></tr>";
        } 
        
        
        ?>
        <!-- <tr>
            <td colspan="5">Total: </td>
            <td colspan="2"><?php echo $grand_total;?></td>
        </tr> -->
    </table>
   <!-- <a href="checkout.php?cust_id=<?php echo $customer_id;?>" class="check-out">Checkout</a>-->
</body>
</html>
