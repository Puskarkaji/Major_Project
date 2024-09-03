<?php
session_start();
$owner_id = $_SESSION['id'];
include 'db.php';

// Fetch food items
$result = $conn->query("SELECT * FROM view_foods left join tbl_restaurants on view_foods.R_ID = tbl_restaurants.R_ID where o_id = ".$owner_id);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Food Items</title>
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
</head>
<body>
    <h1>View Food Items</h1>

    <button class="back-button" onclick="history.back()">Back</button>

    <table>
        <tr>
            <th>F_ID</th>
            <th>foodname</th>
            <th>Restaurant Name</th>
            <th>Description</th>
            <th>Price in Rs</th>
            <th>Image</th>
        </tr>
        <?php 
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['F_ID']; ?></td>
            <td><?php echo $row['foodname']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><img src="./uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['foodname']; ?>"></td>
        </tr>
        <?php } 
        } else {
            echo "<tr><td colspan='5'>No food items found.</td></tr>";
        } ?>
    </table>
</body>
</html>
