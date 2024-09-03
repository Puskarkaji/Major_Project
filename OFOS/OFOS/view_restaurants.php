<?php
include 'db.php';

$sql = "SELECT * FROM  tbl_restaurants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Restaurants</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
   <style>
        table{
            border:2px;
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
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
        td img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<button class="back-button" onclick="history.back()">Back</button>
    <div class="container">
        
        <table>
            <tr>
                <th>R_ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['R_ID']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                       <a class='btn btn-primary btn-sm' href='v_edit.php?id=<?php echo $row['R_ID'];?>'>UPDATE</a>
                       <a class='btn btn-danger btn-sm' href='v_delete.php?id=<?php echo $row['R_ID'];?>'>DELETE</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
   <!-- <button class="back-button" onclick="history.back()">Back</button>-->
  
</body>
</html>
