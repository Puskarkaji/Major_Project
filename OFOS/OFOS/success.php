<?php
session_start();
@include 'db.php';

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



</style>
</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1 class="heading">Thank you for Placing order</h1>

   <form action="" method="post">

   <div class="display-order">
      
      <span class="grand-total"> We will call you about the order confirmation. and shipped it form central office. </span>
   </div>

   <div><a href="customer.php">Back to home page</a></div>


</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>