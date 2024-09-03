<?php 
    session_start();
    include 'db.php';
    $id = $_GET['delivered'];
    $sql = "update orders set delivered =1 where id = ".$id;
    $conn->query($sql);

    header('Location: delivery.php');
?>