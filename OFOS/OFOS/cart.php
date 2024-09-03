<?php
session_start();
include 'db.php';
$customer_id = $_SESSION['id'];
// Fetch food items

$sql = "SELECT * FROM cart  where customer_id = ".$customer_id." group by food_name" ;
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>view_cart</title>
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
        a{
            text-decoration: none;
        }
        a:hover{
            color:red;
        }
    </style>
</head>
<body>
    <h1>View Cart</h1>

    <button class="back-button" onclick="history.back()">Back</button>

    <table>
        <tr>
            <th>ID</th>
            <th>Food name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>total price</th>
            <th>Action</th>
          
        </tr>
        <?php 
        $grand_total = 0;
        $customer_id = "";
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                $grand_total =   $grand_total+($row['total_price']*$row['qty']);  
                $customer_id = $row['customer_id']; 
            ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['food_name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><img src="./uploads/<?php echo $row['image']; ?>" /></td>
            <td><?php echo $row['qty']; ?> <form action="update_cart.php" method="post">
                <input type="hidden" name="cart_id" value="<?php echo $row['id'];?>" />
                <input type="text" name="update_qty"><input type="submit" value="update"></form></td>
            <td><?php echo $row['total_price'] * $row['qty']; ?></td>
            <!-- <td><a href="remove_cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td> -->
           <td><a class='btn btn-danger btn-sm' href='remove_cart.php?id=<?php echo $row['id'];?>' onclick="return confirm('Are you sure want to delete this record?');">REMOVE</a></td> 
           
        </tr>
        <?php } 
        } else {
            echo "<tr><td colspan='5'>cart is empty</td></tr>";
        } 
        
        
        ?>
        <tr>
            <td colspan="5">Total: </td>
            <td colspan="2"><?php echo $grand_total;?></td>
        </tr>
    </table>
    <a href="checkout.php?cust_id=<?php echo $customer_id;?>" class="check-out">Checkout</a>
</body>
</html>
