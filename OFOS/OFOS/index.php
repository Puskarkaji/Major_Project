<?php
session_start();



if (!isset($_SESSION['role'])) {
    header('location:login.php');
} else {
    echo $_SESSION['role'];
           if ($_SESSION['role'] == 'Admin') {
            header('location:admin_page.php');
        } else if ($_SESSION['role'] == 'Delivery') {
            header('location:delivery.php');
        } else if ($_SESSION['role'] == 'Owner') {
            header('location:owner.php');
        } else if ($_SESSION['role'] == 'Customer') {
            header('location:customer.php');
        } else {
            header('location:login.php');
        }    
}
?>