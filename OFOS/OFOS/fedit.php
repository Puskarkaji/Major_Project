<?php
include 'db.php';
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
        td input[type="submit"][name="delete"] {
            background: #dc3545;
        }
        td input[type="submit"][name="delete"]:hover {
            background: #c82333;
        }
        a{
            text-decoration: none;
        }
    </style>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<button class="back-button" onclick="history.back()">Back</button>

    <form method="post" action="">
 
        <h2>Add Food Item</h2>
        <select name="rest">
                <?php
                $select = "SELECT * FROM tbl_restaurants";
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
    $sql= "SELECT * FROM `view_foods`";
    $result=mysqli_query($conn,$sql);
    while ($row= mysqli_fetch_assoc($result)){
        ?>
   <tr>
    <th> <?php echo $row['F_ID']?></th>
    <th> <?php echo $row['foodname'] ?></th>
    <th> <?php echo $row['description'] ?></th>
    <th> <?php echo $row['image'] ?></th>
        
    <td>
        <a href="fedit.php?F_ID=<?php echo $row['F_ID'] ?>" 
        class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="fdelete.php?F_ID=<?php echo $row['F_ID'] ?>"
         class="link-dark"> <i class="fa-solid fa-trash"></i> </a>
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

