<?php
include 'db.php';

?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

   $query="delete FROM tbl_restaurants where R_ID=".$id;
   $result=mysqli_query($conn,$query);
   if(!$result){
    die("query failed".mysqli_error());

   }
   else{
    header('location:view_restaurants.php?delete_msg=you have deleted the record.');
   }
}

?>