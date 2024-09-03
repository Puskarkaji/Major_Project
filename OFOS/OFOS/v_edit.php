<?php
include 'db.php';
//if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $query = "SELECT * FROM tbl_restaurants where R_ID='$id'";
    $result=mysqli_query($conn,$query);

   // if (!$result){
   // die("query failed");
$row=mysqli_fetch_assoc($result);
//print_r($row);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form h2 {
            margin-top: 0;
        }
        form input[type="text"], form input[type="number"], form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        form input[type="submit"]:hover {
            background: #218838;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin:10px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
</style>

</head>
<body>
<button class="back-button" onclick="history.back()">Back</button>
    <?php
    if(isset($_POST['update'])){
       // if(isset($_GET['id_new'])){
           // $idnew=$_GET['id_new'];
       // }
       
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        // $image=$_POST['image'];
    
        //$uploaddir = './uploads/';
       // $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    
       // $image = "";
    
       // if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
      //      $image = $_FILES['image']['name'];
      //  } else {
     //       $image = "";
      //  }
        $query="UPDATE tbl_restaurants SET name='".$name."',email='".$email."',contact='".$contact."',address='".$address."' WHERE R_ID=".$id;
        // echo $query; exit;
        $result=mysqli_query($conn,$query);

   // if (!$result){
        //die("query failed");
   //// }
   // else{
        header('location:view_restaurants.php?update_msg=you have successfully updated item');
    
    }
    


?>
   <form action="" method="POST" enctype="multipart/form-data">
 <input type="text" name="name" placeholder="Enter restaurant name" required value="<?php echo $row['name']?>"><br>
       <!-- <textarea name="description" placeholder="Description" required><?php echo $row['description']?></textarea><br>-->
        <input type="email" step="0.01" name="email" placeholder="Enter restaurant email" required value="<?php echo $row['email']?>"><br>
        <input type="number" name="contact" placeholder="Enter contact number" required value="<?php echo $row['contact']?>"><br><br>
<textarea name="description" placeholder="Enter address" required><?php echo $row['address']?></textarea><br>
        <input type="submit" name="update" value="Update" >
    </form> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
