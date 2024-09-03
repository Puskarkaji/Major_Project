<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
$owner_id = $_SESSION["id"];

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        
        $uploaddir = './uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    
        $file = "";
    
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $file = $_FILES['image']['name'];
        } else {
            $file = "";
        }
    
        $foodname = $conn->real_escape_string($_POST['foodname']);
        $description = $conn->real_escape_string($_POST['description']);
        $price = $conn->real_escape_string($_POST['price']);
        $image= $conn->real_escape_string($file);
        $resturant_name = $conn->real_escape_string($_POST['rest']);

        $sql = "INSERT INTO view_foods (R_ID,foodname, description, price, image) VALUES ($resturant_name,'$foodname', '$description', '$price', '$image')";
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}

$result = $conn->query("SELECT * FROM view_foods");
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>owner page</title>
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
        td form {
            display: inline;
        }
        td input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        td input[type="submit"]:hover {
            background: #0056b3;
        }
        td input[type="submit"][name="fdelete"] {
            background: #dc3545;
        }
        td input[type="submit"][name="fdelete"]:hover {
            background: #c82333;
        }
        a{
            text-decoration: none;
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
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<button class="back-button" onclick="history.back()">Back</button>

    <form method="post" action="" enctype="multipart/form-data">
        <h2>Add Food Item</h2>
        <select name="rest">
                <?php
                $select = "SELECT * FROM tbl_restaurants where o_id =".$owner_id;
                $result = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row["R_ID"]; ?>"><?php  echo $row["name"]; ?></option>
                    <?php
                }
                ?>
            </select><br><br>
        <input type="text" name="foodname" placeholder="Foodname" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price in Rs." required>
        <input type="file" name="image" placeholder="add images" required>
        <input type="submit" name="add" value="Add Item">
    </form>

    <h2>Update/Delete Food Item</h2>
    <table class="table table-hover text-center">
  <thead>
    <tr>
      <th >FID</th>
      <th >Foodname</th>
      <th >Description</th>
      <th >Image</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    //$sql= "SELECT * FROM `view_foods`";
    $sql="SELECT * FROM view_foods left join tbl_restaurants on view_foods.R_ID = tbl_restaurants.R_ID where o_id = ".$owner_id;
    $result=mysqli_query($conn,$sql);
    while ($row= mysqli_fetch_assoc($result)){
        ?>
   <tr>
    <th> <?php echo $row['F_ID']?></th>
    <th> <?php echo $row['foodname'] ?></th>
    <th> <?php echo $row['description'] ?></th>
    <th> <?php echo $row['image'] ?></th>
        
    <td>
      <!-- <a href="fedit.php?F_ID=<?php echo $row['F_ID'] ?>" 
        class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        
        <a href="fdelete.php?F_ID=<?php echo $row['F_ID'] ?>"
         class="link-dark"> <i class="fa-solid fa-trash"></i> </a>-->
         <a class='btn btn-primary btn-sm' href='a_edit.php?id=<?php echo $row['F_ID'];?>'>UPDATE</a>
        <a class='btn btn-danger btn-sm' href='a_delete.php?id=<?php echo $row['F_ID'];?>' onclick="return confirm('Are you sure want to delete this record?');">DELETE</a>
    </td>
    </tr>

<?php

    }

    ?>
 
   
      
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
