<?php
session_start();
if($_SESSION['role']!='Admin'){
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/owner.css" />
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
   <title>Online Food Ordering system</title>

</head>
<body>
   
<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="images\order.png" alt="">
          <span class="nav-item">Admin</span>
        </a></li>
        <li><a href="add_restaurant.php" class="rest">
          <i class="fas fa-hamburger"></i>
          <span class="nav-item">Add Restaurant</span>
        </a></li>
        <li><a href="view_restaurants.php">
          <i class="fas fa-hamburger"></i>
          <span class="nav-item">View Restaurants</span>
        </a></li>
        <li><a href="view_customers.php">
          <i class="fas fa-solid fa-users"></i>
          <span class="nav-item">View Customer</span>
        </a></li>
        <li><a href="viewmenu.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">View Menus</span>
        </a></li>
        <li><a href="view_orders.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">View Orders</span>
        </a></li>
       
       
       
       
        
      <!--  <li><a href="adminadd.php">
          <i class="fas fa-plus"></i>
          <span class="nav-item">Add New Admin</span>
        </a></li>-->
        <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
       
      </div>

      <div class="main-part">
        <!--<img src="images\food.jpg">;-->
      
        <h2 style="color:yellow;text-align:center">WELCOME ADMIN</h2>
       

      
      </section>
    </section>
  </div>
</body>
</html>

