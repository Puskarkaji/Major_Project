<?php
include 'db.php';

?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

   $query="delete FROM cart where id =".$id;
   $result=mysqli_query($conn,$query);
   if(!$result){
    die("query failed".mysqli_error());

   }
   else{
    header('location:cart.php?delete_msg=you have deleted the record.');
   }
}

?>