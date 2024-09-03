<?php
include "db.php";
if(isset($_GET['F_ID'])){
    $F_iD=$_GET['F_ID'];
    $sql="DELETE FROM `view_foods` WHERE F_ID=$F_ID";
    $conn->query($sql);

}
header('location:addfooditem.php');
exit;
?>