<?php
session_start();
@include 'db.php';

$customer_id = $_SESSION['id'];
if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $shipping_address = $_POST['shipping_address'];
   $total_price = $_POST['total_price'];
   $method= $_POST['method'];

   
   $cart_query = mysqli_query($conn, "SELECT *, count(*) as qty_new FROM cart where customer_id = ".$customer_id." group by food_name");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['food_name'] .' ('. $product_item['qty_new'] .') ';
         $product_price = $product_item['price'] * $product_item['qty_new'];
         $price_total += $product_price;
      }
   }

   $total_product = implode(', ',$product_name);
   $sql = "INSERT INTO `orders`(customer_id,name, address, phone, email, shipping_address, total_price,method) VALUES($customer_id,'$name','$address','$phone','$email','$shipping_address','$total_price','$method')" ;
   if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
   $order_id = $conn->insert_id;
   $detail_query = mysqli_query($conn, "SELECT *, count(*) as qty_new FROM cart where customer_id = ".$customer_id." group by food_name");
   while($prod = mysqli_fetch_assoc($detail_query)){
      $prod_name = $prod['food_name'];
      $prod_price = $prod['price'] * $prod['qty_new'];
      $qty = $prod['qty_new'];
      $r_id = $prod['rest_id'];
      $sql = "INSERT INTO `order_details`(order_id,res_id,food_name, price, qty) VALUES($order_id,$r_id,'$prod_name','$prod_price','$qty')" ;
      $conn->query($sql);
   }

   $sql = "delete from cart where customer_id = ".$customer_id;
   $conn->query($sql);

   header("Location: success.php");
   // if($cart_query && $sql){

   
   //    echo "
   //    <div class='order-message-container'>
   //    <div class='message-container'>
   //       <h3>thank you for shopping!</h3>
   //       <div class='order-detail'>
   //          <span>".$total_product."</span>
   //          <span class='total'> total : Rs".$price_total."/-  </span>
   //       </div>
   //       <div class='customer-details'>
   //          <p> your name : <span>".$name."</span> </p>
   //          <p> your number : <span>".$phone."</span> </p>
   //          <p> your email : <span>".$email."</span> </p>
   //          <p> your address : <span>".$address."</span> </p>
   //          <p> your payment mode : <span>".$method."</span> </p>
   //          <p>(*pay when product arrives*)</p>
   //       </div>
   //          <a href='customer.php' class='btn'> continue shopping</a>
   //       </div>
   //    </div>
      
   // ";

   // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .container{
   max-width: 1200px;
   margin:0 auto;
   /* padding-bottom: 5rem; */
}
.checkout-form form{
   padding:2rem;
   border-radius: .5rem;
   background-color: var(--bg-color);
}

.checkout-form form .flex{
   display: flex;
   flex-wrap: wrap;
   gap:1.5rem;
}

.checkout-form form .flex .inputBox{
   flex:1 1 30rem;
}
.checkout-form form .flex .inputBox span{
   font-size: 1.3rem;
   color:var(--black);
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
<button class="back-button" onclick="history.back()">Back</button>


<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT *, count(*) as qty_new FROM cart where customer_id = ".$customer_id." group by food_name");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['qty_new'];
            $grand_total = $total += $total_price;
      ?>
      <div><?= $fetch_cart['food_name']; ?><span>(<?= $fetch_cart['qty_new']; ?>)</span></div>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : Rs<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div><br>
         <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder="enter your address" name="address" required>
         </div><br>
         <div class="inputBox">
            <span>Contact no</span>
            <input type="tel" name="phone" maxlength="10" placeholder="Enter user Mobile No." required />
         </div><br>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div><br>
         <div class="inputBox">
            <span>Shipping Address</span>
            <input type="text" placeholder="enter shipping address" name="shipping_address" required>
         </div><br>
         <div class="inputBox">
            <span>Total_Price</span>
            <input type="number" placeholder="enter total_price in Rs." name="total_price" value="<?php echo $grand_total?>" required>
         </div><br>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cod" selected>cash on delivery</option>
            </select>
         </div>
      </div><br>
      <input type="submit" value="order now" name="order_btn" class="<i class="fa-solid fa-tablet-button></i> 
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>