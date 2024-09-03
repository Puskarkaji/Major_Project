<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rest = $_POST['rest'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if (empty($name) || empty($email) || empty($contact) || empty($address)) {
        echo "All fields are required.";
    } else {

        $stmt = $conn->prepare("INSERT INTO tbl_restaurants (o_id,name, email, contact,address) VALUES ('$rest','$name','$email','$contact','$address')");
        // $stmt->bind_param("ssss", $name, $email, $contact, $address);

        if ($stmt->execute()) {
            echo "New restaurant added successfully";
            header("Location: admin_page.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Restaurant</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
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
        
</style>
</head>

<body>
<button class="back-button" onclick="history.back()">Back</button>
    <div class="container">
        <h2>Add Restaurant</h2>
        <form action="" method="post">
            <select name="rest">
                <?php
                $select = "SELECT * FROM tbl_users WHERE role = 'Owner'";
                $result = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>"><?php  echo $row["fname"]. " ". $row["lname"]; ?></option>
                    <?php
                }
                ?>
            </select><br><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="enter  restaurant name" required><br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="enter restaurant email" required><br><br>

            <label for="contact">Contact:</label>
            <input type="tel" name="contact" maxlength="10" placeholder="Enter restaurant number." required /><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="enter restaurant address" required></textarea><br><br>



            <input type="submit" value="Add Restaurant">
            <!--   <button class="back-button" onclick="history.back()">Back</button>-->
        </form>
    </div>
</body>

</html>