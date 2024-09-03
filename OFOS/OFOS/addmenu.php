<?php
include 'db.php';

// Fetch restaurants
$restaurants_result = $conn->query("SELECT * FROM tbl_restaurants");
if (!$restaurants_result) {
    die("Query failed: " . $conn->error);
}

// Handle form submission for adding menu items
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addmenu'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $image = $conn->real_escape_string($_POST['image']);
    $R_ID= $conn->real_escape_string($_POST['R_ID']);

    $query = "INSERT INTO view_foods (name, description, price, image, R_ID) VALUES ('$name', '$description', '$price', '$image', '$R_ID')";
    if ($conn->query($query)) {
        $message = "Food item added successfully!";
    } else {
        $message = "Error adding food item: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
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
        form input[type="text"], form textarea, form select {
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
        .message {
            color: green;
        }
    </style>
</head>
<body>
    
    <h2>Add Menu Item</h2>

    <?php if (isset($message)) { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post" action="">
        <input type="hidden" name="add_menu_item" value="1">
        <input type="text" name="name" placeholder="Food Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="text" name="price" placeholder="Price in Rs" required>
        <input type="file" name="image" placeholder="add images" required>
        <select name="restaurant_id" required>
            <option value="">Select Restaurant</option>
            <?php while($row = $restaurants_result->fetch_assoc()) { ?>
                <option value="<?php echo $row['R_ID']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Add Menu Item">
    </form>

    <!-- You can include other admin functionalities here -->
</body>
</html>
