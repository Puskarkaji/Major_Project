<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <title> Login</title>
</head>
<body>
    <div class="container">
        <form action="authenticate.php" method="post">
            <div class="error"><?php echo isset($_SESSION["error"]) ? $_SESSION["error"] : ''; ?></div>
            <div class="user">
                <label >Username</label>
                <input type="text" id="user" name="email" required>

            </div><br>
            <div class="pass">
                <label>Password</label>
                <input type="password" id="pass" name="password">
            </div><br>
            <div class="button">
                <input type="submit" value="Login" id="btn" name="submit">

            </div>
            <P> Don't have an account? ? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>