<?php

include 'db.php';

if (isset($_POST['submit'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $role = $_POST['role'];


    $select = "SELECT * FROM tbl_users WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    }
    /*else{

       if($pass != $cpass){
          $error[] = 'password not matched!';
       }
          */ else {
        $insert = "INSERT INTO tbl_users(fname,lname,email,phone,address,password,role)VALUES('$fname','$lname','$email','$phone','$address','$password','$role')";
       //echo $insert;
        mysqli_query($conn, $insert);
        header('location:login.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup form</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css"/>
</head>


<body>
    <div class="container">
        <H3>REGISTER NOW</H3>
        <form method="post">
            <div class="fname">
                <input type="text" name="fname" id="fname" placeholder="first name" required>
            </div><br>
            <div class="lname">

                <input type="text" name="lname" id="lname" placeholder="last name" required>
            </div><br>
            <div class="mail">
                <!--- <label>Email</label>-->
                <input type="text" name="email" id="email" placeholder="email" required>
            </div><br>
            <div class="phone">
                <!--- <label>Email</label>-->
                <input type="tel" name="phone" maxlength="10" placeholder="Enter your Mobile No." required />
            </div><br>
            <div class="address">
                <!--- <label>Email</label>-->
                <input type="text" name="address"  placeholder="Enter your address" required />
            </div><br>

            <div class="pass">
                <!--<label>Password</label>-->
                <input type="password" name="password" id="pass" placeholder="password" required>
            </div><br>
            <div class="cpass">
                <!--<label>Conform password</label>-->
                <input type="password" name="cpassword" id="cpass" placeholder="confirm password">
            </div><br>
           
            <div class="role">
                <!--<label>Role</label>-->
                <select class="form_controller" name="role">Role
                    <option>Select Role</option>
                    <option value="Customer">Customer</option>
                    <option value="Delivery">Delivery</option>
                    <option value="Owner">Owner</option>
                </select>

            </div><br>
            <!--<a href="login.php" method="post">--> <input type="submit" value="Signup" name="submit"> </a>
        </form>
    </div>
</body>

</html>