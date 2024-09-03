<?php
include ('db.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password'];
    $enc_pass = md5($pass);

    $select = "SELECT * FROM tbl_users WHERE email = '$email' && password = '$enc_pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $success = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["user"] = $row["email"];
            $_SESSION["role"] = $row["role"];
            $_SESSION['id']=$row["id"];
            $_SESSION["error"] = "";
            $success = 1;
        
        }
        if ($result > 0) {
            echo "done3";
            header('location:index.php');
        } else {
            echo "done4";
            header('location:login.php');
        }
    }else{
        $_SESSION["error"] = "Username and password are invalid";
        header('location:login.php');
    }
}
?>